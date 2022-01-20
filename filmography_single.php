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
    <link rel="stylesheet" href="css/filmography_single.css">
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
                    <div class="single-content">
                        <div class="single_body">
                            <div class="single-left_side">
                                <img src="./img/The Great Sinner_poster_jpeg_eng_mini.png" alt="">
                            </div>
                            <div class="single-right_side">
                                <h2>Игровой короткометражный фильм (14 мин)
                                    Великий Грешник (The Great Sinner) (2022)
                                </h2>
                                <h3>Постпродакшн</h3>
                                <p>Неофитка едет в храм к духовнику и на исповеди обнаруживает перед
                                    собой слабоумного человека. Во всеуслышанье он кается в том, что «маму не
                                    слушается». Исповедники потрясены его покаянием и чистотой веры. Ведь
                                    самые тяжелые уроки смирения – послушание родителям.</p>
                                <video class="video_recording" src="./file_example_MP4_480_1_5MG — копия.mp4" controls></video>
                            </div>
                        </div>
                        <div class="single-footer">
                            <h3>Backstage-фото</h3>
                            <div id="backstage_gallery"></div>
                        </div>
                    </div>
                </div>
                <footer>
                    <p>Copyright &copy; 2022</p>
                </footer>
            </div>
        </div>
    </div>
    <script src="js/backstage_gallery.js"></script>
</body>