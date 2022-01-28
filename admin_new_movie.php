<?php 
require('db.php');
require('admin_db.php');
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
    array_push($array_,$new_id,$movie_name,$movie_poster,$movie_description,$movie_video,$movie_awards,$movie_festivals);
    //var_dump($new_id);
    add_movie_data_in_dataBase($array_); 
    $arr_photos = array();
    $photo_count= get_count_of_images();
    $id_photo_arr = array_count_values($photo_count);
    $id_photo = array_key_first($id_photo_arr);
    //var_dump($id_photo +1);
    $id_img = $id_photo + 1;
   //Загрузка файла поcтера в директорию img
    $uploaddir = '/var/www/html/Movie/img/';
    $uploadfile = $uploaddir . basename($_FILES['movie_poster']['name']);

    if (move_uploaded_file($_FILES['movie_poster']['tmp_name'], $uploadfile)) {
        
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    
    if (isset($_FILES['photo'])) {
        
        
        foreach ($_FILES["photo"]["name"] as $key => $error) {
            
            //array_push($arr_photos ,$id_img ,$_FILES["photo"]["name"][$key],$new_id);
            //add_photos_data_in_dataBase($arr_photos);
            if ($error == UPLOAD_ERR_OK) {
                $uploaddir = '/var/www/html/Movie/img/';
                
                    $tmp_name = $_FILES["photo"]["tmp_name"][$key];
                // for tmp_name ++
                 var_dump(count($_FILES["photo"]["name"][$key]));
                

                var_dump(count($tmp_name));
                $name = basename($_FILES["photo"]["name"][$key]);
                if( move_uploaded_file($tmp_name, $uploaddir.$name)) {
                    echo "Файл image корректен и был успешно загружен.\n";
                }else {
                    echo "NO::NO";
                }
               
                
            }
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
                    <input name="photo[]" type="file" multiple/>
                    
                </div>
                <div class="col-md-6 mt-3">
                    <button type="submit">Добавить</button>
                </div>
                </form>
            </div>
            
        </div>
    </body>
</html>