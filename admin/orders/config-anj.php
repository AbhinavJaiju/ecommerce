<?php
// $servername = "localhost";
// $username = "anjanakg";
// $password = "Anju@123";
// $dbname = "ecommerce";

// //create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// //check connection
// if ($conn->connect_error) {
//     die("Connection Failed:" . $conn->connect_error);
// } else {
//     //echo "Connected successfully";
// }

$servername = "localhost";
$username = "aaa";
$password = "Bidhu@123";
$dbname = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
