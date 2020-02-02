<?php
session_start();
    if(isset($_SESSION['status'])){
        unset($_SESSION['status']);
        session_unset();
        session_destroy();
        header('Location: login.php');
    }

?>