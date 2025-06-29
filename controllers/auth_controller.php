<?php

require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/Auth.php';

header("Access-Control-Allow-Origin: http://127.0.0.1:5500"); 
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true); // this is to decode the JSON data that is comming from the frontend  

    $name = $data['name'];
    $email = $data['email'] ?? null;
    $phone_number = $data['phone_number'] ?? null;
    $password = $data['password'];


    if(empty($name) || empty($password)) {
        http_response_code(400);
        echo json_encode(["Error 400" => "You need to provide the name and the password"]);
        exit;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $user = new Auth($conc);
    $result = $user->create_user($name, $email, $phone_number, $password);

    if($result) {
        http_response_code(200);
        echo json_encode(["success 200" => "User created successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["Error 500" => "Failed to create user." . $conc->error]);
    }
}
