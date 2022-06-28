<?php
$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if(mysqli_num_rows($check_email)>0){
    $_SESSION['error'] = 'Такая почта уже используется';
    if($_SESSION['user']){
        header('location: ../blocks/change.php');
    } else {
        header('location: ../register.php');
    }
    die('Invalid email');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['error'] = 'Введите корректный email';
    if($_SESSION['user']){
        header('location: ../blocks/change.php');
    } else {
        header('location: ../register.php');
    }
    die('Invalid email');
}