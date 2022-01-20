
<?php 


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
    <link rel="stylesheet" href="css/filmography_main.css">
</head>
<body>
    <div class="wrapper">
        <div class="back-wrapper">
            <div class="content-wrapper">
                <div class="languages">
                    <div class="lang-wrapper">
                        <span class="lang">RU </span>
                        <p> / </p>
                        <span class="lang"> EN</span>
                    </div>
                </div>
                <div class="header">
                    <div class="logo" onclick="location.href='index.php'">
                        <img src="img/logo_ .png" alt="">
                    </div>
                    <nav class="menu">
                        <ul>
                            <li><a href="index.php" class="link" >Об Авторе</a></li>
                            <li><a href="filmography_main.php" class="link" >Фильмография</a></li>
                            <li><a href="projects.php" class="link">Проекты</a></li>
                            <li><a href="contacts.php" class="link">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="main">
                    <!--Здесь перебор циклом php картинок фильма из БД SELECT ALL-->
                    <img src="./img/The Great Sinner_poster.png" alt="" class="poster_image" id="0">
                    <img src="./img/vlodke_poster_rus.png" alt=""class="poster_image">
                    <img src="./img/The_World_For_All_poster_eng.png" alt=""class="poster_image">
                    <img src="./img/2nd_Life_Poster.png" alt=""class="poster_image">
                    <img src="./img/Apples_poster_winners_ENG.png" alt=""class="poster_image">
                    <img src="./img/VideoOut_Poster_small.png" alt=""class="poster_image">
                </div>
                <footer>
                    <p>Copyright &copy; 2022</p>
                </footer>
           </div>
        </div>
    </div>
    
    <script src="js/detailed_view.js"></script>
    
   </body>
</html>