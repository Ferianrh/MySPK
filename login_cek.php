<?php
session_start();
include_once('connection.php');
    $user = $_POST['user'];
    $pass = $_POST['password'];
    if(isset($_POST['login'])){
        
        $_SESSION['status'] = 'login';
        
        header('Location: index.php');
        exit;
    }
?>