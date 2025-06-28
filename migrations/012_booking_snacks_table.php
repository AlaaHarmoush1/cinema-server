<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS bookingSnacks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  booking_id INT NOT NULL,
  snack_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE,
  FOREIGN KEY (snack_id) REFERENCES snacks(id) ON DELETE CASCADE
)";

$execute = $conc->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'booking_snacks' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}
