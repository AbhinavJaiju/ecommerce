<?php
$id = $_POST['id'];

include "config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT wishLists.customerId,wishLists.productId FROM wishLists WHERE wishListId=$id");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r ($result);   
    // print_r($stmt->fetchAll());
    $prodId = $result['productId'];
    $custId = $result['customerId'];

    // Inserting product to product cart table
    $sql = "INSERT INTO productCarts (quantity,customerId,productId)
    VALUES (1, '$custId', '$prodId')";
    $conn->exec($sql);
    echo "success";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>