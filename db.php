<?php
include 'table_used_in_data.php';
try {
  $connetion = new PDO("mysql:host=localhost;dbname={$system_databses}", "{$username}", "{$password}");
  $connetion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  ?>