<?php 


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
    <link rel="stylesheet" href="css/contacts.css">
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
                    <div class="left-side">
                        <img src="./img/camera-left.png" alt="">
                    </div>
                    <div class="right-side">
                        <div class="icon_wrapper">
                            <img src="img/phone_icon_178750 1.png" alt="" id="author-phonenumber">
                            <label for="author-phonenumber"> + 4678892581</label>
                        </div>
                        <div class="icon_wrapper">
                            <img src="img/socialemailcircularbutton_80177 1.png" alt="" id="author-email">
                        </div>
                        <div class="icon_wrapper">
                            <img src="img/vk_icon-icons 1.png" alt="">
                        </div>
                        <div class="icon_wrapper">
                            <img src="img/instagram_icon-icons 1.png" alt="">
                        </div>
                        <div class="icon_wrapper">
                            <img src="img/facebook_icon-icons 1.png" alt="">
                        </div>
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