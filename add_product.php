<?php
session_start();
require_once 'php_scripts/connect.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Добавить товар</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="img/icon.png" rel="icon">
    <script src="ckeditor4/ckeditor.js"></script>
</head>
<body>
<?php require 'blocks/header.php' ?>
<div class="container-main">
    <form action="php_scripts/upload.php" method="post" enctype="multipart/form-data" class="form-data" >
        <label for="category">Категория товара</label>
        <select id="category" name="category" required>
            <option value="summer">Летние платья</option>
            <option value="wedding">Свадебные платья</option>
            <option value="other">Другие платья</option>
        </select>
        <label for="title">Наименование товара:</label>
        <input id="title" type="text" placeholder="Введите наименование товара" name="title" required>
        <label for="price">Цена</label>
        <input id="price" type="text" placeholder="Введите цену" name="price" required>
        <label for="editor">Описание</label>
        <textarea name="description" id="editor" class="editor"></textarea>
        <label for="quantity">Количество</label>
        <input id="quantity" type="text" placeholder="Введите количество" name="quantity" required>
        <label for="photo">Фото</label>
        <input id="photo" type="file" accept="image/jpeg, image/png" name="image" required>
        <button type="submit">Добавить товар</button>
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
<?php require 'blocks/footer.php';?>

<script>
    document.addEventListener("DOMContentLoaded", function (event){
        var editor = CKEDITOR.replace('editor')
    })
</script>
</body>
</html>

