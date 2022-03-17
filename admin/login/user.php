<?php
$servername = "localhost";
$username = "aaa";
$password = "Bidhu@123";
$dbname = "storeDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phn = $_POST['phn'];
$email = $_POST['email'];
$username = $_POST['userName'];
$pass = $_POST['pass'];

echo $fname.$lname;

$sql = "INSERT INTO Registrations (firstName, lastName, phoneNumber, email, userName, pass)
VALUES ('$fname', '$lname', $phn, '$email', '$username', '$pass')";

if ($conn->query($sql) === TRUE) {

// echo $fname.$lname;
  header('Location: login.html'); 
  exit;
} else {

//   echo "Error: " . $sql . "<br>" . $conn->error;
  header('Location: user.html'); 
  exit;
}

$conn->close();
?> 