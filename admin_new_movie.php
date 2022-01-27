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
   
    $movie_name = $_POST['movie_name'];
    var_dump($_SERVER["DOCUMENT_ROOT"]);
    $target_dir = $_SERVER["DOCUMENT_ROOT"]."/Movie/img";
    $target_file = $target_dir . "/".basename($_FILES["movie_poster"]["name"]);
    if(move_uploaded_file($_FILES["movie_poster"]["name"],$target_file)){
        echo "yes";
    }else {
        echo "err";
    }

    $movie_description = $_POST['movie_description'];
    $movie_video = $_POST['movie_video'];
    $movie_awards = $_POST['movie_awards'];
    $movie_festivals = $_POST['movie_festivals'];
    array_push($array_,$new_id,$movie_name,$movie_poster,$movie_description,$movie_video,$movie_awards,$movie_festivals);
    //var_dump($new_id);
    add_movie_data_in_dataBase($array_); 
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
                <div class="col-md-6 mt-3">
                    <button type="submit">Добавить</button>
                </div>
                </form>
            </div>
            
        </div>
    </body>
</html>