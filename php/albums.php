<?php
session_start();

function getAlbums(){

    include 'includes/connect-db.php';
    $user_ID = $_SESSION['user']['id'];
    $query_albums = "SELECT * FROM album WHERE user_id ='$user_ID'";

    $result = mysqli_query($connect, $query_albums) or die("Ошибка " . mysqli_error($connect));



    if($result){

        if(mysqli_num_rows($result) != 0){ 
            //В цикле формируем массив
            for($i = 0; $i < mysqli_num_rows($result);$i++){
            $albums = mysqli_fetch_array($result, MYSQLI_ASSOC); 
             //Формируем массив, где ключами являются адишники на родительские категории

            echo "<div class=\"album\"><a href='album.php?id=".$albums['id']."'><div class=\"album-photo\">"."</div>".$albums['name']."</a></div><br>";
            }
        }

    }

}

function getSelect(){
    include 'includes/connect-db.php';
    $user_ID = $_SESSION['user']['id'];
    $query_albums = "SELECT * FROM album WHERE user_id ='$user_ID'";

    $result = mysqli_query($connect, $query_albums) or die("Ошибка " . mysqli_error($connect));



    if($result){

        if(mysqli_num_rows($result) != 0){ 
            //В цикле формируем массив
            for($i = 0; $i < mysqli_num_rows($result);$i++){
            $albums = mysqli_fetch_array($result, MYSQLI_ASSOC); 
             //Формируем массив, где ключами являются адишники на родительские категории
            
            echo "<option>".$albums['name']."</option>";

            }
        }

    }
}

function getAlbPics(){
    include 'includes/connect-db.php';
$alb_id=$_GET['id'];
//echo $alb_id;
// require_once 'php/includes/connect-db.php';
//print_r($_SESSION['pic']);
$user_ID = $_SESSION['user']['id'];
//var_dump($user_ID, $alb_id);


$pic_query = "SELECT * FROM `pict` WHERE `album-id` = $alb_id AND `user_id` = $user_ID";
$result = mysqli_query($connect, $pic_query) or die("Ошибка " .mysqli_error($connect));
if($result){
    
    if(mysqli_num_rows($result)){
        for($i = 0; $i < mysqli_num_rows($result);$i++){
            //echo $i;
            $pics =mysqli_fetch_array($result, MYSQLI_ASSOC);
            //print_r($pics);
            echo "<div id = \"".$pics['id']."\" class = \"pic\"><a href=\"pic.php?id=".$pics['id']."\"><img src=\"".$pics['path']."\" class = \"img\"/><div class = \"title\">".$pics['title']."</div></a></div>";
        }
    }else{
        echo "<div class = \"mess\"><img src=\"img\icons\giphy.gif\"><div><h2>Альбом пуст(((</h2><br><br><br> <a href= \"add-photo.php\"><div class=\"plink\">Добавьте первое изображение!</div></a></div></div>";
    }
}
//  $img_query = "SELECT * FROM `pict` WHERE user_id <> '$user_ID'";


}




                 
?>