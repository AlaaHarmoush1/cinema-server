<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS bookingSeats (
  id INT AUTO_INCREMENT PRIMARY KEY,
  booking_id INT NOT NULL,
  seat_id INT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE,
  FOREIGN KEY (seat_id) REFERENCES auditoriumSeats(id) ON DELETE CASCADE
)";

$execute = $conc->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'booking_seats' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}
