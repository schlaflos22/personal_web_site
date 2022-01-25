<?php 
 require('db.php');

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
                    <div class="flex-wrapper">
                        <div class="slider-wrapper">
                            <div id="btn-prev">
                                <img src="./img/btn-prev.png" alt="">
                           </div>
                            <?php
                                $projects =  get_projects_All();
                                //var_dump($projects);
                            ?>
                            <?php foreach($projects as $project){?>
                           <div class="slide">
                                <img src="<?php echo $project["project_image"]?>" alt="">
                                <div class="img-description">
                                    <h4><?php echo $project["project_logline_h4"]?></h4>
                                    <p><?php echo $project["project_logline_description"]?></p>
                                    <h4><?php echo $project["project_conflict_h4"]?></h4>
                                    <p><?php echo $project["project_conflict_description"]?></p>
                                    <h4><?php echo $project["project_idea_h4"]?></h4>
                                    <p><?php echo $project["project_idea_description"]?></p>
                                    <h4><?php echo $project["project_purpose_h4"]?></h4>
                                    <p><?php echo $project["project_purpose_description"]?></p>
                                    <h4><?php echo $project["project_relevance_h4"]?></h4>
                                    <p><?php echo $project["project_relevance_description"]?></p>
                                    <h4><?php echo $project["project_uniqueness_h4"]?></h4>
                                    <p><?php echo $project["project_uniqueness_description"]?></p>
                                    <h4><?php echo $project["project_reason_h4"]?></h4>
                                    <p><?php echo $project["project_reason_description"]?></p>
                                </div>
                            </div>
                            <?php }?>
                           <!--<div class="slide">
                               <img src="./img/for_three_days_page1.png" alt="">
                               <div class="img-description">
                                    <h4>Логлайн</h4>
                                    Мальчика возвращают обратно в детский дом приемные родители,
                                    лживо обещая вернуться через 3 дня. Осознав, через 2 часа
                                    приезжают обратно. Впервые благодарный маленький человек
                                    произносит слово «мама».
                                    
                                    <h4>Конфликт</h4>
                                    Вечное противоречие между желанием сделать счастливым
                                    ребенка-сироту и внутренней неподготовленностью и
                                    непониманием, насколько это тяжело
                                    и подчас не по силам каждому взрослому.
                                    <h4>Идея</h4>
                                    Снять документально-игровое кино в настоящем детском доме, в
                                    котором примут участие реальные воспитанники, что привлечет к
                                    ним дополнительное внимание и поможет в дальнейшем их
                                    усыновлению или опеке.
                                    <h4>Цель</h4>
                                    Научить людей более осознанно относиться к теме усыновления и
                                    не бояться трудностей, возникших на этом пути.
                                    <h4>Актуальность</h4>
                                    После принятия в РФ Закона Димы Яковлева количество людей,
                                    желающих усыновить ребенка из детского дома, в целом выросло.
                                    Но в некотором смысле однобокая подача информации и
                                    непроговаривание трудностей, возникших на этом пути, приводит
                                    приемных родителей к иллюзиям, а позднее — к разочарованиям.
                                    Наш полудокументальный фильм как раз призван привлечь
                                    внимание к осознанному принятию решений об усыновлении детей
                                    и в то же время с надеждой, что воспитанники детского дома,
                                    принявшие участие в фильме, смогут обрести полноценные семьи.
                                    <h4>Уникальность</h4>
                                    Возможность встроиться и наблюдать (с помощью камеры) за
                                    жизнью детей- сирот в привычных для них условиях, при этом
                                    предоставив шанс каждому почувствовать себя участниками
                                    игрового кино (стать актерами).
                                    <h4>Почему я хочу снять этот фильм?</h4>
                                    Накопленный опыт и личные обстоятельства привели меня к
                                    документальному кино и социальным темам в надежде хоть чуть-
                                    чуть сделать этот мир лучше.
                                </div>
                            </div>-->
                           <!-- <div class="slide">
                                <img src="./img/the_world_belongs_to_heroes_page1.png" alt="">
                                <div class="img-description">
                                    <h4>Логлайн</h4>
                                    У 13-летнего мальчика ДЦП. Он не ходит и не говорит, но сохранил
                                    все ментальные способности. Он мечтает стать режиссером. И в
                                    наших силах помочь ему попробовать себя в этой роли.
                                    
                                    <h4>Конфликт</h4>
                                    Расхожее мнение о жалости или неприятии людей с инвалидностью
                                    и их осознанное желание реализоваться, жажда встроиться в
                                    обычный мир людей.
                                    <h4>Цель</h4>
                                    Обратить внимание общества на богатый внутренний мир людей с
                                    ограниченными возможностями. Дать возможность инвалиду с ДЦП
                                    стать соучастником творческого процесса, осуществить его мечту
                                    попробовать себя в качестве режиссера.
                                    <h4>Актуальность</h4>
                                    В современном обществе, когда оно изменяет привычное
                                    пренебрежительное отношение к инвалидам в лучшую сторону, наш
                                    документальный фильм поможет не только конкретному герою
                                    реализовать свою мечту, но и в целом изменит отношение к людям
                                    с ограниченными возможностями, вселит в них надежду и научит не
                                    бояться заявлять о своих желаниях любым доступным способом.
                                    <h4>Уникальность</h4>
                                    Дать возможность главному герою с ДЦП реализовать свою мечту
                                    — снять короткометражный фильм по собственному сценарию,
                                    параллельно наблюдая за ним как за творцом и героем
                                    документального проекта. Продемонстрировать с экрана общение с
                                    ним на равных, сломать стереотипы жалости и превосходства по
                                    отношению к людям с ограниченными возможностями.
                                    <h4>Почему я хочу снять этот фильм?</h4>
                                    Потому что «болит» и откликается внутри, потому что накопленный
                                    опыт и личные обстоятельства привели меня к документальному
                                    кино и социальным темам в надежде хоть чуть-чуть сделать этот
                                    мир лучше и помочь кому-то конкретным делом
                                </div>
                            </div>-->
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