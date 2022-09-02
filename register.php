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
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     -->
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/first-page.css" rel="stylesheet">
    <title>Registration</title>
</head>
<body>
    <div class="page_content">
        <form   action="php/reg.php" method="POST" class="form" id="form" >
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите логин" required>
            <label>Возраст</label>
            <input type="number" min="12" max="100" name="age" placeholder="Введите возраст" required>
            <label>Почта</label>
            <input type="email" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" placeholder="Введите почту" required>
            <label>Пол</label>
            <select name="gender" id="gender">
                <option value="male">мужской</option>
                <option value="female">женский</option>
            </select>
            <!-- <label>Изображение профиля</label>  
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
            <input name="avatar" type="file" accept="image/png, image/jpeg" required/> -->
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль" pattern="[a-z0-9]{3,15}" required>
            <label>Пароль</label>
            <input type="password" name="check_password" placeholder="Подтверждение пароля" pattern="[a-z0-9]{3,15}" required>
            <button type="button" class="register-btn">Регистрация</button>
            <p>Уже есть аккаунт? - <a href="login.php">Войти</a></p>
        
            <p class="msg none">Lorem ipsum.</p>
        </form>
    </div>

    
    <script src="js/jquery-min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>