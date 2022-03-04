<?php
require('db.php');
require('admin_db.php');
$user =  get_users_data($user);
session_start();
if($_SESSION['login'] !== $user['user_name'] && $_SESSION['password'] !== $user['user_password']) {
  header('Location: admin_login_page.php');
}
if(isset($_POST)) {
  delete_movie( $_POST['id']);
  unlink('img/'.''.$_POST['movie_poster'].'');
  $images = get_image_id($_POST['id']);
  foreach($images as $image){
  unlink('img/'.''.$image["image_"].'');
  }
  delete_photo($_POST['id']);
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
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
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
            <?php 
            $movies = get_movies_All();
            foreach($movies as $movie) {
            ?>
            <tr>
            <form action="edit_movie.php" enctype="multipart/form-data" method="POST">
              <th scope="row"><input name="id" value="<?php echo $movie['movie_id']?>" type="text" style="display:none;"><?php echo $movie['movie_id']?></th>
              <td ><?php echo $movie['movie_name']?></td>
              <input type="hidden" name="movie_poster" value="<?php echo $movie['movie_poster']?>">
              <td><button type="submit">DELETE </button></td>
            </form>
            <td><button onclick= "location.href='edit_movie_single.php?id=<?php echo $movie['movie_id']?>'">CHANGE</button></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a href="admin_page.php" class=" m-auto">На главную</a>
      </nav>
    </div>
    </body>
  </html>