
<?php 
 require('db.php');
 require("admin_db.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
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
                    <div class="movies">
                        <?php $movies = get_movies_All();
                        foreach($movies as $movie): ?>
                        <div class="movie">
                            <img src="./img/<?php echo $movie['movie_poster']?>" alt=""  onclick= "location.href='filmography_single.php?id=<?php echo $movie['movie_id']?>'" class="poster_image" id="<?php echo $movie['movie_id']?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <footer>
                    <p>Copyright &copy; 2022</p>
                </footer>
           </div>
        </div>
    </div>
</body>
</html>