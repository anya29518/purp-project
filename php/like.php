<?php
    session_start();
    require_once 'includes/connect-db.php';                  
    $user_id = intval($_SESSION['user']['id']);
    $pic_id = $_SESSION['pic']['id'];
    $query = "SELECT count(*) FROM `likes` WHERE  `pic-id` = $pic_id";
    $res = mysqli_query($connect, $query);
    if(!$res){
       $likes = 0; 
    }else{
        $likes = mysqli_fetch_array($res)[0];
    }
    


$query = "SELECT * FROM `likes` WHERE `user-id` = '$user_id' AND `pic-id` = $pic_id";

    $res = mysqli_query($connect, $query);


if(!mysqli_num_rows($res)){

    //echo "aa";

$likes += 1;
$isLiked = true;
    $query = "INSERT INTO `likes`(`id`, `user-id`, `pic-id`) VALUES (NULL,$user_id,$pic_id)";
    $result = mysqli_query($connect, $query) or die("Ошибка " .mysqli_error($connect));
 
}else{
    //echo "ee";
    $likes -=1;
    $isLiked = false;
    $query = "DELETE FROM `likes` WHERE `user-id` = $user_id";
    $result = mysqli_query($connect, $query) or die("Ошибка " .mysqli_error($connect));
   
}

    //echo $likes;    

 $response = ["status" => true,
            "likes" => $likes,
            "isLiked" => $isLiked];


    // $query = "INSERT INTO `likes`(`id`, `user-id`, `pic-id`) VALUES (NULL,'$user_id','$pic_id')";
    // $result = mysqli_query($connect, $query) or die("Ошибка " .mysqli_error($connect));
    //     $response = ["status" => true];





    echo json_encode($response);
?>