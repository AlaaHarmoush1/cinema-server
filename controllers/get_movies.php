<?php
require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/Movie.php';
require_once __DIR__ . '/../Service/ResponseService.php';
require_once __DIR__ . '/../Service/MoviesService.php';

class get_movies {

    public function getAllMovies(){
        global $conc;

        if (!isset($_GET["id"])){
            $movies = Movie::all($conc);
            $movies_array = MoviesService::MoviesToArray($movies);
            echo ResponseService::success_response($movies_array);
            return;
        }

        $id = $_GET["id"];
        $movie = Movie::find($conc, $id)->toArray();
        echo ResponseService::success_response($movie);
        return;
    }

}

?>
