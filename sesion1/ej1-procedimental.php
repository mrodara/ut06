<?php  
    include_once("config.php");
   // Crear la conexión
   mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
   // Comprobar la conexión
   if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
       exit();
   }
   else
       echo "Connected successfully";
?>