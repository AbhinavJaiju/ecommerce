<?php
$id = $_POST['id'];

$servername = "localhost";
$username = "gazni";
$password = "password";
$dbname = "ecommerce";

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
    
    // Inserting customer id to carts table
    $sql = "INSERT INTO carts (customerId)
    VALUES ('$custId')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    // echo "last id is ".$last_id;

    // Inserting product to product cart table
    $sql = "INSERT INTO productCarts (quantity,cartId,productId)
    VALUES (1, '$last_id', '$prodId')";
    $conn->exec($sql);
    echo "success";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>