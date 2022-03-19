<?php 
include "config.php";

$id = $_POST['customerId'];
$sql = "DELETE FROM customers WHERE customerId = $id";

if($conn->query($sql) ===TRUE){
    
    echo "<script>window.location.href='customer-listing.php';</script>";
    exit;
}else{
    echo "error";
}

$conn->close();
?>