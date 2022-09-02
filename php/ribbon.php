<?php
session_start();
require_once 'includes/connect-db.php';

$user_ID = $_SESSION['user']['id'];


$img_query = "SELECT * FROM `pict` WHERE user_id <> '$user_ID' ";

$result = mysqli_query($connect, $img_query) or die("Ошибка " .
mysqli_error($connect));




for($i = 0; $i < mysqli_num_rows($result);$i++){
    $pics =mysqli_fetch_array($result, MYSQLI_ASSOC);
    // print_r($pics);
    echo "<div id = \"".$pics['id']."\" class = \"pic\"><a href=\"pic.php?id=".$pics['id']."\"><img src=\"".$pics['path']."\" class = \"img\"/><div class = \"title\">".$pics['title']."</div></a></div>";
}


?>