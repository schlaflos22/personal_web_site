<?php
$login = "Eva";
$password = "123";
    if($_POST['login']=== $login && $_POST['password'] === $password) {
        
        session_start();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: admin_page.php');

    }
?>