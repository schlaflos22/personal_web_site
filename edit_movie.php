<?php
require('db.php');
require('admin_db.php');
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
            <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAME</th>
      <th scope="col">Change</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <!--cycle-->
    <?php 
     $movies = get_movies_All();
     foreach($movies as $movie) {
    ?>
    <tr>
      <th class="movie_id" scope="row"><?php echo $movie['movie_id']?></th>
      <td><?php echo $movie['movie_name']?></td>
      <td><button onclick= "location.href='edit_movie_single.php?id=<?php echo $movie['movie_id']?>'">CHANGE</button></td>
      <td><button>DELETE</button></td>
    </tr>
    <?php }?>
  </tbody>
</table>
               
            </div>
            
        </div>
       
    </body>