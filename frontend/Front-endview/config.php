
<?php
session_start();
$servername = "localhost";
$username = "ganesh";
$password = "Experion@123";
$dbname = "ecommerce";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  //echo "connected";
}
?>