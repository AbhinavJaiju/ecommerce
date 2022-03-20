
<?php
session_start();
$servername = "localhost"; /* Host name */
$username = "kadeejath"; /* User */
$password = "experion@123"; /* Password */
$dbname = "ecommerce"; /* Database name */

$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  //echo "connected";
}
?>