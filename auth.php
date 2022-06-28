<?php session_start();
if ($_SESSION['user']){
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Вход</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="img/icon.png" rel="icon">
</head>
<body>
    <?php require 'blocks/header.php' ?>
<!--    Форма входа-->
    <div class="container-main">
        <form action="php_scripts/signin.php" method="post" class="form-data">
            <label for="login">Логин</label>
            <input id="login" type="text" placeholder="Введите имя пользователя" name="login" required>
            <label for="pass">Пароль</label>
            <input id="pass" type="password" placeholder="Введите пароль" name="password" required>
            <button type="submit">Войти</button>
            <a href="register.php" class="blue-button">Регистрация</a>
            <p>
            <div class="message">
                <?php
                if (isset($_SESSION)){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </div>
        </form>
    </div>
</body>
</html>
