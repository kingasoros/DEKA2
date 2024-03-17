<?php
require "db_conn.php";

if(isset($_GET['id'])){
   //Create connection and select DB
   $db_name = new mysqli($host, $username, $password, $db);

   // Check connection
   if($db_name->connect_error){
       die("Connection failed: " . $db_name->connect_error);
   }

   $stmt = $db_name->prepare("SELECT picture FROM person WHERE id = ?");
   $stmt->bind_param("i", $_GET['id']);
   $stmt->execute();
   $result = $stmt->get_result();

   if($result->num_rows > 0){
       $imgData = $result->fetch_assoc();
       ob_clean(); // Clean (erase) the output buffer
       header("Content-type: image/jpg");
       echo $imgData['image'];
   }else{
       echo 'Image not found...';
   } 
}