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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link href="styles/profile.css" rel="stylesheet" type="text/css" />
    <link href="styles/style.css" rel="stylesheet">
    
    <title>Document</title>
</head>
<body>     
<?php

require_once 'header.php';
require_once 'php/content.php';
include 'php/albums.php';

?> 
     <div class="popup_fade">
	        <div class="popup" id="edit">
                <form method="post">

                    <h3>Редактирование вашего профиля №<?php echo $user_ID; ?></h3>
                    <div>
                    <label for="login_input">Логин</label>
                    <input name="login" type="text" id="login_input" placeholder="Введите логин" value="<?php echo htmlspecialchars($user['login']); ?>" required>
                    </div>

                    <!-- <br> -->

                    <button type="submit" name="edit" class="">Сохранить</button>
                    <!-- <br> -->
                    <a href="profile.php" class="">Назад</a>

                </form>
	        </div>		
        </div>


        <div class="apopup_fade">
	        <div class="apopup" id="aedit">
                <form method="post" >

                    <h3>Добавление альбома</h3>
                    <div>
                    <label for="album_input">Альбом</label>
                    <input name="album" type="text" id="album_input" placeholder="Введите название" >
                    </div>

                    <!-- <br> -->

                    <button type="submit" name="aedit" class="">Сохранить</button>
                    <!-- <br> -->
                    <a href="profile.php" class="">Назад</a>

                </form>
	        </div>		
        </div>


        <div class="phpopup_fade">
	        <div class="phpopup" id="phedit">
                <form enctype="multipart/form-data" method="post">

                    <h3>Добавление аватарки</h3>
                    <div>
                    <label for="photo_input">Изображение</label>
                    <input type="file" name="ava"  id="photo_input" >
                    </div>

                    <!-- <br> -->

                    <button type="submit" name="phedit" class="">Сохранить</button>
                    <!-- <br> -->
                    <a href="profile.php" class="">Назад</a>

                </form>
	        </div>		
        </div>

    <div class="user_content">
    <!-- <a class="exit_button" href="php/logout.php">Выход</a> -->

        <div class="usphoto">
            <img class="avatar" src="<?= 'img/users/'.$_SESSION['user']['avatar'] ?>"/> 
            <a href="#" class="phpopup_open"><br><br>Изменить изображение профиля</a>
            <br><br><br>
        </div>
        <div class="user_inf">
            <div class="nameProfile" ><h2><?= $_SESSION['user']['login'] ?></h2></div>
            
            <a href="#" class="popup_open">Редактирование</a>
            <br><br><br>
            <div class="age">Возраст: <span><?= $_SESSION['user']['age'] ?></span></div>
            <div class="email">Email: <span><?= $_SESSION['user']['email']?></span></div>
        </div>
   </div>

   <div class="albums">
       <div class="new_album">
        <a  href="#" class="apopup_open"><i class="fas fa-plus"></a></i>
        
       </div>
       <?php
            getAlbums();
       ?>
   </div>
       
   
   <script src="js/jquery-3.5.1.js"></script>
   <script src="js/profile.js"></script>
   <script src="js/albums.js"></script>
   <script src="js/avatar.js"></script>
</body>
</html>










   