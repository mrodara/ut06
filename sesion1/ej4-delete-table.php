<?php
   include_once("config.php");
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
   $conn->select_db("myDB"); 
   $sql = "DROP TABLE MyGuests";
   if ($conn->query($sql) === TRUE) {
       echo "Table MyGuests deleted successfully";
   } else {
       echo "Error deleted table: " . $conn->error;
   }
?>