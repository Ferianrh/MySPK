<?php
// include_once('connection.php');
    $user = $_POST['user'];
    $pass = $_POST['password'];
    if(isset($_POST['login'])){
        session_start();
        $_SESSION['status'] = 'login';
        
        header('Location: index.php');
    }
?>