<?php
    session_start();
    require_once 'includes/connect-db.php';   

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));
    //echo $referal;
    $search = '%'.$referal.'%';
    $query = "SELECT id, path, title from `pict` WHERE title like '$search'";
    //$query = "SELECT * FROM `cathegory` WHERE name = '$cath'"; 
    $result = mysqli_query($connect, $query)or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');
    
    //var_dump($result);
    if($result){
        $arrTitles = array();
        $rows = mysqli_num_rows($result);
        //echo "  ".$rows."  ";
        if( $rows>0){
            //echo "xui";
            while ($title = mysqli_fetch_array($result) ) {
                //print_r($arrTitles);
                array_push($arrTitles, $title);
            }
            echo json_encode($arrTitles);
        } else {
            echo '{ "error":"1" }';
        }
        //$result->close();
        }






// $mysqli -> query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");
// if(!empty($_POST["referal"])){ //Принимаем данные

//     $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));
//     echo $referal;
//     $query = "SELECT * from `pict` WHERE 'title' LIKE '%$referal%'";

//     $res = mysqli_query($connect, $query)or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');

//     $db_referal = mysqli_fetch_array($res);
    
//     while ($row = $db_referal) {
//         echo "\n<li>".$row["title"]."</li>"; //$row["name"] - имя поля таблицы
//     }
// }
?>