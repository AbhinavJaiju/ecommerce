<?php
    //inluding db connection file 
    include_once '../config.php';

    $name = $_POST['categoryName'];
    $description = $_POST['description'];

    //insertion query
    $sql = "INSERT INTO categories(categoryName,description) 
            VALUES('{$name}','{$description}')";

    if($conn->query($sql)===TRUE){
        echo "Hello , Category {$name} is inserted.";
    }else{
        echo "Could not save your data";
    }
    
    $conn->close();
?>