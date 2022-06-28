<?php session_start();
require_once 'php_scripts/connect.php'
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Moria's Dresses</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="img/icon.png" rel="icon">
    <script src="js/category_select.js" async></script>
</head>
<body>
<?php require 'blocks/header.php';
$products = mysqli_query($connect, "SELECT * FROM `products` ORDER BY quantity DESC ");
$products = mysqli_fetch_all($products);
?>
<div class="container-main">
    <div class="container-title">Купить платья по выгодной цене</div>
    <div class="container-category">
        <div class="category-button" id="all">Все платья</div>
        <div class="category-button" id="wedding">Свадебные платья</div>
        <div class="category-button" id="summer">Летние платья</div>
        <div class="category-button" id="other">Другие платья</div>
    </div>
    <div class="grid">
        <?php
            foreach ($products as $product){
                ?>
                <div class="card">
                    <form action="product_info.php" method="post" class="form-card">
                        <input type="hidden" name="id" value="<?= $product[0] ?>">
                        <input type="image" id="img" src="<?= $product[5] ?>" alt="">
                        <div class="card-label"><?= $product[1] ?></div>
                        <div class="card-price"><?= $product[2]?></div>
                        <div class="card-category"><?= $product[6]?></div>
                        <?php
                        if($product[4] > 0){
                            echo '<div class="card-availability">В наличии</div>';
                        } else {
                            echo '<div class="card-not-availability">Нет в наличии</div>';
                        }
                            ?>
                        <div class="card-button">Добавить в корзину</div>
                    </form>
                </div>
            <?php
            }
        ?>
        <?php
        if ($_SESSION['user']['id'] == 1){
            ?>
            <div class="card">
                <a class="button_plus" href="add_product.php"></a>
                <a class="card-button" href="add_product.php">Добавить товар</a>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php require 'blocks/footer.php';?>
</body>
</html>
