<?php

session_start();
require_once 'includes/connect-db.php';


// var_dump($_POST);
$user_ID = $_SESSION['user']['id'];
$date = date('Y-m-d H:i:s');
$path = $_POST['img'];
$name = $_POST['name'];
$cat_name = $_POST['cat'];
$alb_name = $_POST['album'];
$title = $_POST['title'];
// echo $title;

// $query_pic = "SELECT * FROM pict WHERE name='$cat_name'";
// $res = mysqli_query($connect, $query_id) or die("Ошибка " .mysqli_error($connect));



//get cathegory id from db
$query_id = "SELECT * FROM cathegory WHERE name='$cat_name'";
$res = mysqli_query($connect, $query_id) or die("Ошибка " .mysqli_error($connect));

$cat = mysqli_fetch_assoc($res);
$cat_id = $cat['id'];

//get album id from db
$query_id = "SELECT * FROM album WHERE name='$alb_name'";
$res = mysqli_query($connect, $query_id) or die("Ошибка " .mysqli_error($connect));

$alb = mysqli_fetch_assoc($res);
$alb_id=$alb['id'];

//create new path for img
$new_path = '../img/pics/'.time().$name;



//move img to filder and insert data into db
if(rename($path, $new_path)){
    
    echo"111111111111111";
/////////////////////////////////////////
    // $_SESSION['pic'] = [
    //     "id" => $pic['id'],
    //     "path" => $pic['path'],
    //     "user_id" => $pic['user-id'],
    //     "album-id" => $pic['album-id'],   
    //     "cathegory-id" => $pic['cathegory-id'],
    //     "title" => $pic['title'],
    //     "date" => $pic['date']
    // ]; 
/////////////////////////////////////////
    $query_add ="INSERT INTO `pict` (`id`, `path`, `user_id`, `album-id`, `cathegory-id`, `title`, `date`) VALUES (NULL, '$new_path', '$user_ID', $alb_id, $cat_id, '$title', '$date')";

    $result = mysqli_query($connect, $query_add) or die("Ошибка " .
    mysqli_error($connect));
}else{
    //$_SESSION['message'] = 'Ошибка при загрузке изображения';
    echo"000000000000000";
    echo $new_path;
}


















// $pic = mysqli_fetch_assoc($result);
// print_r($pic);




// if($pic != null){
//    $response = [
//     "status" => true
// ];
// }
// else {
//     $response = [
//         "status" => false
//     ];
// }

?>