<?php
session_start();
require_once 'connect.php';

$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];

$path = 'img/'.time().$_FILES['image']['name'];
if (!move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path)){
    $_SESSION['error'] = 'Файл не удалось загрузить';
    header('location: ../add_product.php');
}

mysqli_query($connect, "INSERT INTO `products` (`id`, `title`, `price`, `description`, `quantity`, `image`, `category`) VALUES (NULL, '$title', '$price', '$description', '$quantity', '$path', '$category') ");
$_SESSION['error'] = 'Данные успешно загружены';
header('location: ../index.php');
