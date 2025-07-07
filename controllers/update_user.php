<?php 


require_once __DIR__.'/../connection/connection.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../Service/ResponseService.php';

class User_update {

    public function update_user(){

        global $conc;

        $data = json_decode(file_get_contents('php://input'), true);

        $userId = (int)$data['id'];
        $updateData = $data['updateData'];

        $user = User::find($conc, $userId);

        try{
            if (isset($updateData['password'])) {
                $updateData['password'] = password_hash($updateData['password'], PASSWORD_DEFAULT);
            }

            $success = $user->update($conc, $updateData);

            if ($success){

                $updatedUser = User::find($conc, $userId);

                echo ResponseService::success_response([
                'message' => 'User updated successfully',
                'user' => $updatedUser
                ]);
            } else {
                echo ResponseService::error_response([
                'message' => 'Database update failed'
                ]);
            }
        }catch (error){
            echo ResponseService::error_response([
                'message' => 'error connection to database'
                ]);
        }

    }

}