<?php 


require_once __DIR__.'/../connection/connection.php';
require_once __DIR__.'/../models/User.php';

// header("Access-Control-Allow-Origin: http://127.0.0.1:5500"); 
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);


    $userId = (int)$data['id'];
    $updateData = $data['data'];

    $user = User::find($conc, $userId);

    if (!$user) {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'User not found with ID: ' . $userId
    ]);
    exit;
    }

    try {

        if (isset($updateData['password'])) {
            $updateData['password'] = password_hash($updateData['password'], PASSWORD_DEFAULT);
        }

        $success = $user->update($conc, $updateData);
        error_log("Attempting to update user ID $userId with: " . json_encode($updateData));

        
        if ($success) {

            $updatedUser = User::find($conc, $userId);
            
            echo json_encode([
                'success' => true,
                'message' => 'User updated successfully',
                'user' => $updatedUser
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Database update failed'
            ]);
        }
    } catch (Error) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Server error'
        ]);
    }
}