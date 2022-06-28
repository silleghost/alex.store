<?php
    session_start();
    require_once 'connect.php';

    $login = strtolower($_POST['login']);
    $name = $_POST['name'];
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['password_confirm'];

    require_once 'check_login.php';
    require_once 'check_email.php';

    if ($password == $confirm){
        $str = rand();
        $password = hash("sha256",$password . $str);
        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `name`, `email`, `password`, `salt`) VALUES (NULL, '$login', '$name', '$email', '$password', '$str')");
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('location: ../auth.php');
    } else {
        $_SESSION['error'] = 'Пароли не совпадают';
        header('location: ../register.php');
    }

