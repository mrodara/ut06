<?php
// Definición de las Variables de conexión con el SGBD
define('DB_HOST', 'localhost');
define('DB_USER', 'usr_iaw');
define('DB_PASSWORD', 'psw_iaw');
define('DB_NAME', 'myDB');
// Conexión con la BD
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>