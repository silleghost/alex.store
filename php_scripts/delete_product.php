<?php
session_start();
require_once 'connect.php';

$id = $_POST['id'];
echo $id;

mysqli_query($connect, "DELETE FROM `products` WHERE `id` = '$id'");
header('location: ../index.php');