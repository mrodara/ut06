<?php  
    include_once("config.php");
    // Crear la conexión
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD); 
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>