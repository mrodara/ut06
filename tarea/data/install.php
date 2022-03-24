<?php
header('Content-type: text/plain');

//Fichero con las credenciales de acceso al server de BBDD
include_once("./config.php");

//Conexión a la base de datos
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD); // Crear la conexión
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error. "\n");
}
echo "Connected successfully"."\n";

//Traemos el contenido del fichero para importar en nuestra base de datos
$sql = file_get_contents("data.sql");

//Realizamos y Comprobamos la importación.
if ($conn->multi_query($sql) === TRUE) {
    echo "Database created successfully "."\n";
} else {
    echo "Error creating database: " . $conn->error. "\n";
}
?>