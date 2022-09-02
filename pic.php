<?php
    session_start();

    if(!$_SESSION['user']){
        header('Location: /');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4c624a4124.js" crossorigin="anonymous"></script>
    <link href="styles/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<?php
require_once 'header.php';
?>
<div class="im-content">


<?php

    require_once 'php/pic.php';

    
?>

<!-- <div class="tags"></div> -->

<div id="com" class="comments">
    <?php
        require_once 'coments.php';
    ?> 
</div>
</div>
<script src="js/like.js"></script>
</body>
</html>