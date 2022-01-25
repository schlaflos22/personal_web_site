<?php
require('db.php');
$user =  get_users_data();

if($_POST['login']=== $user['user_name'] && $_POST['password'] === $user['user_password']) {
        
    session_start();
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: admin_page.php');

}
?>