<?php
   include_once("config.php");
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
   $sql = "DROP DATABASE myDB";
   if ($conn->query($sql) === TRUE) {
       echo "DB myDB deleted successfully";
   } else {
       echo "Error deleted DB: " . $conn->error;
   }
?>