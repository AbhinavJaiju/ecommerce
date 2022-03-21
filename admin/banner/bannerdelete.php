<?php 
include "../config.php";

$id = $_POST['bannereId'];
$sql = "DELETE FROM banners WHERE bannereId = $id";

if($conn->query($sql) ===TRUE){
    echo "<script>window.location.href='banner.php';</script>";
    exit;
}else{
    echo "error";
}

$conn->close();
?>