<?php
include 'config.php';
$id = $_POST['productId'];
$sql = "DELETE FROM productImage WHERE productId = $id";
$sql1 = "DELETE FROM products WHERE productId = $id";
if(($conn->query($sql) === TRUE)){
    if($conn->query($sql1)===TRUE){
        
        echo "<script>window.location.href='product-listing.php';</script>";
        exit;
    }
}else {
    echo "error";
}
$conn->close();

?>