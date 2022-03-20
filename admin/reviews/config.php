<?php
include ("config.php");
// Database configuration
$servername = "localhost";
$username = "alfina";
$password = "Alfinamemysql@123";
$dbname = "ecommerce";

/// Create connection
$conn = new mysqli($servername, $username,$password,$dbname);//;
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>