<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(255) UNIQUE,
  phone_number VARCHAR(20) UNIQUE,
  password VARCHAR(255),
  social_provider VARCHAR(50),
  social_id VARCHAR(255),
  age_verified BOOLEAN DEFAULT FALSE,
  role ENUM('user', 'admin') DEFAULT 'user',
  CONSTRAINT chk_contact_method CHECK (
    (email IS NOT NULL OR phone_number IS NOT NULL)
    OR
    (social_provider IS NOT NULL AND social_id IS NOT NULL)
  )
)";


if ($conc->query($sql) === TRUE) {
    echo "Table 'users' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}
