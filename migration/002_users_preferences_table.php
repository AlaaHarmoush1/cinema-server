<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql=
"CREATE TABLE IF NOT EXISTS euser_preferences (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  preferred_genres TEXT,
  preferred_contact_method ENUM('email', 'phone') DEFAULT 'email',
  auto_subscription BOOLEAN DEFAULT FALSE, 
  FOREIGN KEY (user_id) REFERENCES users(id)
);";

$execute = $conc->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'user_preferences' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}