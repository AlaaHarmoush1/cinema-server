<?php

require_once __DIR__.'/Model.php';

class User extends Model {
    protected static string $table = 'users';
    protected static string $primary_key = 'id';
    
    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}