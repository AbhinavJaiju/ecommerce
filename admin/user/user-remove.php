<?php 
include "config.php";

$id = $_POST['userId'];
$sql = "DELETE FROM users WHERE userId = $id";

if($conn->query($sql) ===TRUE){
    echo "<script>window.location.href='user-listing.php';</script>";
    exit;
}else{
    echo "error";
}

$conn->close();
?>