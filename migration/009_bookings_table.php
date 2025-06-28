<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  showtime_id INT NOT NULL,
  total_price DECIMAL(10, 2) NOT NULL,
  booking_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  status ENUM('confirmed', 'cancelled', 'pending') DEFAULT 'pending',
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (showtime_id) REFERENCES showtimes(id) ON DELETE CASCADE
)";

$execute = $conc->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'bookings' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}
