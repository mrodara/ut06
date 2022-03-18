<?php
header('Content-type: text/plain');
$config = include '../src/config/config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD); // Crear la conexión
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error. "\n");
}
echo "Connected successfully"."\n";

$sql = file_get_contents("db.sql");

if ($conn->multi_query($sql) === TRUE) {
    echo "Database created successfully "."\n";
} else {
    echo "Error creating database: " . $conn->error. "\n";
}
?>