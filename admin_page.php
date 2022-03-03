<?php
require('db.php');
$user =  get_users_data($user);
echo("This is ADMIN PAGE!Welcome!");
session_start();

    if($_SESSION['login'] !== $user['user_name'] && $_SESSION['password'] !== $user['user_password']) {
        header('Location: admin_login_page.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    
    <body>
        <nav class="navbar navbar-light mb-5" style="background-color: #e3f2fd;">
       <a href="logout.php" class=" m-auto">Выход</a>
        </nav>

        <div class="container d-flex flex-column mt-6">
            <div class="col-md-6 mt-6">
                <h4>Фильмы</h4>
                <button class="btn btn-secondary" onclick="location.href='admin_new_movie.php'">Создать новую запись</button>
                <button class="btn btn-warning" onclick="location.href='edit_movie.php'">Редактировать существующую</button>
            </div>
            <div class="col-md-6 mt-6">
                <h4>Проекты</h4>
                <button class="btn btn-secondary"  onclick="location.href='admin_new_project.php'">Создать новую запись</button>
                <button class="btn btn-warning"  onclick="location.href='edit_project.php'"> Редактировать существующую</button>
            </div>
        </div>
        <nav class="navbar navbar-light mt-5" style="background-color: #e3f2fd;">
       <a href="index.php" class=" m-auto">Вернуться на сайт</a>
        </nav>
    </body>