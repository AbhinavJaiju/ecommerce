<?php
    //inluding db connection file 
    include_once 'config.php';

    $id = $_POST['userId'];
    $name = $_POST['userName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];

    //insertion query
    $sql = "UPDATE users SET userName = '{$name}', email = '{$email}', passwords = '{$password}', phoneNumber = '{$phoneNumber}', gender = '{$gender}'
            WHERE userId = $id";

    if($conn->query($sql)===TRUE){
        echo "Hello {$name}, your record is saved.";
    }else{
        echo "Could not save your data";
    }
    
    $conn->close();
?>