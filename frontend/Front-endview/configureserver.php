<?php
$servername = "localhost";
$username = "binitha";
$password = "Bini@1997";
$dbname = "ecommerce";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>