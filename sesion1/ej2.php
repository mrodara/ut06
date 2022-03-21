<?php
include_once("config.php");
// Crear la conexión
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
 // POO
 $sql = "CREATE DATABASE IF NOT EXISTS myDB";
 if ($conn->query($sql) === TRUE) {
     echo "Database created successfully";
 } else {
     echo "Error creating database: " . $conn->error;
 }
 $conn->close();
?>