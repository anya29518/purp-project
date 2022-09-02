<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/main-page.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <title>Main Page</title>
</head>
<body>
<?php require_once 'header.php'; 
require_once 'php/includes/connect-db.php';?>
<?php include 'php/menu.php'; ?>

<div class="content">


<div class="menu_cat">


    <p class="menu_title">Категории</p>
    <section>
    <?php
        getMenu();
    ?>
    </section>
</div>    
    <div class="pics">
        <?php
            include("php/ribbon.php");
        ?>
    </div>
    </div>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/menu.js"></script>
</body>
</html>