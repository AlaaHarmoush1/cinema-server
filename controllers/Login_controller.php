<?php

require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/Auth.php';
require_once __DIR__ . '/../Service/ResponseService.php';

class Login {

    public function find_user() {
        global $conc;

        $data = json_decode(file_get_contents("php://input"), true);

        $email = $data['email'] ?? null;
        $phone_number = $data['phone_number'] ?? null;
        $password = $data['password'] ?? null;

        $user_res = Auth::find_user($conc, $email, $phone_number);

        if ($user_res && $user_res->num_rows > 0) {
            $user_data = $user_res->fetch_assoc();

            if (password_verify($password, $user_data['password'])) {
                http_response_code(200);
                echo ResponseService::success_response([
                    "user_data" => [
                        "id" => $user_data['id'],
                        "name" => $user_data['name']
                    ]
                ]);
                exit;
            } else {
                echo ResponseService::error_response("Password is Invalid");
            exit;
                exit;
            }
        } else {
            echo ResponseService::error_response("User not found");
            exit;
        }
    }
}