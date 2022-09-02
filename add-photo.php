<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="styles/add-photo.css" rel="stylesheet" type="text/css" />
    
    <link href="styles/croppie.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="styles/tags.css"
      rel="stylesheet">
</head>
<body>

<?php require_once 'header.php';

include 'php/menu.php';
include 'php/albums.php';
 ?>
    <!-- <form action="php/addPhoto.php" method="POST"> -->
    <div class="photo_form">
        <div class="form-box">
                <di class="image-box">
                    <div id="upload-image"></div>
                </div>
                <div class="downForm">
                    <div class="file-input">
                        <input type="file" name="file" id="images" class="file">
                        <label class="add" id="tr" for="images">Загрузить</label>
                      </div>
                    <button class="buttonUp add">Обновить</button>
                </div>
        </div>
    </div>


    <div class="overlay"></div>
  <!-- <form action="php/addPhoto.php" method="POST" enctype="multipart/form-data" class="add-form"> -->
    <section class="photoRedactor">

  
        <div class="boxPhoto">
            <img class="photo" id="pic" />
        </div>

        <div class="param">

            <!-- <div>-->
            <label for="">Описание</label>
            <textarea name="title"></textarea>
            <div class="selects">
                <div class="select">
                <label for="">Категория<br></label>
                
                <select name="cathegories" id="cats">
                    <? 
                        getCats();
                    ?>
                </select>
                </div>
                <div class="select">
                <label for="">Альбом<br></label>
                <select name = "albums">
                    <?php
                        getSelect();
                    ?>
                </select>
                </div>
            </div>
            <!-- <label for="">Теги</label>
            <div class="container">
                <div class="tag-container">
                    <input/>
                </div>
            </div> -->
            <!-- </div> -->
            
            <input name="AddPhoto" class="buttonR" type="button"  value="Добавить"/>

        </div>
        </div>
  
    </section>   
 <!-- </form>   -->

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/add-photo.js"></script>
    <!-- <script src="js/tags.js"></script> -->
    
    <script src="js/croppie.js"></script>
    

</body>
</html>