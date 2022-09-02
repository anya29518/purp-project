<?php

//fetch_comment.php
session_start();
require_once 'includes/connect-db.php';
// $user_ID = $_SESSION['user']['id'];
$query = "SELECT * FROM `comments` WHERE `parent-id` = '0' ORDER BY id DESC";
$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));

$comments_count = 0;
$count = 0;
$output = '';
for($i = 0; $i < mysqli_num_rows($result);$i++){
    $comment = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    // $comments += $comment;
    // print_r($comment);
    $comments_count++;
    
    $user_id = $comment["user-id"];
    //var_dump($user_id);
    $query_name = "SELECT login FROM `user` WHERE `id` = '$user_id' ";
    $res = mysqli_query($connect, $query_name) or die("Ошибка " . mysqli_error($connect));
    $username = mysqli_fetch_array($res, MYSQLI_ASSOC);
    //var_dump($username["login"]);
    if($comment["pic-id"] == $_SESSION["pic"]["id"]){
        $output .= '
        <div class="panel panel-default">
        <div class="panel-heading">By <b>'.$username["login"].'</b> on <i>'.$comment["date"].'</i></div>
        <div class="panel-body">'.$comment["text"].'</div>
        <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$comment["id"].'">Ответить</button></div>
        </div>';
        $output .= get_reply_comment( $comment["id"]);
    }
}
echo $output;
//print_r($_SESSION["pic"]["id"]);


// $response = [
//     "status" => true
// ];

// echo json_encode($response);

function get_reply_comment( $parent_id, $marginleft = 0){
    $user_ID = $_SESSION['user']['id'];   
    require 'includes/connect-db.php';
    $query = " SELECT * FROM comments WHERE `parent-id` = '".$parent_id."'";
    
    $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
    //$comment = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $count = mysqli_num_rows($result);
    $output = '';

   
    
    if($count > 0)
    {
        $marginleft = $marginleft + 30;      
        for($i = 0; $i < mysqli_num_rows($result);$i++){
            $comment = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $user_id = $comment["user-id"];
            //var_dump($user_id);
            $query_name = "SELECT login FROM `user` WHERE `id` = '$user_id' ";
            $res = mysqli_query($connect, $query_name) or die("Ошибка " . mysqli_error($connect));
            $username = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $output .= '
            <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
            <div class="panel-heading">By <b>'.$username["login"].'</b> on <i>'.$comment["date"].'</i></div>
            <div class="panel-body">'.$comment["text"].'</div>
            <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$comment["id"].'">Ответить</button></div>
            </div>
            ';
            $output .= get_reply_comment( $comment["id"], $marginleft);
        }
    }
    return $output;
}
