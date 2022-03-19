<?php
session_start();
$custId = $_SESSION['cutomerId'];
$prodId = $_POST['id'];
$qty = $_POST['quantity'];

// echo $custId;
// echo $prodId;
// echo $qty;

include "config.php";

// //Create connection
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
//     // Checking if product exists in cart
//     $sql = "SELECT * FROM wishLists WHERE customerId='$custId' AND productId='$prodId'";
//     $result = $conn->query($sql);
//     if ($result->rowCount() > 0) {
//         // output data of each row
//         while ($row = $result->fetch()) {
//             if ($row['customerId'] == $custId && $row['productId'] == $prodId) {
//                 $check = 'true';
//                 break;
//             } else {
//                 $check = 'false';
//             }
//         }
//     }
//     if ($check == 'true') {
//         echo json_encode(array("result"=> "exists"));
//     } else {
//         // Inserting data into the database products table
//         $sql = "INSERT INTO wishLists (customerId,productId)
//            VALUES ('$custId', '$prodId')";
//     $conn->exec($sql);
//     echo json_encode(array("result"=> "success"));
//     }
// }
//  catch (PDOException $e) {
//     echo "<br>" . $sql . "<br>" . $e->getMessage();
// }
//  $conn = null;


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT  COUNT(productId) AS num FROM productCarts WHERE customerId=$custId AND productId=$prodId");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
// echo $result["num"];

if($result["num"] > 0){
    echo json_encode(array("result"=> "exists"));
}
else{
    //  Inserting product to product cart table
    $sql = "INSERT INTO productCarts (quantity,customerId,productId)
    VALUES ('$qty', '$custId', '$prodId')";
    $conn->exec($sql);
    echo json_encode(array("result"=> "success"));
}

}
catch(PDOException $e) {
    echo json_encode(array("result"=> "Error: " . $e->getMessage()));
}

?>