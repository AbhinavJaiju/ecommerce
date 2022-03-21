
<?php
session_start();
// $servername = "localhost";
// $username = "ganesh";
// $password = "Experion@123";
// $dbname = "ecommerce";

// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// } else {
//   //echo "connected";
// }
$servername = "localhost";
$username = "binitha";
$password = "Bini@1997";
$dbname = "ecommerce";

/// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); //;
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>