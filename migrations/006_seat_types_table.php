<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS seatTypes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  base_price DECIMAL(10, 2) NOT NULL
)";

$execute = $conc->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'seat_types' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}
