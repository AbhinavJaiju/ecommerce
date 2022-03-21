<?php
    //inluding db connection file 
    include_once '../config.php';

    $id = $_POST['customerId'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $image = $_POST['image1'];
    $filename = $_FILES["image"]["name"];
    $filepath = "Images/" . $_FILES["image"]["name"];

    //insertion query
    $sql = "UPDATE customers SET customerName = '{$name}', email = '{$email}', passwords = '{$password}', phoneNumber = '{$phoneNumber}', gender = '{$gender}', address = '{$address}',profilePicture = '{$filename}'
            WHERE customerId = $id";

    if($conn->query($sql)===TRUE){
        echo "Hello {$name}, your record is saved.";
    }else{
        echo "Could not save your data";
    }
    unlink('/var/www/html/ecommerce/admin/customerImages/' . $image);
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $filepath))
    {
        echo "Images Uploaded";
    }
    else
    {
        echo "Error !!";
    }
    $conn->close();
?>