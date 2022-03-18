
<?php
session_start();
$host = "localhost"; /* Host name */
$user = "kadeejath"; /* User */
$password = "experion@123"; /* Password */
$dbname = "ecommerce"; /* Database name */

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else{
  //echo "connected";
}