<?php
session_start();

require_once 'includes/connect-db.php';
$caths = [];
$caths = $_POST['caths'];
$filtr= "";
//print_r($caths);

$user_ID = $_SESSION['user']['id'];
//echo $user_ID;

// if(!$caths)






if($caths){
    foreach($caths as $cath){//check what caths
         //echo $cath;
        // $query = "SELECT * FROM cathegory c JOIN pict p ON c.id = 't.cathegory-id' WHERE 'name' like '$cath'"; 
        $query = "SELECT * FROM `cathegory` WHERE name = '$cath'"; 

        $result = mysqli_query($connect, $query) or die("Ошибка " .mysqli_error($connect));
        //$rs = mysqli_fetch_assoc($result);
        //$rs =mysqli_fetch_array($result, MYSQLI_ASSOC);
        // foreach($rs as $r){
            
            // print_r($pics);
            
            if($result){
                $rows = mysqli_num_rows($result);
               // print_r($rows." ");
                for($i=0; $i<$rows; ++$i){//check what in each cath
                    $row =mysqli_fetch_array($result);
                    //print_r($row."mmm ");
                    $id = $row[0];
                    $cath_name = $row[1];
                    //echo "n".$id."n\n";

                    $query_cat = "SELECT * FROM pict WHERE `cathegory-id` = '$id' AND `user_id` <> '$user_ID'"; 
                    $result_cat = mysqli_query($connect, $query_cat) or die("Ошибка " .mysqli_error($connect));

                    
                    $p_rows = mysqli_num_rows($result_cat);
                    if(!$p_rows){ 
                        $filtr = " <div class = \"noimg\">В категории \"".$cath_name."\" ничего не нашлось:(</div>";
                    }
                    else {

                    
                    for($i=0; $i<$p_rows; ++$i){//check each pic

                    //var_dump($result_cat);
                    
                    $pics_cat = mysqli_fetch_array($result_cat, MYSQLI_ASSOC);
                    //print_r($pics_cat);
                    // print_r($pics);
                    $filtr .= "<div id = \"".$pics_cat['id']."\" class = \"pic\"><a href=\"pic.php?id=".$pics_cat['id']."\"><img src=\"".$pics_cat['path']."\" class = \"img\"/><div class = \"title\">".$pics_cat['title']."</div></a></div>";
                    }}
                }
  
            }
    
        
    }

    
}

else{
$img_query = "SELECT * FROM `pict` WHERE user_id <> '$user_ID' ";

$result = mysqli_query($connect, $img_query) or die("Ошибка " .
mysqli_error($connect));

for($i = 0; $i < mysqli_num_rows($result);$i++){
    $pics =mysqli_fetch_array($result, MYSQLI_ASSOC);
    // print_r($pics);
    $filtr .= "<div id = \"".$pics['id']."\" class = \"pic\"><a href=\"pic.php?id=".$pics['id']."\"><img src=\"".$pics['path']."\" class = \"img\"/><div class = \"title\">".$pics['title']."</div></a></div>";
}}


 echo $filtr;

//$sort_id = $_POST['sort_id'];
//echo $sort_id;
// switch ($sort_id) {
//     case "one":
//         $sort_item = "ORDER BY title";
       
       
//         break;
//     case "two":
//         echo "i равно 1";
//         break;
//     case "three":
//         echo "i равно 2";
//         break;
//     case "four":
//         echo "i равно 2";
//         break;
// } ;
//$_SESSION['sort'] = $sort_item;
// $sort_query = "SELECT * FROM `pict` WHERE user_id <> '$user_ID' ORDER BY '$sort_item'";


// $result_s = mysqli_query($connect, $sort_query) or die("Ошибка " .
// mysqli_error($connect));
// $filtr = "";
// for($i = 0; $i < mysqli_num_rows($result_s);$i++){
//     $pics =mysqli_fetch_array($result_s, MYSQLI_ASSOC);
//     // print_r($pics);
//     $filtr .= "<div id = \"".$pics['id']."\" class = \"pic\"><a href=\"pic.php?id=".$pics['id']."\"><img src=\"".$pics['path']."\" class = \"img\"/><div class = \"title\">".$pics['title']."</div></a></div>";
// }
// }



?>
