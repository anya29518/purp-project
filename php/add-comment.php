<?php

//add_comment.php
session_start();
require_once 'includes/connect-db.php';

$error = '';
$comment_name = '';
$comment_content = '';
$parent_ID = $_POST["comment_id"];

$user_ID = $_SESSION['user']['id'];
$pic_ID = $_SESSION['pic']['id'];
$date = date('Y-m-d H:i:s');

// if(empty($_POST["comment_name"]))
// {
//  $error = '<p class="text-danger">Name is required</p>';
// }
// else
// {
   
//  $comment_name = $_POST["comment_name"];
// }

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
//     INSERT INTO `comments`(`id`, `user-id`, `pic-id`, `date`, `text`, `parent-id`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
// $date = date('Y-m-d H:i:s');
// $pic_id = $_SESSION['pic']['id'];
$query = "INSERT INTO `comments`(`id`, `user-id`, `pic-id`, `date`, `text`, `parent-id`) 
VALUES (NULL,'$user_ID','$pic_ID','$date','$comment_content','$parent_ID')
 ";
 $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));


 $error = '<label class="text-success">Comment Added</label>';
}


$data = array(
    'error'  => $error
   );
   
   echo json_encode($data);
   

?>