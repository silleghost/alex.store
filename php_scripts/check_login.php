<?php
$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
if(mysqli_num_rows($check_login) > 0){
    $_SESSION['error'] = 'Логин уже занят';
    if($_SESSION['user']){
        header('location: ../blocks/change.php');
    } else {
        header('location: ../register.php');
    }
    die('Invalid login');
}