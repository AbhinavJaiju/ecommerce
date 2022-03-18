
<?php
session_start();
$servername = "localhost";
$username = "gazni";
$password = "password";
$dbname = "ecommerce";

$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else{
  //echo "connected";
}
?>