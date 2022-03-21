<?php 
include "../config.php";

$id = $_POST['categoryId'];


$sql1 = "DELETE FROM products WHERE categoryId = $id";
$sql = "DELETE FROM categories WHERE categoryId = $id";

if($conn->query($sql1) && $conn->query($sql) ===TRUE){
    
    echo "<script>window.location.href='category.php';</script>";
    exit;
}else{

    echo $conn->error;

    echo '<script>alert("Error in Deleting !")</script>';
    echo "<script>window.location.href='category.php';</script>";
    exit;
}

$conn->close();
?>