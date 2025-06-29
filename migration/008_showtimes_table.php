<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS showtimes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  movie_id INT NOT NULL,
  auditorium_id INT NOT NULL,
  show_date DATE NOT NULL,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
  FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id) ON DELETE CASCADE
)";

$execute = $conc->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'showtimes' created successfully.";
} else {
    echo "Error creating table: " . $conc->error;
}
