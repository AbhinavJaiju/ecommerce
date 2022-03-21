<?php
    //inluding db connection file 
    include_once 'config.php';

    $name = $_POST['userName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];

    //insertion query
    $sql = "INSERT INTO users(userName,passwords,email,phoneNumber,gender) 
            VALUES('{$name}','{$password}','{$email}',$phoneNumber,'{$gender}')";

    if($conn->query($sql)===TRUE){
        echo "Hello {$name}, your record is saved.";
    }else{
        echo "Could not save your data";
    }
    
    $conn->close();
?>