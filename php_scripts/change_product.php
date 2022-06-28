<?php
session_start();
require_once 'connect.php';

$id = $_POST['id'];
$description = $_POST['description'];

mysqli_query($connect, "UPDATE `products` SET description = '$description' WHERE id = '$id'");
header('location: ../index.php');