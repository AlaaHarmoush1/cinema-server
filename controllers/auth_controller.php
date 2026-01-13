<?php

require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/Auth.php';
require_once __DIR__ . '/../Service/ResponseService.php';

class Register{

    public function RegisterUser(){

        global $conc;

        $data = json_decode(file_get_contents("php://input"), true);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $result = Auth::create($conc, $data);

        if($result){
            echo ResponseService::success_response("User created successfully.");
            exit;
        }else{
            echo ResponseService::error_response("Failed to create user.");
            exit;
        }

    }

}