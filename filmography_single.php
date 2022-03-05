<?php 
require('db.php');
$url = $_SERVER['REQUEST_URI'];
parse_str($url, $get);
$arr_ = array_flip($get);
$id = array_key_last($arr_);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/filmography_single.css" type="text/css">
    <style>
        
     </style>
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
                    <div class="menu">
                        <ul>
                            <li><a href="index.php" class="link" >Об Авторе</a></li>
                            <li><a href="filmography_main.php" class="link" >Фильмография</a></li>
                            <li><a href="projects.php" class="link">Проекты</a></li>
                            <li><a href="contacts.php" class="link">Контакты</a></li>
                        </ul>
                    </div>
                    <div class="mobile-menu">
                        <input type="checkbox" id="checkbox" class="mobile-menu__checkbox">
                        <label for="checkbox" class="mobile-menu__btn"><div class="mobile-menu__icon"></div></label>
                        <div class="mobile-menu__container">
                            <ul class="mobile-menu__list">
                                <li class="mobile-menu__item"><a href="index.php" class="mobile-menu__link">Об Авторе</a></li>
                                <li class="mobile-menu__item"><a href="filmography_main.php" class="mobile-menu__link" >Фильмография</a></li>
                                <li class="mobile-menu__item"><a href="projects.php" class="mobile-menu__link">Проекты</a></li>
                                <li class="mobile-menu__item"><a href="contacts.php" class="mobile-menu__link">Контакты</a></li>
                            </ul>       
                        </div>
                    </div>
                </div>
                <div class="main">
                <?php $movie = get_movie_by_id($id); ?>
                    <div class="single-content">
                        <div class="single_body">
                            <div class="single-left_side">
                                <img src="./img/<?php echo $movie["movie_poster"]?>" alt="" id="<?php echo $movie["movie_id"]?>">
                            </div>
                            <div class="single-right_side">
                                <h2><?php echo $movie["movie_name"]?></h2>
                                <p><?php echo $movie["movie_description"]?></p>
                               <iframe class="video_recording" src="<?php echo $movie["movie_video"]?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <p><?php echo $movie["movie_awards"]?></p>
                                <p><?php echo $movie["movie_festivals"]?></p>
                            </div>
                        </div>
                        <?php
                        $images = get_images_for_gallery($id);
                       if ( $images ) {
                        ?>
                        <div class="single-footer">
                            <div id="backstage_gallery">
                                <div class="image_slides">
                                    <div class="slide active">
                                       <img src="img/<?php echo $images[0]['image_']?>">
                                    </div>
                                </div>
                                <div class="trumbnails">
                                    <?php foreach($images as $image){?> 
                                    <div class="trumbnail">
                                        <img class="trumbnail_image" src="img/<?php echo $image["image_"]?>" alt="">
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                       <?php }?>
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