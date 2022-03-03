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
ini_set('upload_max_filesize', '20M');
 
// Максимально разрешённое количество одновременно загружаемых файлов
ini_set('max_file_uploads', '10');

$url = $_SERVER['REQUEST_URI'];
parse_str($url, $get);
$arr_ = array_flip($get);
$id = array_key_last($arr_);
// var_dump($id);
// var_dump($_FILES);
// var_dump($_POST);
 if($_POST && $_FILES) {
    var_dump(1);
    $new_array_ = array();
    //var_dump($_POST['movie_name']);
    $new_movie_name = $_POST['movie_name']; 
    $new_movie_poster = $_FILES['movie_poster']['name']; 
    $new_movie_description =$_POST['movie_description'];
    $new_movie_video = $_POST['movie_video'];
    $new_movie_awards=$_POST['movie_awards'];
    $new_movie_festivals =$_POST['movie_festivals'];
    //var_dump(copy($_FILES['movie_poster']['tmp_name'],$upload_path));
    //echo '<pre>';
    // copy($_FILES['movie_poster']['tmp_name'],$upload_path);
    //var_dump($new_array_);
    array_push($new_array_,$id,$new_movie_name,$new_movie_poster,$new_movie_description,$new_movie_video,$new_movie_awards,$new_movie_festivals);
  
        change_movie_data_in_dataBase($new_array_,$id);  
    if(!empty($_FILES['movie_poster'] && !$_FILES['movie_poster']['error'])) {
        $uploaddir = '/var/www/html/personal_web_site/img/';
        $upload_path = $uploaddir."".basename($_FILES['movie_poster']['name']);
        $tmp_name = $_FILES['movie_poster']['tmp_name'];
        //echo 'Некоторая отладочная информация:';
       
        if (copy($_FILES['movie_poster']['tmp_name'],$upload_path)) {
           
            echo "Файл корректен и был успешно загружен.\n";
        } else {
           echo "Возможная атака с помощью файловой загрузки!\n";
        }
    }
  
    
      
    //  //ззамена фотографий галереи
    //  for( $i =0;$i< count($_FILES['files']);$i++) {

        
    //     //загрузка фотографий для галлереи
    //         $userFileTmp = $_FILES['files']['tmp_name'][$i];
        
    //         //Сохраним в переменной исходное имя загруженного файла
    //         $file_name = $_FILES['files']['name'][$i];
    //         //Путь построим от корня сайта / и заменим временное имя файла обратно на свое
    //         $uploaddir = '/var/www/html/personal_web_site/img/';
    //                 $uploadPath = $uploaddir.basename($_FILES['files']['name'][$i]);
    //         var_dump($userFileTmp);
    //         add_data_in_dataBase($file_name,$new_id);
    //         //Если файл будет перемещен, функция вернет true
    //         if(copy($userFileTmp,  $uploadPath)){
                
    //             echo "Файл корректен и был успешно перемещен.";
    //         }else{
    //             echo "Файл не был перемещен!";
    //         }
    //     }
   
   
        
        
   
       
//     for( $i =0;$i< count($_FILES['files']['name']);$i++) {

//         $img_id=get_image_id($id);
//         var_dump($img_id);
//         //загрузка фотографий для галлереи
//             $userFileTmp = $_FILES['files']['tmp_name'][$i];
        
//             //Сохраним в переменной исходное имя загруженного файла
//             $file_name = $_FILES['files']['name'];

//             foreach( $file_name as $key => $name) {
//                 var_dump($file_name[$key]);
//                 change_photos_data_in_dataBase($file_name[$key],$id);
//             //Путь построим от корня сайта / и заменим временное имя файла обратно на свое
//             $uploaddir = '/var/www/html/personal_web_site/img/';
//                     $uploadPath = $uploaddir.$file_name[$key];
                
//             }
            
            
//             //var_dump($userFileTmp);
//             //Если файл будет перемещен, функция вернет true
//             if(copy($userFileTmp,  $uploadPath)){
               
//                 echo "Файл корректен и был успешно перемещен.";
//             }else{
//                 echo "Файл не был перемещен!";
//             }
//     }
  

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
                    <button type="submit" name="1" >Сохранить изменения</button>
                </div>
        </form>
      
        <button onclick= "location.href='delete_photos.php?id=<?php echo $movie['movie_id']?>'">Удалить фотографии из галереи</button>
                
</div>   
        <nav class="navbar navbar-light mt-5" style="background-color: #e3f2fd;">
       <a href="edit_movie.php" class=" m-auto">К списку фильмов</a>
        </nav>
         
    </body>
    </html>"