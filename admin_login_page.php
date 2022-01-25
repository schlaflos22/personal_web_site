<?php 
    require('login.php');
    
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
        <link rel="stylesheet" href="css/projects.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <style>
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }
    </style>
    <body>
        <main class="">
            <form action="login.php" method="POST" class="mt-6 col-md-6 d-flex flex-column justify-content-center align-items-center">
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Login</label>
                    <input type="text" class="form-control" name="login" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlInput2" class="form-label">Password</label>
                   <input type="password" class="form-control" name="password" id="exampleFormControlInput2" placeholder="">
                </div>
                <div class="mb-3 d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-primary mb-3">Войти</button>
                </div>
            </form>      
        </main>
    </body>
</html>