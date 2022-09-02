<?php

session_start();

function getMenu(){
    include 'includes/connect-db.php';

    $query = 'SELECT * FROM `cathegory`';
    $result = mysqli_query($connect, $query) or die("Ошибка " .mysqli_error($connect));

    while($rs = mysqli_fetch_array($result)){
        echo "<div class = \"cath\">
        <input type=\"checkbox\" id=\"".$rs['id']."\" name=\"box\" value=\"".$rs['name']."\"> 
         <label for=\"".$rs['id']."\">
        <span></span>".$rs['name']."
        
        <ins><i>".$rs['name']."</i></ins>
      </label></div>";

    }


}

function getCats(){
    include 'includes/connect-db.php';
    $query = 'SELECT * FROM `cathegory`';
    $result = mysqli_query($connect, $query) or die("Ошибка " .mysqli_error($connect));

    while($rs = mysqli_fetch_array($result)){
        echo "<option>".$rs['name']."</option>";
    }

    
}

//require_once 'includes/connect-db.php';
// $caths = [];
// $caths = $_POST['caths'];
// print_r($caths);

// if($caths){
//     foreach($caths as $cath){
//         $query = "SELECT * FROM `cathegory` WHERE name = '$cath'"; 
//         $result = mysqli_query($connect, $query) or die("Ошибка " .mysqli_error($connect));
//         $rs = mysqli_fetch_array($result);
//     }
//     print_r($rs);
// }
?>