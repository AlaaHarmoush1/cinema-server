<?php

require_once __DIR__ . '/Model.php';



class Auth extends Model {
    private $conc;
     protected static string $table = 'users';

    public function __construct($connection) {
        $this->conc = $connection;
    }


    public static function find_user($conc, $email, $phone_number){
        if(empty($email) && !empty($phone_number)){
            $sql = "SELECT * FROM users WHERE phone_number = '$phone_number'";
            $result = $conc->query($sql);
            return $result;
        } else if(!empty($email) && empty($phone_number)){
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conc->query($sql);
            return $result;
        } else if(empty($email) && empty($phone_number)){
            return "You need an email or phone number to sign up you cant not provide both";
        }
    }
}