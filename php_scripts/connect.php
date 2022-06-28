<?php

    $connect = mysqli_connect('localhost','root', 'root', 'alex_store');

    if (!$connect) {
        die('Database connection error');
    }
