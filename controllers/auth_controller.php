<?php

require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/user_model.php';

header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true); // this is to decode the JSON data that is comming from the frontend  

    $name = $data['name'];
    $email = $data['email'] ?? null;
    $phone_number = $data['phone_number'] ?? null;
    $password = $data['password'];

    if(empty($name) || empty($password)) {
        echo json_encode(["Error 400" => "You need to provide the name and the password"]);
        exit;
    }

    $user = new User($conc);
    $result = $user->create_user($name, $email, $phone_number, $password);

    if($result) {
        echo json_encode(["message" => "User created successfully."]);
    } else {
        echo json_encode(["Error 500" => "Failed to create user."]);
    }
}