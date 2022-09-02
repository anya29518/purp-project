<?php

session_start();
require_once 'includes/connect-db.php';

//header("Refresh: 0");

// $like = mysqli_fetch_array($result, MYSQLI_ASSOC)[0];
// if(!$like){
//     $like = 0;
// }
////////////////////////////////



//var_dump($like) ;

 
$id=$_GET['id'];
//echo $id;   

$user_ID = $_SESSION['user']['id'];



///////////////////////////////
$query = "SELECT count(*) FROM `likes` WHERE `pic-id` = '$id'";
$result = mysqli_query($connect, $query) or die("Ошибка " .
mysqli_error($connect));

if(!mysqli_num_rows($result)){
    $like = 0; 
 }else{
     $like = mysqli_fetch_array($result)[0];
 }

$pic_query = "SELECT * FROM `pict` ";
//  $img_query = "SELECT * FROM `pict` WHERE user_id <> '$user_ID'";

$result = mysqli_query($connect, $pic_query) or die("Ошибка " .
mysqli_error($connect));



$like_query = "SELECT id FROM `likes` WHERE `user-id` = $user_ID AND `pic-id` = $id";
$like_res = mysqli_query($connect, $like_query) or die("Ошибка " .
mysqli_error($connect));

if(!mysqli_num_rows($like_res)){
    $heart = "fa fa-heart-o";
}else{
    $heart = "fa fa-heart";
}




for($i = 0; $i < mysqli_num_rows($result);$i++){
$pics =mysqli_fetch_array($result, MYSQLI_ASSOC);

if($pics['id'] == $id)
echo "<div id = \"".$pics['id']."\" class = \"pict\"> <img src=\"".$pics['path']."\" class = \"img\"/>
<div>
    <div class=\"like\" data-id=\"".$pics['id']."\">
        <a href=\"#\" >
            <i class=\"".$heart."\"></i>
        </a>&nbsp
    <div id=\"like\">".$like."</div>

</div>
<div class=\"im-title\">".$pics['title']."</div>
</div>
</div>";
}






$query_pic = "SELECT * FROM pict WHERE id='$id'";
$res = mysqli_query($connect, $query_pic) or die("Ошибка " .mysqli_error($connect));
$pic = mysqli_fetch_assoc($res);


$_SESSION['pic'] = [
    "id" => $pic['id'],
    "path" => $pic['path'],
    "user_id" => $pic['user-id'],
    "album-id" => $pic['album-id'],   
    "cathegory-id" => $pic['cathegory-id'],
    "title" => $pic['title'],
    "date" => $pic['date']
]; 
// echo $_SESSION['pic']['id'];


?>