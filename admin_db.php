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
  
  
  $sql = "INSERT INTO projects VALUES ('$array_[0]', '$array_[1]', '$array_[2]', '$array_[3]', '$array_[4]', '$array_[5]','$array_[6]','$array_[7]','$array_[8]','$array_[9]','$array_[10]','$array_[11]','$array_[12]', '$array_[13]','$array_[14]','$array_[15]')";
  if(mysqli_query($conn, $sql)){
      echo "Данные успешно добавлены";
      
  } else{
      echo "Ошибка: " . mysqli_error($conn);
  }
  mysqli_close($conn); 
 }
?>




