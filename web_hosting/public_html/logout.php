<?php session_start();
    unset($_SESSION['logged_user_login']);  
    header('Location: /');
?>