<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/profile.css" rel="stylesheet" type="text/css" />
    <link href="styles/main-page.css" rel="stylesheet">

</head>
<body>
    <?php
        require_once 'header.php';
        include 'php/albums.php';
       
    ?>
    <div class="albpics ">
    <?php
        getAlbPics();
    ?>
    </div>
</body>
</html>