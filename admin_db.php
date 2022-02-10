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
  $sql = "INSERT INTO backstage_images (`image`,`movie_id`) VALUES ('$file_name', '$new_id')";
  if(mysqli_query($conn, $sql)){
      echo "Данные успешно добавлены";
      
  } else{
      echo "Ошибка: " . mysqli_error($conn);
  }
  mysqli_close($conn); 
  }
?>




