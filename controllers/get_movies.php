<?php
require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/Movie.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["id"])){
    $Movies = Movie::all($conc); 

    $response["Movies"] = [];
    foreach($Movies as $m){
        $response["Movies"][] = $m->toArray();
    }
    echo json_encode($response); 
    return;
}


echo json_encode($response);
}
?>