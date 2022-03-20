<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

    </style>
</head>
<?php

include "config.php";



if (isset($_POST['but_submit'])) {

    $uname = mysqli_real_escape_string($conn,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);
    

    if ($uname != "" && $password != ""){
    
        $sql_query= "select * from customers where customerName='".$uname."' and passwords='".$password."'";
       
        $result = mysqli_query($conn,$sql_query);
       
        $row = mysqli_fetch_array($result);
        
        $count=count($row);
       
        if($count > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['customerId']=$row[0];
           
            header('Location:http://localhost/ecommerce/frontend/Front-endview/index.php');
        }else{
            echo "Invalid username and password";
        }
    }
}
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user-o"></span>
                    </div>
                    <h3 class="text-center mb-4" style="margin-top:20%">Login</h3>
                    <form method="post" action="login.php" class="login-form">
                        <div class="form-group">
                            <input type="text" class="form-control rounded-left" placeholder="Username" id="txt_uname" name="txt_uname" required>
                        </div>
                        <div class="form-group d-flex">
                            <input type="password" class="form-control rounded-left" placeholder="Password" id="txt_pwd" name="txt_pwd" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="form-control btn btn-primary rounded submit px-3" name="but_submit" id="but_submit">
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>