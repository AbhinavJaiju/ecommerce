<?php
session_start();
$custId = $_SESSION['cutomerId'];
$prodId = $_POST['productId'];

include "config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inserting product to wishLists table
    $sql = "INSERT INTO wishLists (customerId,productId)
    VALUES ('$custId', '$prodId')";
    $conn->exec($sql);
    echo "success";
}
catch (PDOException $e) {
    echo "<br>" . $sql . "<br>" . $e->getMessage();
}

?>