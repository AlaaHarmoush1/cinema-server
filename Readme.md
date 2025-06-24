## Table of Contents
1- [Project Structure](#project-structure)
2- [Technologies Used](#technologies-used)


# project-structure
CINEMA-SERVER/
├── README.md                           # Project documentation and setup instructions
├── connection/
│   └── connection.php                  # Establishes a connection to the database using MySQLi
├── controllers/
│   └── (e.g. UserController.php)       # Contains logic for handling incoming HTTP requests and coordinating between models and responses
├── Models/
│   └── (e.g. User.php)                 # PHP classes that represent database tables and contain related business logic
├── migrations/
│   └── (e.g. create_users_table.php)   # Contains scripts to create or modify database tables (schema definitions)
│
├── Seeds/
│   └── (e.g. seed_users.php)           # Scripts used to populate the database with initial or sample data for testing or demo purposes





# technologies-used
- PHP
- MySQL
- MySQLi for database interactions