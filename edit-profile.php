 <?php 
// require_once '../../engine/config.php'; if(!$user){header('Location: ' . URL . '/auth'); exit;} 
 ?>
<!doctype html>
<html lang="ru">
<head>
    <?php require_once 'header.php'; ?>
    <title>Редактирование вашего профиля</title>
</head>
<body>
<?php
// include_once '../../engine/navbar.php';
require_once 'php/content.php';
// include_once '../../engine/footer.php'
?>
<div id="edit">
    <form method="post">

        <h3>Редактирование вашего профиля №<?php echo $user_ID; ?></h3>

        <label for="login_input">Логин</label>
        <input name="login" type="text" id="login_input" placeholder="Введите логин" value="<?php echo htmlspecialchars($user['login']); ?>" required>

        <br><br>

        <button type="submit" name="edit" class="">Сохранить</button>
        <br><br><br>
        <a href="profile.php" class="">Назад</a>

    </form>
</div>

</body>
</html>