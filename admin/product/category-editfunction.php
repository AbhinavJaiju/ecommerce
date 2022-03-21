<?php
    //inluding db connection file 
    include_once '../config.php';

    $id = $_POST['categoryId'];
    $name = $_POST['categoryName'];
    $description = $_POST['description'];

    //insertion query

    $sql = "UPDATE categories SET categoryName = '{$name}',description = '{$description}' WHERE categoryId = $id";

    if($conn->query($sql)===TRUE){
        echo "Hello , Category {$name} is updated.";
    }else{
        echo "Could not update your data";
    }
    
    $conn->close();
?>