<?php
$id = $_POST['id'];


require "config.php";

//Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql = "DELETE FROM wishLists WHERE wishListId=$id";
  $conn->exec($sql);
  echo "success";
} catch (PDOException $e) {
    echo "<br>" . $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>