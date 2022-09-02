<?php
session_start();
require_once 'includes/connect-db.php';

    $login = $_SESSION['user']['login'];
    $query ="SELECT * FROM user WHERE login='$login' ";
    $result = mysqli_query($connect, $query) or die("Ошибка " .
    mysqli_error($connect));
    $user = mysqli_fetch_assoc($result);

$user_ID = $user['id'];
// echo $user_ID;
// echo $user['id'];


//////////////
$query_albums = "SELECT * FROM album WHERE user_id ='$user_ID'";

$result = mysqli_query($connect, $query_albums) or die("Ошибка " . mysqli_error($connect));


// print_r($albums);
//////////////////////

if (isset($_POST['edit']))
{
    $login = mysqli_real_escape_string($connect, $_POST['login']);

    
    if (mysqli_query($connect,"UPDATE user SET login='$login' WHERE id = '$user_ID';"))
    {
        $_SESSION['user']['login'] = $login;
        header("Refresh: 3; profile.php");

        echo 'Операция выполнена успешно!';
    }
    else
    {
        header('Refresh: 10');
        echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
    }
}



if (isset($_POST['aedit']))
{
    $album =  $_POST['album'];

   // $album = mysqli_real_escape_string($connect, $_POST['album']);
    $date = date("Y-m-d H:i:s");

    $query_add ="INSERT INTO `album` (`id`, `user_id`, `name`, `date`) VALUES (NULL, '$user_ID', '$album', '$date')";
    

    $alb_er = 0;
    for($i = 0; $i < mysqli_num_rows($result);$i++){
        $albums = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if($album == $albums['name']){
            $alb_er = 1;
            
            break;
        }
    }

    if($album==""){
        echo 'Введите имя альбома!';
        header('Refresh: 10');
    }elseif(preg_match('/^ +$/',$album)){
        echo 'Имя альбома не может состоят только из пробелов!';
        header('Refresh: 10');
    }elseif($alb_er == 1){
        echo 'Альбом с таким именем уже существует!';
        header('Refresh: 10');
    }
    else{
        $result = mysqli_query($connect, $query_add) or die("Ошибка " . mysqli_error($connect));
        header("Refresh: 3; profile.php");
        echo 'Операция выполнена успешно!';
    }
    
    if(!$result)
    {
        header('Refresh: 10');
        echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
    }
}

if (isset($_POST['phedit']))
{
    

    $filename = $_FILES['ava']['name'];
    //echo $_FILES['ava']['tmp_name'];
    $tmp_name = $_FILES['ava']['tmp_name'];
    if(isset($filename) && isset($tmp_name)){
     $dbpath = time() . $filename;
    $path = 'D:\OpenServer\domains\project1-purp\img\users/'.$dbpath;
   
    //echo $path;
    mysqli_query($connect,"UPDATE user SET photo ='$dbpath' WHERE id = '$user_ID'");


     if (move_uploaded_file($tmp_name, $path)) {
        $_SESSION['user']['avatar'] = $dbpath;
        // echo $_SESSION['user']['avatar'];
       // var_dump($_SESSION['user']['avatar']);
     }


    }
    


    //     echo $path;
       





    // move_uploaded_file($_FILES['avatar']['tmp_name'],  "img/users/".$path);
    // if ()
    // {
        
    //     
    //     header("Refresh: 3; profile.php");

    //     echo 'Операция выполнена успешно!';
    // }
    // else
    // {
    //     header('Refresh: 10');
    //     echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
    // }

   
}
?>


