<?php

class User {
    private $conc;

    public function __construct($connection) {
        $this->conc = $connection;
    }


    public function create_user($name, $email, $phone_number, $password){

        if(empty($email) && !empty($phone_number)){
            $sql = "INSERT INTO users (name, email, phone_number, password, social_provider, social_id) VALUES ('$name', NULL, '$phone_number, '$password', NULL, NULL)";  
            return $this->conc->query($sql);
        }else if(!empty($email) && empty($phone_number)){
            $sql = "INSERT INTO users (name, email, phone_number, password, social_provider, social_id) VALUES ('$name', '$email', NULL, '$password', NULL, NULL)";  
            return $this->conc->query($sql);
        }else if(empty($email) && empty($phone_number)){
            return "You need an email or phone number to sign up you cannot provide none";
        }

    }
}