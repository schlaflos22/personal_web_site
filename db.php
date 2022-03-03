<?php 

$dbhost = "localhost";
$dbname = "movie_db";
$username = "root";
$password = "122";

$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);

function get_movies_All() {
    global $db;
    $movies= $db -> query("SELECT * FROM `movies`");
    return $movies;
}
function get_movie_by_id($id) {
    global $db;
    $movies= $db -> query("SELECT * FROM `movies` WHERE `movie_id`= $id");
    foreach($movies as $movie) {
        return $movie;
    }
}
function get_images_for_gallery($id){
    global $db;
    $images= $db ->prepare("SELECT * FROM `backstage_images` 
    WHERE `movie_id`= $id");
    
    $images->execute();
   $result = $images->fetchAll();
    return $result;
}
function get_image_id($id) {
    global $db;
    $images= $db -> query("SELECT * FROM `backstage_images` WHERE `movie_id`=$id ");
    
    return $images;
}

function get_projects_All(){
    global $db;
    $projects= $db ->query("SELECT * FROM `projects`");
    
        return $projects;
 
    
} 
function get_project_for_id($id)  {
    global $db;
    $project= $db ->query("SELECT * FROM `projects` WHERE `project_id`=$id");
    
        return $project;
} 
function get_users_data() {
    global $db;
    $users = $db ->query("SELECT * FROM `users`");
    foreach($users as $user) {
        return $user;
    }
}

    function get_count_of_elements(){
        global $db;
        $count_id = $db ->query("SELECT COUNT(*) FROM `movies`");
        foreach($count_id as $count) {
            return $count;
        }
       
    }
     function get_count_of_projects() {
        global $db;
        $count_id = $db ->query("SELECT COUNT(*) FROM `projects`");
        foreach($count_id as $count) {
            return $count;
        }
     }
     
     
?>