<?php
require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/Movie.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        $Movies = Movie::all($conc); 

        // file_put_contents(__DIR__ . '/debug.log', print_r($Movies, true));

        $response = ["Movies" => []];
        foreach($Movies as $Movie){
            $response["Movies"][] = $Movie->toArray();
        }
        echo json_encode($response);
        // file_put_contents(__DIR__ . '/response.log', print_r($response, true));
        return;
    }else {
        $id = $_GET["id"];
        $Movie = Movie::find($conc, $id);

        if ($Movie) {
            $response = ["Movie" => $Movie->toArray()];
            http_response_code(200);
        } else {
            $response = ["error" => "Movie not found"];
            http_response_code(404);
        }
        echo json_encode($response);
        return;
    }
}
?>
