<?php

require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/Auth.php';

// header("Access-Control-Allow-Origin: http://127.0.0.1:5500"); 
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'] ?? null;
    $phone_number = $data['phone_number'] ?? null;
    $password = $data['password'];

    $user = new Auth($conc);

    $user_res = $user->find_user($email, $phone_number);

    if ($user_res && $user_res->num_rows > 0) {
        $user_data = $user_res->fetch_assoc();

        if(password_verify($password, $user_data['password'])){
            http_response_code(200);
            echo json_encode([
                "user_data" => [
                    "id" => $user_data['id'],
                    "name" => $user_data['name']
                ]
            ]);
            exit;
        } else {
            http_response_code(401);
            echo json_encode([
                "Error" => "Password is invalid"
            ]);
            exit;
        } 
    }else {
        http_response_code(404);
        echo json_encode([
            "Error" => "User Not invalid"
            ]);
    }
}