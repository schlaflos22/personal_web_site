<?php 
require('db.php');
require('admin_db.php');
$user =  get_users_data($user);
//echo("This is ADMIN PAGE!Welcome!");
session_start();

    if($_SESSION['login'] !== $user['user_name'] && $_SESSION['password'] !== $user['user_password']) {
        header('Location: admin_login_page.php');
    }
// Разрешение на загрузку файлов
ini_set('file_uploads', 'On');
 
// Максимальное время выполнения скрипта в секундах
ini_set('max_execution_time', '60');
 
// Максимальное потребление памяти одним скриптом
ini_set('memory_limit', '64M');
 
// Максимально допустимый размер данных отправляемых методом POST
ini_set('post_max_size', '50M');
 
// Папка для хранения файлов во время загрузки
ini_set('upload_tmp_dir', 'home/user/temp');
 
// Максимальный размер загружаемого файла
ini_set('upload_max_filesize', '12M');
 
// Максимально разрешённое количество одновременно загружаемых файлов
ini_set('max_file_uploads', '10');



//echo($_POST['movie_name']);
 if($_POST) {
     
    $array_= array();
    $movie_id =get_count_of_elements();
    $id_arr = array_count_values($movie_id);
    $id = array_key_first($id_arr);
    $new_id = $id + 1;
    $movie_poster = $_FILES['movie_poster']['name'];
    $movie_name = $_POST['movie_name'];
    $movie_description = $_POST['movie_description'];
    $movie_video = $_POST['movie_video'];
    $movie_awards = $_POST['movie_awards'];
    $movie_festivals = $_POST['movie_festivals'];
     
    
   //Загрузка файла поcтера в директорию img
    
    if(!empty($_FILES['movie_poster'] && !$_FILES['movie_poster']['error'])) {
        $uploaddir = '/var/www/html/personal_web_site/img/';
        $upload_path = $uploaddir.basename($_FILES['movie_poster']['name']);
        $tmp_name = $_FILES['movie_poster']['tmp_name'];
        //echo 'Некоторая отладочная информация:';
        var_dump(copy($_FILES['movie_poster']['tmp_name'],$upload_path));
        //echo '<pre>';
        if (copy($_FILES['movie_poster']['tmp_name'],$upload_path)) {
            
            array_push($array_,$new_id,$movie_name,$movie_poster,$movie_description,$movie_video,$movie_awards,$movie_festivals);
           add_movie_data_in_dataBase($array_);
           
           echo "Файл корректен и был успешно загружен.\n";
        } else {
           echo "Возможная атака с помощью файловой загрузки!\n";
        }
    }
    
    for( $i =0;$i< count($_FILES['files']);$i++) {

        
    //загрузка фотографий для галлереи
        $userFileTmp = $_FILES['files']['tmp_name'][$i];
    
        //Сохраним в переменной исходное имя загруженного файла
        $file_name = $_FILES['files']['name'][$i];
        //Путь построим от корня сайта / и заменим временное имя файла обратно на свое
        $uploaddir = '/var/www/html/personal_web_site/img/';
                $uploadPath = $uploaddir.basename($_FILES['files']['name'][$i]);
        var_dump($userFileTmp);
        add_photos_data_in_dataBase($file_name,$new_id);
        //Если файл будет перемещен, функция вернет true
        if(copy($userFileTmp,  $uploadPath)){
            
            echo "Файл корректен и был успешно перемещен.";
        }else{
            echo "Файл не был перемещен!";
        }
    }
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
        <div class="container d-flex flex-column mt-6">
        <nav class="navbar navbar-light mb-5" style="background-color: #e3f2fd;">
       <a href="logout.php" class=" m-auto">Выход</a>
        </nav>
            <div class="col-md-12 mt-6">
                <h4>Фильмы</h4>
                <form action="admin_new_movie.php" enctype="multipart/form-data" method="POST" class="col-md-12">
                <div class="mt-3 d-flex flex-column">
                    <input type="text" class="form-control mt-3" name ="movie_name" placeholder="Название">
                    <input type="file" class="form-control mt-3"  name ="movie_poster" placeholder="Постер">
                    <textarea type="textarea" class="form-control mt-3" name ="movie_description" placeholder="Описание"></textarea>
                    <input type="text" class="form-control mt-3" name ="movie_video" placeholder="Видео">
                    <textarea type="textarea" class="form-control mt-3" name="movie_awards" placeholder="Награды"></textarea>
                    <textarea type="textarea" class="form-control mt-3" name ="movie_festivals" placeholder="Фестивали"></textarea>

                </div>      
                <div class="mt-3 d-flex flex-column">
                    <h4>Загрузить фотографии в галерею</h4>
                    <input type="file" name="files[]" multiple/>
                    
                    
                </div>
                <div class="col-md-6 mt-3">
                    <button type="submit" name="submit">Добавить</button>
                </div>
                </form>
                
            </div>
            <nav class="navbar navbar-light mt-5" style="background-color: #e3f2fd;">
                <a href="admin_page.php" class=" m-auto">На главную</a>
            </nav>
        </div>
       
    </body>
</html>