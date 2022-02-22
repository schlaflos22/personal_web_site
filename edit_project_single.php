<?php
require('db.php');
require('admin_db.php');

$url = $_SERVER['REQUEST_URI'];
parse_str($url, $get);
$arr_ = array_flip($get);
$id = array_key_last($arr_);
var_dump($id);
if($_POST) {

    $array_= array();
    $project_image = $_FILES['image']['name'];
    $project_logline_h4= $_POST['logline_h4'];
    $project_logline = $_POST['logline'];
    $project_conflict_h4= $_POST['conflict_h4'];
    $project_conflict = $_POST['conflict'];
    $project_idea_h4= $_POST['idea_h4'];
    $project_idea = $_POST['idea'];
    $project_relevance_h4= $_POST['relevance_h4'];
    $project_relevance= $_POST['relevance'];
    $project_reason_h4= $_POST['reason_h4'];
    $project_reason = $_POST['reason'];
    $project_purpose_h4= $_POST['purpose_h4'];
    $project_purpose = $_POST['purpose'];
    $project_uniqueness_h4= $_POST['uniqueness_h4'];
    $project_uniqueness = $_POST['uniqueness'];
   
     
    
    if($_FILES['image'] && !$_FILES['image']['error']) {
        $uploaddir = '/var/www/html/personal_web_site/img/';
        $upload_path = $uploaddir.basename($_FILES['image']['name']);
        $tmp_name = $_FILES['image']['tmp_name'];
        //echo 'Некоторая отладочная информация:';
       // var_dump(copy($_FILES['image']['tmp_name'],$upload_path));
        //echo '<pre>';
        if (copy($_FILES['image']['tmp_name'],$upload_path)) {
            array_push($array_,$id,$project_image,$project_logline_h4,$project_logline,$project_conflict_h4,$project_conflict,$project_idea_h4,$project_idea,$project_relevance_h4,$project_relevance,$project_reason_h4,$project_reason,$project_purpose_h4, $project_purpose,$project_uniqueness_h4, $project_uniqueness);
            change_project_data_in_dataBase($array_,$id);
            echo "Файл корректен и был успешно загружен.\n";
        } else {
           echo "Возможная атака с помощью файловой загрузки!\n";
        }
    };
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
                <h4>Проект</h4>
                <?php $projects = get_project_for_id($id) ; 
                foreach($projects as $project) {
                   
                
                ?>
                <form action="<?php $PHP_SELF ?>" enctype="multipart/form-data" method="POST" class="col-md-12">
                <div class="mt-3 d-flex flex-column">
                    <input type="file" class="form-control mt-3" name ="image" placeholder="Изображение" value = "<?php echo $project["project_image"]?>">
                    <input type="text" class="form-control mt-3" name ="logline_h4" placeholder="Логлайн h4" value = "<?php echo $project["project_logline_h4"]?>">
                    <textarea type="textarea" class="form-control mt-3" name ="logline" placeholder="Логлайн"><?php echo $project["project_logline"]?></textarea>
                    <input type="text" class="form-control mt-3" name ="conflict_h4" placeholder="Конфликт_h4"value="<?php echo $project["project_conflict_h4"]?>">
                    <textarea type="textarea" class="form-control mt-3" name="conflict" placeholder="Конфликт"><?php echo $project["project_conflict"]?></textarea>
                    <input type="text" class="form-control mt-3" name ="idea_h4" placeholder="Идея_h4" value="<?php echo $project["project_idea_h4"]?>">
                    <textarea type="textarea" class="form-control mt-3" name="idea" placeholder="Идея"><?php echo $project["project_idea"]?></textarea>
                    <input type="text" class="form-control mt-3" name ="relevance_h4" placeholder="Актуальность_h4" value="<?php echo $project["project_relevance_h4"]?>">
                    <textarea type="textarea" class="form-control mt-3" name="relevance" placeholder="Актуальность"><?php echo $project["project_relevance"]?></textarea>
                    <input type="text" class="form-control mt-3" name ="reason_h4" placeholder="Почему я хочу снять этот фильм_h4" value="<?php echo $project["project_reason_h4"]?>">
                    <textarea type="textarea" class="form-control mt-3" name="reason" placeholder="Почему я хочу снять этот фильм"><?php echo $project["project_reason"]?></textarea>
                    <input type="text" class="form-control mt-3" name ="purpose_h4" placeholder="Цель_h4"value="<?php echo $project["project_purpose_h4"]?>">
                    <textarea type="textarea" class="form-control mt-3" name="purpose" placeholder="Цель"><?php echo $project["project_purpose"]?></textarea>
                    <input type="text" class="form-control mt-3" name ="uniqueness_h4" placeholder="Уникальность_h4"value="<?php echo $project["project_uniqueness_h4"]?>">
                    <textarea type="textarea" class="form-control mt-3" name="uniqueness" placeholder="Уникальность"><?php echo $project["project_uniqueness"]?></textarea>
               <?php } ?>
                </div>
                <div class="col-md-6 mt-3">
                    <button type="submit">Сохранить изменения</button>
                </div>
                </form>
            </div>
            
        </div>
    </body>