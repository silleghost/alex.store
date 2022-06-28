<?php
session_start();
require_once 'connect.php';

$login = strtolower($_POST['login']);
$name = $_POST['name'];
$email = strtolower($_POST['email']);
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$current_id = $_SESSION['user']['id'];

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$current_id'");
$user = mysqli_fetch_assoc($check_user);

if($login != $_SESSION['user']['login']){
    require_once 'check_login.php';
}

if($email != $_SESSION['user']['email']){
    require_once 'check_email.php';
}

if ($user['password'] == hash("sha256", $old_password . $user['salt'])){
    $new_password = hash("sha256", $new_password . $user['salt']);
    mysqli_query($connect, "UPDATE `users` SET `login` = '$login', `name` = '$name', `email` = '$email', `password` = '$new_password' WHERE `users`.`id` = '$current_id' ");
} else {
    $_SESSION['error'] = 'Неверный пароль';
    header('location: ../profile.php');
    die('Wrong password');
}
$_SESSION['message'] = 'Данные успешно изменены';
require_once 'logout.php';
header('location: ../auth.php');