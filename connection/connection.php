<?php    
$ServerName = "localhost";
$username = "root";
$password = "";
$dbname = "cinema-db";

$conc =new mysqli(hostname: $ServerName, username: $username, password: $password, database: $dbname);

    if($conc -> connect_error){
        die("connection failed: " . $conc -> connect_error);
    }else {
        echo "connection success to database";
    };
    
?>
