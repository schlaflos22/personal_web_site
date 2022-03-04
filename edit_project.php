<?php
require('db.php');
require('admin_db.php');
$user =  get_users_data($user);
//echo("This is ADMIN PAGE!Welcome!");
session_start();

    if($_SESSION['login'] !== $user['user_name'] && $_SESSION['password'] !== $user['user_password']) {
        header('Location: admin_login_page.php');
    }
    if(isset($_POST)) {
      
      delete_project($_POST['project_id']);
      unlink('img/'.''.$_POST['project_image'].'');
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
            <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAME</th>
      <th scope="col">Delete</th>
      <th scope="col">Change</th>
      
    </tr>
  </thead>
  <tbody>
    <!--cycle-->
    <?php 
     $projects = get_projects_All($projects);
     foreach($projects as $project) {
      // var_dump($project);
    ?>
    <tr>
      <form action="edit_project.php" enctype="multipart/form-data" method="POST">
      <th scope="row"><input name="project_id" value="<?php echo $project['project_id']?>" type="text" style="display:none;"><?php echo $project['project_id']?></th>
      <td><?php echo $project['project_name']?></td>
      <input type="hidden"name="project_image" value="<?php echo $project['project_image']?>">
      <td><button type="submit">DELETE</button></td>
      </form>
      <td><button onclick= "location.href='edit_project_single.php?id=<?php echo $project['project_id']?>'">CHANGE</button></td>
    </tr>
    <?php }?>
  </tbody>
</table>
               
            </div>
            <nav class="navbar navbar-light mt-5" style="background-color: #e3f2fd;">
              <a href="admin_page.php" class=" m-auto">На главную</a>
            </nav>
        </div>
        
       
    </body>