<?php 
require('db.php');
require('admin_db.php');
$url = $_SERVER['REQUEST_URI'];
parse_str($url, $get);
$arr_ = array_flip($get);
$id = array_key_last($arr_);
if($_POST['checked']){
    $images = get_images_for_gallery($id);
    
$checked = $_POST["checked"];
foreach($checked as $image_id) {
    var_dump($image_id);
    foreach($images as $image){
        unlink('img/'.''.$image["image_"].'');
    }
    delete_photos($image_id);
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
            <form action="delete_photos.php?id=<?php echo $id?>" enctype="multipart/form-data" method="POST" class="col-md-12"> 
               <?php $images = get_images_for_gallery($id);
                foreach($images as $image) { ?>
                <img src="img/<?php echo $image['image_'] ?>" id="<?php echo $image['image_id'];?>" style="width: 100px;height: 60px">
                <input type="checkbox" name="checked[]" value="<?php echo $image['image_id'];?>">
                <?php }?>
                <button type="submit">DELETE </button>
            </form>
            <nav class="navbar navbar-light mt-5" style="background-color: #e3f2fd;">
                <a href="add_new_image.php?id=<?php echo $id?>" class=" m-auto">Добавить новые фото</a>
            </nav>
        </div>
    </body>
</html>