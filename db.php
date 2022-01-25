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
    $images= $db ->query("SELECT b.image FROM backstage_images b
    LEFT JOIN movies a ON  b.movie_id_ = a.movie_id
    WHERE b.movie_id_= $id");
    return $images;
}

function get_projects_All(){
    global $db;
    $projects= $db ->query("SELECT * FROM `projects`");
    
        return $projects;
 
    
}   
function get_users_data() {
    global $db;
    $users = $db ->query("SELECT * FROM `users`");
    foreach($users as $user) {
        return $user;
    }
}
?>