<?php
    session_start();
    require_once 'connect.php';

    $login = strtolower($_POST['login']);
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    if(mysqli_num_rows($check_user)>0){
        $user = mysqli_fetch_assoc($check_user);
        if ($user['password'] == hash("sha256", $password . $user['salt'])){
            $_SESSION['user'] = [
                'id' => $user['id'],
                'login'=> $user['login'],
                'name' => $user['name'],
                'email' => $user['email']
            ];
            header('location: ../index.php');
        } else {
            $_SESSION['message'] = 'Неверный логин или пароль';
            header('location: ../auth.php');
        }
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('location: ../auth.php');
    }
