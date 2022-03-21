<?php
session_start();
include 'config.php';
$sql_query = "select * from customers where customerId=" . $_SESSION['cutomerId'];

//echo $sql_query;
$result = $conn->query($sql_query);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    body {
      margin: 0;
      padding-top: 40px;
      color: #2e323c;
      background: #f5f6fa;
      position: relative;
      height: 100%;
    }

    .account-settings .user-profile {
      margin: 0 0 1rem 0;
      padding-bottom: 1rem;
      text-align: center;
    }

    .account-settings .user-profile .user-avatar {
      margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
      width: 90px;
      height: 90px;
      -webkit-border-radius: 100px;
      -moz-border-radius: 100px;
      border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
      margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
      margin: 0;
      font-size: 0.8rem;
      font-weight: 400;
      color: #9fa8b9;
    }

    .form-control {
      border: 1px solid #cfd1d8;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
      font-size: .825rem;
      background: #ffffff;
      color: #2e323c;
    }

    .card {
      background: #ffffff;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      border: 0;
      margin-bottom: 1rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row gutters">
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100" style="height:300px;margin-right:2%;margin-left:2%;margin-top:32%">
          <div class="card-body">
            <div class="account-settings">
              <div class="user-profile">
                <div class="user-avatar">
                  <img style="margin-top:15%;" src="profilePic/<?php echo $row["profilePicture"]; ?>" alt="Maxwell Admin">
                </div>
                <h5 class="user-name"><?php
                                      echo $row["customerName"] ?></h5>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body" style="margin-top:10%;margin-right:3%;margin-left:3%">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h6 class="mb-2 text-primary" style="font-weight:15px;font-size:20px;">Personal Details</h6>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                 
                   
                  <div class="form-group">
                  <input type="text" class="form-control" name="id"style="display:none">
                    <label for="fullName">Customer Name</label>
                    <input type="text" class="form-control" value="<?php echo $row["customerName"]; ?>" name="uname" placeholder="Enter full name">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="eMail">Email</label>
                    <input type="email" class="form-control" name="eMail" value="<?php echo $row["email"]; ?>"  placeholder="Enter email ID">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row["phoneNumber"]; ?>" placeholder="Enter phone number">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="name" class="form-control" name="Address" value="<?php echo $row["address"]; ?>" placeholder="Enter Address">
                  </div>
                </div>
              </div>
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <label for="gender" style="margin-right: 15%;">Gender: </label><br>
                      <input type="radio" name="gender" id="male"
                  if (<?php echo $row["gender"]; ?> == "Male");
                     value="Male">Male
                      <input type="radio" name="gender" id="female"
                  if (<?php echo $row["gender"]; ?> == "Female");
                  value="Female"style="margin-left:1%;" >Female
                      <input type="radio" name="gender" id="other"
                  if (<?php echo $row["gender"]; ?> == "Other"); checked
                  value="Other"style="margin-left:1%;">Other 
                  <br><br>
                
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <label for="fileToUpload" style="margin-right: 15%;">Select Image: </label><br>
                <input type="file" class="form-control" name="fileToUpload"><br>
                </div>
                  
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">
                    <button style="margin-right:2%;margin-bottom:2%;" type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


<?php

if (isset($_POST['submit'])) {
  // Update image
$target_file = basename($_FILES["fileToUpload"]["name"]);
$target_location = "profilePic/" . $target_file;

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_location)) {
  $sql_query = "Update customers set customerName=' " . $_POST["uname"] . "',
   email=' " . $_POST["eMail"] . "', phoneNumber=' " . $_POST["phone"] . "',
   gender=' " . $_POST["gender"] . "', 
   address=' " . $_POST["Address"] . "', 
   profilePicture=' " . $target_location . "' 
   where customerId=" . $_SESSION['cutomerId'];
   echo "
<script>window.location.href='myaccount.php';</script>";
   if ($conn->query($sql_query) === TRUE) {
    $_SESSION['uname'] = $_POST['uname'];
  } else {
    echo "Error: " . $conn->error;
  }
}
}

?>