<?php
   include_once("config.php");
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
   // Select the database 
   $conn->select_db("myDB"); 
   // sql to create table
   $sql = "CREATE TABLE MyGuests (
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       firstname VARCHAR(30) NOT NULL,
       lastname VARCHAR(30) NOT NULL,
       email VARCHAR(50),
       reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
       )";
   if ($conn->query($sql) === TRUE) {
       echo "Table MyGuests created successfully";
   } else {
       echo "Error creating table: " . $conn->error;
   }
?>