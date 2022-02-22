<?php 

function add_movie_data_in_dataBase($array_) {
$conn = mysqli_connect("localhost", "root", "122", "movie_db");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "INSERT INTO movies VALUES ('$array_[0]', '$array_[1]', '$array_[2]', '$array_[3]', '$array_[4]', '$array_[5]','$array_[6]')";
if(mysqli_query($conn, $sql)){
    echo "Данные успешно добавлены";
    
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn); 
}
 
function add_project_data_in_dataBase($array_) {
$conn = mysqli_connect("localhost", "root", "122", "movie_db");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "INSERT INTO projects (`project_image`,`project_logline_h4`,`project_logline`,`project_conflict_h4`,`project_conflict`,`project_idea_h4`,`project_idea`,`project_relevance_h4`,`project_relevance`,`project_reason_h4`,`project_reason`,`project_purpose_h4`, `project_purpose`,`project_uniqueness_h4`, `project_uniqueness`) 
VALUES ('$array_[0]', '$array_[1]', '$array_[2]', '$array_[3]', '$array_[4]', '$array_[5]','$array_[6]','$array_[7]','$array_[8]','$array_[9]','$array_[10]','$array_[11]','$array_[12]', '$array_[13]','$array_[14]')";
  if(mysqli_query($conn, $sql)){
      echo "Данные успешно добавлены";
      
  } else{
      echo "Ошибка: " . mysqli_error($conn);
  }
  mysqli_close($conn); 
}
function add_photos_data_in_dataBase($file_name,$new_id) {
  $conn = mysqli_connect("localhost", "root", "122", "movie_db");
  if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
  }
  $sql = "INSERT INTO backstage_images (`image_`,`movie_id`) VALUES ('$file_name', '$new_id')";
  if(mysqli_query($conn, $sql)){
      echo "Данные успешно добавлены";
      
  } else{
      echo "Ошибка: " . mysqli_error($conn);
  }
  mysqli_close($conn); 
  }
  function change_movie_data_in_dataBase($new_array_,$id) {
    
    $conn = mysqli_connect("localhost", "root", "122", "movie_db");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $sql = "UPDATE movies SET movie_id= '$new_array_[0]',
    movie_name ='$new_array_[1]',
    movie_poster= '$new_array_[2]', 
    movie_description='$new_array_[3]',
    movie_video ='$new_array_[4]',
    movie_awards= '$new_array_[5]',
    movie_festivals= '$new_array_[6]'
     WHERE `movie_id`= $id;";
    if(mysqli_query($conn, $sql)){
        echo "Данные успешно добавлены";
        
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
  }
  function change_photos_data_in_dataBase($file_name,$id,$img_id) {
    
    $conn = mysqli_connect("localhost", "root", "122", "movie_db");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
   
//var_dump($file_name);
//var_dump($img_id);


//var_dump($file_name);

  $sql = "UPDATE backstage_images SET image_='$file_name',movie_id = '$id' WHERE movie_id = '$id' AND image_id = '$img_id';" ;

   
 
    if(mysqli_query($conn, $sql)){
    //  echo "Данные успешно добавлены";
        
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn); 
  }
  function change_project_data_in_dataBase($array_,$id) {
    
    $conn = mysqli_connect("localhost", "root", "122", "movie_db");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $sql = "UPDATE projects SET project_id= $array_[0],
    project_image ='$array_[1]',
    project_logline_h4='$array_[2]',
    project_logline= '$array_[3]',
    project_conflict_h4= '$array_[4]',
    project_conflict= '$array_[5]',
    project_idea_h4 = '$array_[6]',
    project_idea = '$array_[7]',
    project_relevance_h4='$array_[8]',
    project_relevance ='$array_[9]',
    project_reason_h4 = '$array_[10]',
    project_reason= '$array_[11]',
    project_purpose_h4 = '$array_[12]', 
    project_purpose = '$array_[13]',
    project_uniqueness_h4 = '$array_[14]', 
    project_uniqueness = '$array_[15]' 
    WHERE project_id = '$id'";
      if(mysqli_query($conn, $sql)){
          echo "Данные успешно добавлены";
          
      } else{
          echo "Ошибка: " . mysqli_error($conn);
      }
      mysqli_close($conn); 
  }
?>




