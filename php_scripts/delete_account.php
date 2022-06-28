<?php
session_start();
require_once 'connect.php';

$current_id = $_SESSION['user']['id'];
mysqli_query($connect, "DELETE FROM users WHERE id='$current_id'");

require_once 'logout.php';