<?php
    //db connection
<<<<<<< HEAD
    include "../config.php";
=======
    include_once '../config.php';
>>>>>>> ad1c59d581b54f043cfd428ab39bfa0ec4815224

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $filename = $_FILES["image"]["name"];
    $filepath = "../../customerImages/" . $_FILES["image"]["name"];
    //sql query
    $sql1 = "INSERT INTO customers(customerName,passwords,email,phoneNumber,gender,address,profilePicture)
            VALUES('$name','$password','$email', $number,'$gender','$address','$filename')";

     if($conn->query($sql1)===TRUE){
        echo "Hello {$filepath}, your record is saved.";
        
    }else{
        echo $number ;
    }
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
