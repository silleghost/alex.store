<?php session_start();
require_once 'php_scripts/connect.php'
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>О товаре</title>
    <link href="img/icon.png" rel="icon">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/change-description.js"></script>
    <script src="ckeditor4/ckeditor.js"></script>
</head>
<body>
<?php require 'blocks/header.php';
$id = $_POST['id'];
$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
$product = mysqli_fetch_all($product);
?>
<div class="container-main">
    <div class="container-title">
        О товаре
    </div>
    <div class="product-info">
        <div class="product-info-title"><?= $product[0][1] ?></div>
        <div class="product-info-main">
            <div class="product-info-left">
                <img src="<?= $product[0][5] ?>" alt="" class="product-info-left-image">
            </div>
            <div class="product-info-right">
                <div class="product-info-right-description">
                    Описание:
                    <p>
                    <?= $product[0][3] ?>
                    </p>
                </div>
                <?php
                if($_SESSION['user']['id'] == 1){
                ?>
                <a class="button" id="show">Изменить описание:</a>
                <div class="change-description">
                    <form method="post" action="php_scripts/change_product.php">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <label for="editor">Описание</label>
                        <textarea name="description" id="editor" class="editor"></textarea>
                        <button type="submit" >Изменить товар</button>
                    </form>

                    <form method="post" action="php_scripts/delete_product.php" style="margin-top: 10%">
                        <input type="hidden" name="id" value="<?= $id ?>">
                </div>
                    <button type="submit" class="product-info-right-remove-button">
                        Удалить товар
                    </button>
                    <?php
                }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'blocks/footer.php';?>
<script>
    document.addEventListener("DOMContentLoaded", function (event){
        var editor = CKEDITOR.replace('editor')
    })
</script>
</body>
</html>
