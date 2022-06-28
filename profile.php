<?php
session_start();
require_once 'php_scripts/connect.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Страница профиля</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="img/icon.png" rel="icon">
    <script src="js/change-block.js"
</head>
<body>
<?php require 'blocks/header.php'; ?>
<div class="container-main">
    <div class="container-title">Профиль</div>
    <a class="button" id="change-button">Изменить данные пользователя:</a>
    <div class="change-block">
        <form action="/php_scripts/change_data.php" method="post" class="form-data">
            <label for="login">Логин</label>
            <input id="login" type="text" placeholder="Введите имя пользователя" name="login" value="<?= $_SESSION['user']['login']?>" required>
            <label for="name">Имя</label>
            <input id="name" type="text" placeholder="Введите свое имя" name="name" value="<?= $_SESSION['user']['name']?>" required>
            <label for="email">Почта</label>
            <input id="email" type="email" placeholder="Введите почту" name="email" value="<?= $_SESSION['user']['email']?>" required>
            <label for="pass">Пароль</label>
            <input id="pass" type="password" placeholder="Введите текущий пароль" name="old_password" required>
            <label for="new_pass">Новый пароль</label>
            <input id="new_pass" type="password" placeholder="Введите новый пароль" name="new_password" required>
            <button type="submit">Сохранить</button>
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
    <?php if($_SESSION['user']['id'] != '1') {
        ?>
        <a class="button" href="/php_scripts/delete_account.php" onclick="return confirm('Вы точно хотите удалить аккаунт?')">Удалить аккаунт</a>
    <?php
    }
    ?>
    <a class="button" href="/php_scripts/logout.php">Выйти</a>
</div>
</body>
</html>