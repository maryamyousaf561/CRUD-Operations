<?php
$servername = "localhost";
$username = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=crud", $username);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>