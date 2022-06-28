<?php session_start();
if ($_SESSION['user']){
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="img/icon.png" rel="icon">
</head>
<body>
    <?php require 'blocks/header.php' ?>
<!--    Форма регистрации-->
    <div class="container-main">
        <form action="php_scripts/signup.php" method="post" class="form-data">
            <label for="login">Логин</label>
            <input id="login" type="text" placeholder="Введите имя пользователя" name="login" required>
            <label for="name">Имя</label>
            <input id="name" type="text" placeholder="Введите свое имя" name="name" required>
            <label for="email">Почта</label>
            <input id="email" type="email" placeholder="Введите почту" name="email" required>
            <label for="pass">Пароль</label>
            <input id="pass" type="password" placeholder="Введите пароль" name="password" required>
            <label for="confirm">Подтвердите пароль</label>
            <input id="confirm" type="password" placeholder="Введите пароль" name="password_confirm" required>
            <button type="submit">Зарегистрироваться</button>
            <p>
                <a href="auth.php" class="blue-button">Войти</a>
            </p>
            <p>
                <div class="message">
                <?php
                if (isset($_SESSION)){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
                </div>
        </form>
    </div>
    <?php require 'blocks/footer.php';?>
</body>
</html>
