<?php
require('db.php');

$user =  get_users_data($user);
//var_dump($user['user_name']);
var_dump($_POST["login"]);
if($_POST) {
    if( $user['user_name'] === $_POST['login'] && $user['user_password'] === $_POST['password']) {
        
        session_start();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
         header('Location: admin_page.php');
       
    } else {
        echo('NO');
    }
}

?>