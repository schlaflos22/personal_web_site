
<?php 
require('db.php');
require('admin_db.php');
$url = $_SERVER['REQUEST_URI'];
parse_str($url, $get);
$arr_ = array_flip($get);
$id = array_key_last($arr_);
if(isset($_POST['save'])){
    for( $i =0;$i< count($_FILES['files']['name']);$i++) {
        $userFileTmp = $_FILES['files']['tmp_name'][$i];
        $file_name = $_FILES['files']['name'][$i];
        $uploaddir = '/var/www/html/personal_web_site/img/';
        $uploadPath = $uploaddir.basename($_FILES['files']['name'][$i]);
        add_photos_data_in_dataBase($file_name,$id);
        if(copy($userFileTmp,$uploadPath)){
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
            <form  action="<?php $PHP_SELF ?>" enctype="multipart/form-data" method="POST" class="col-md-12">
                <div class="mt-3 d-flex flex-column">
                    <h4>Загрузить фотографии в галерею</h4>
                    <input name="files[]" type="file" multiple/>
                </div> 
                <div class="col-md-6 mt-3">
                        <button type="submit" name="save">Сохранить фотографии</button>
                    </div>
            </form>  
            <nav class="navbar navbar-light mt-5" style="background-color: #e3f2fd;">
                <a href="edit_movie.php" class=" m-auto">К списку фильмов</a>
            </nav>
        </div>
    </body>
</html>