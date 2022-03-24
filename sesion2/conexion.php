<?php 

    include_once("./config.php");

    //Creamos la conexion
    $conexion = new mysqli($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_BASE);

    //Comprobamos si se puede realizar o no la conexión
    if ($conexion->connect_error){
        die("Conexión fallida: " . $conexion->errno. " " .$conexion->connect_error);
    }


?>