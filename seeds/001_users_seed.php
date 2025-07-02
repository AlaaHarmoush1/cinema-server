<?php 

require_once __DIR__ . '/../connection/connection.php';

$users = [
    [
        "name" => "Alaa Harmoush",
        "email" => "alaaharmoush@example.com",
        "phone_number" => "123456789",
        "password" => "Admin123@",
        "role" => "user"
    ],
    [
        "name" => "John Doe",
        "email" => "john@example.com",
        "phone_number" => "987654321",
        "password" => "SecurePass456!",
        "role" => "admin"
    ]
];

foreach ($users as $user) 
    $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

    $name = $conc->real_escape_string($user['name']);
    $email = $conc->real_escape_string($user['email']);
    $phone_number = $conc->real_escape_string($user['phone_number']);
    $role = $conc->real_escape_string($user['role']);
    $password = $conc->real_escape_string($hashed_password);
    

    $sql = "INSERT INTO users (name, email, phone_number, password, role)
            VALUES ('$name', '$email', '$phone_number', '$password', '$role')";
    
    if ($conc->query($sql)) {
        echo "User '$name' inserted successfully.<br>";
    } else {
        echo "Error inserting user '$name': " . $conc->error . "<br>";
    }


$conc->close();