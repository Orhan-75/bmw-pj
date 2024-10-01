<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy();
    header("Location: ../page/admin-login.html");
    exit;
}
else{
    header("Location: ../page/admin-dashboard.php");
}
?>