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
?>