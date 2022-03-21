
<?php
session_start();
$servername = "localhost";
$username = "binitha";
$password = "Bini@1997";
$dbname = "ecommerce";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  //echo "connected";
}
?>