<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['admin_username'];
    $password = $_POST['password'];

    if ($username == 'safa' && $password === 'safa1') {
        session_start();
        $_SESSION['admin_username'] = $username;
        header('Location: ../page/admin-dashboard.php');
        exit();
    } 
    else {
        header('Location: ../page/admin-login.html');
        exit();
    }
}

?>