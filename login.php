<?php
    session_start();

    if($_SESSION['user']){
        header('Location: profile.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/first-page.css" rel="stylesheet">


</head>
<body>
    <div class="page_content">
        <form class="form">
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите логин">
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">
        <div class="message">
            <p class="msg none">Test</p>
        </div>
       
            <button type="submit" class="login-btn">Войти</button>
            <p>Нет аккаунта в приложении? - <a href="register.php">Зарегистрируйтесь</a></p>
        </form>

    </div>
   



    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/main.js"></script>

</body>
</html>