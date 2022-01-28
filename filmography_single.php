<?php 
require('db.php');

//подключить стили

$url = $_SERVER['REQUEST_URI'];
parse_str($url, $get);
$arr_ = array_flip($get);
$id = array_key_last($arr_);
echo $id;

  
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
   <link rel="stylesheet" href="css/filmography_single.css" type="text/css">
    <style>
        .single_body {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-column-gap: 20px;
            /*margin-top: 26px;*/
        }
        .single-left_side {
            grid-column: auto / span 1;
            width: 100%;
        }
        .single-right_side {
            grid-column: auto / span 3;
            width: 100%;
        }
        .single-left_side img {
            width: 100%;    
            object-fit: cover;
            /*margin-top: 0px;*/
        }

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
                <?php $movie = get_movie_by_id($id); ?>
                
                    <!--Сделать php вкрапления-->
                    <div class="single-content">
                        <div class="single_body">
                            <div class="single-left_side">
                                <img src="./img/<?php echo $movie["movie_poster"]?>" alt="" id="<?php echo $movie["movie_id"]?>">
                            </div>
                            <div class="single-right_side">
                                <h2><?php echo $movie["movie_name"]?></h2>
                                <p><?php echo $movie["movie_description"]?></p>
                                <video class="video_recording" src="<?php echo $movie["movie_video"]?>" controls></video>
                                <p><?php echo $movie["movie_awards"]?></p>
                                <p><?php echo $movie["movie_festivals"]?></p>
                            </div>
                        </div>
                        <div class="single-footer">
                            <div id="backstage_gallery">
                                <?php 
                                $images = get_images_for_gallery($id);
                                ?>
                                    
                                <div class="image_slides">
                                    <div class="slide active">
                                       
                                            <img src="<?php echo $images[0]['image']?>">
                                       
                                    </div>
                                </div>
                                <div class="trumbnails">
                                    <?php foreach($images as $image){?> 
                                    <div class="trumbnail">
                                        <img class="trumbnail_image" src="<?php echo $image["image"]?>" alt="">
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
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