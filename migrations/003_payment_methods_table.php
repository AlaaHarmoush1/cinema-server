<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS paymentMethods (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  method_type ENUM('card', 'cash'),
  details TEXT,
  is_default BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);";

$execute = $conc->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'payment_methods' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}
