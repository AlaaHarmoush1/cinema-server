<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS invitations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  booking_id INT NOT NULL,
  invited_user_email VARCHAR(255),
  status ENUM('pending', 'accepted', 'declined') DEFAULT 'pending',
  FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE
)";

$execute = $conc->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'invitations' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}
