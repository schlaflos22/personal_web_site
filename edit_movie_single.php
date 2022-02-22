<?php
require('db.php');
require('admin_db.php');

$url = $_SERVER['REQUEST_URI'];
parse_str($url, $get);
$arr_ = array_flip($get);
$id = array_key_last($arr_);
var_dump($id);
var_dump($_FILES);
var_dump($_POST);
if($_POST['btn']) {
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
    copy($_FILES['movie_poster']['tmp_name'],$upload_path);
    //var_dump($new_array_);
    array_push($new_array_,$id,$new_movie_name,$new_movie_poster,$new_movie_description,$new_movie_video,$new_movie_awards,$new_movie_festivals);
  
        change_movie_data_in_dataBase($new_array_,$id);  
    if(!empty($_FILES['movie_poster'] && !$_FILES['movie_poster']['error'])) {
        $uploaddir = '/var/www/html/personal_web_site/img/';
        $upload_path = $uploaddir.basename($_FILES['movie_poster']['name']);
        $tmp_name = $_FILES['movie_poster']['tmp_name'];
        //echo 'Некоторая отладочная информация:';
        copy($_FILES['movie_poster']['tmp_name'],$upload_path);
            
            
           
        //    echo "Файл корректен и был успешно загружен.\n";
        // } else {
        //    echo "Возможная атака с помощью файловой загрузки!\n";
        // }
        }
  

   
  
   
        
     
      
        var_dump($_FILES['files']);    
       for($i =0;$i<count($_FILES['files']['name']);$i++) {
            
                
                //array_push($arr_photos,);
                //var_dump($file_name);
                $img_id=get_image_id($id);
                $file_name = $_FILES['files']['name'][$i];
               var_dump($img_id);
              
                $uploadPath= '/var/www/html/personal_web_site/img/'."".basename($_FILES['files']['name'][$i]);
                  if(copy($_FILES['files']['tmp_name'][$i], $uploadPath)) {
                    echo 'File successfully uploaded to uploads/'. "</br>";
                    change_photos_data_in_dataBase($file_name,$id,$img_id[$i]);                
                        
                   
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
        <form action="<?php $PHP_SELF ?>" enctype="multipart/form-data" method="POST" class="col-md-12">
        <?php $movie = get_movie_by_id($id); ?>
                <div class="mt-3 d-flex flex-column">
                    <input type="text" class="form-control mt-3" name ="movie_name" placeholder="Название" value = "<?php echo $movie["movie_name"]?>">
                    <input type="file" class="form-control mt-3"  name ="movie_poster" placeholder="Постер" value="./img/<?php echo $movie["movie_poster"]?>"/>
                    <textarea type="textarea" class="form-control mt-3" name ="movie_description" placeholder="Описание"><?php echo $movie["movie_description"]?></textarea>
                    <input type="text" class="form-control mt-3" name ="movie_video" placeholder="Видео" value="<?php echo $movie["movie_video"]?>">
                    <textarea type="textarea" class="form-control mt-3" name="movie_awards" placeholder="Награды"><?php echo $movie["movie_awards"]?></textarea>
                    <textarea type="textarea" class="form-control mt-3" name ="movie_festivals" placeholder="Фестивали" value=""><?php echo $movie["movie_festivals"]?></textarea>

                </div>      
                <div class="mt-3 d-flex flex-column">
                    <h4>Загрузить фотографии в галерею</h4>
                    <input name="files[]" type="file" multiple/>
                </div>
                <div class="col-md-6 mt-3">
                    <button type="submit" name="btn">Сохранить изменения</button>
                </div>
        </form>
    </body>