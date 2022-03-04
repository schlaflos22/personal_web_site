<?php 
 require('db.php');
 

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
    <link rel="stylesheet" href="css/projects.css">
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
                    <div class="flex-wrapper">
                        <div class="slider-wrapper">
                            <div id="btn-prev">
                                <img src="./img/btn-prev.png" alt="">
                           </div>
                            <?php
                                $projects =  get_projects_All();
                            ?>
                            <?php foreach($projects as $project){?>
                           <div class="slide">
                                <img src="./img/<?php echo $project["project_image"]?>" alt="">
                                <div class="img-description">
                                    <h4><?php echo $project["project_logline_h4"]?></h4>
                                    <p><?php echo $project["project_logline"]?></p>
                                    <h4><?php echo $project["project_conflict_h4"]?></h4>
                                    <p><?php echo $project["project_conflict"]?></p>
                                    <h4><?php echo $project["project_idea_h4"]?></h4>
                                    <p><?php echo $project["project_idea"]?></p>
                                    <h4><?php echo $project["project_purpose_h4"]?></h4>
                                    <p><?php echo $project["project_purpose"]?></p>
                                    <h4><?php echo $project["project_relevance_h4"]?></h4>
                                    <p><?php echo $project["project_relevance"]?></p>
                                    <h4><?php echo $project["project_uniqueness_h4"]?></h4>
                                    <p><?php echo $project["project_uniqueness"]?></p>
                                    <h4><?php echo $project["project_reason_h4"]?></h4>
                                    <p><?php echo $project["project_reason"]?></p>
                                </div>
                            </div>
                            <?php }?>
                            <div id="btn-next">
                                <img src="./img/btn-next.png" alt="" >
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
    <script src="js/projects_slider.js"></script>
</body>
</html>