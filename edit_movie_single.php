<?php
require('db.php');
require('admin_db.php');
$user =  get_users_data($user);
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
ini_set('upload_max_filesize', '20M');
 
// Максимально разрешённое количество одновременно загружаемых файлов
ini_set('max_file_uploads', '10');

$url = $_SERVER['REQUEST_URI'];
parse_str($url, $get);
$arr_ = array_flip($get);
$id = array_key_last($arr_);
 if($_POST && $_FILES) {
    var_dump(1);
    $new_array_ = array();
    $new_movie_name = $_POST['movie_name']; 
    $new_movie_poster = $_FILES['movie_poster']['name']; 
    $new_movie_description =$_POST['movie_description'];
    $new_movie_video = $_POST['movie_video'];
    $new_movie_awards=$_POST['movie_awards'];
    $new_movie_festivals =$_POST['movie_festivals'];
    array_push($new_array_,$id,$new_movie_name,$new_movie_poster,$new_movie_description,$new_movie_video,$new_movie_awards,$new_movie_festivals);
    change_movie_data_in_dataBase($new_array_,$id);  
    if(!empty($_FILES['movie_poster'] && !$_FILES['movie_poster']['error'])) {
        $uploaddir = '/var/www/html/personal_web_site/img/';
        $upload_path = $uploaddir."".basename($_FILES['movie_poster']['name']);
        $tmp_name = $_FILES['movie_poster']['tmp_name'];
        if (copy($_FILES['movie_poster']['tmp_name'],$upload_path)) {
           echo "Файл корректен и был успешно загружен.\n";
        } else {
           echo "Возможная атака с помощью файловой загрузки!\n";
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
            <form  action="<?php $PHP_SELF ?>" enctype="multipart/form-data" method="POST" class="col-md-12">
            <?php $movie = get_movie_by_id($id); ?>
                <div class="mt-3 d-flex flex-column">
                    <input type="text" class="form-control mt-3" name ="movie_name" placeholder="Название" value = "<?php echo $movie["movie_name"]?>">
                    <input type="file" class="form-control mt-3"  name ="movie_poster" placeholder="Постер" value="./img/<?php echo $movie["movie_poster"]?>"/>
                    <textarea type="textarea" class="form-control mt-3" name ="movie_description" placeholder="Описание"><?php echo $movie["movie_description"]?></textarea>
                    <input type="text" class="form-control mt-3" name ="movie_video" placeholder="Видео" value="<?php echo $movie["movie_video"]?>">
                    <textarea type="textarea" class="form-control mt-3" name="movie_awards" placeholder="Награды"><?php echo $movie["movie_awards"]?></textarea>
                    <textarea type="textarea" class="form-control mt-3" name ="movie_festivals" placeholder="Фестивали" value=""><?php echo $movie["movie_festivals"]?></textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <button type="submit">Сохранить изменения</button>
                </div>
            </form>
            <button onclick= "location.href='delete_photos.php?id=<?php echo $movie['movie_id']?>'">Удалить фотографии из галереи</button>
            <a href="add_new_image.php?id=<?php echo $id?>" class=" m-auto">Добавить новые фото</a>
        </div>   
        <nav class="navbar navbar-light mt-5" style="background-color: #e3f2fd;">
            <a href="edit_movie.php" class=" m-auto">К списку фильмов</a>
        </nav>
    </body>
</html>