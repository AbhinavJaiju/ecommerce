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
  <title>Personal Details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

  <style>
    body {
      margin: 0;
      /* padding-top: 40px; */
      /* color: #2e323c; */
      /* background: #f5f6fa; */
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
      font-size: 18px;
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
  <?php
session_start();
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}
$userId = $_SESSION['cutomerId'];

include "config.php";

// Get count of wishlist and cart
$wishlist = "SELECT COUNT(wishListId) AS wishList FROM wishLists";
$cart = "SELECT COUNT(productCartId) AS cart FROM productCarts";
$wishResult = $conn->query($wishlist);
$cartResult = $conn->query($cart);
$wishCount = $wishResult->fetch_assoc();
$cartCount = $cartResult->fetch_assoc();
?>


<header class="header ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="./index.php"><img src="img/logo5.png" alt="" style="height: 35px;width: 100px;"></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="./index.php">Home</a></li>
                        <li><a href="./shop.php">Shop</a>
                                <ul class="dropdown">
                                   

                                </ul>
                            </li>
                        <li><a href="./contact.php">Contact</a></li>
                        <li><a href="./aboutus.php">About Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        <a href="myaccount.php" style="font-weight: bold; font-size: large;">
                        <?php
                        if ($_SESSION['uname']) {

                            // echo '<a style="margin-left:10px;font-size:15px" href="http://localhost/ecommerce/frontend/Front-endview/logout.php"><strong>Logout</strong></a>';

                            echo $_SESSION['uname'];
                        } else {
                            echo  '<a href="login.php">Login</a>
                                <a href="#">Register</a>';
                        }

                        ?>
                        </a>
                    </div>

                    <ul class="header__right__widget ">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="wish-list.php"><span class="icon_heart_alt"></span>

                        <!-- Wish list count badge -->
                        <?php
                        if ($wishCount['wishList'] > 0) {
                            echo '<div class="tip">'.$wishCount['wishList'].'</div>';
                        }
                        ?>
                            </a></li>
                        <li><a href="shop-cart.php"><span class="icon_bag_alt"></span>

                        <!-- Cart count badge -->
                        <?php
                        if ($cartCount['cart'] > 0) {
                            echo '<div class="tip">'.$cartCount['cart'].'</div>';
                        }
                        ?>
                            </a></li>
                        <li>
                        <form method='post' action=""  >
                        <button type="submit" class="btn text-black " name="but_logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                        </button>
                                
                        </form>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>



</head>

<body>
  <div class="container">
    <div class="row gutters">
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100" style="margin-right:2%;margin-left:2%;margin-top:32%">
          <div class="card-body">
            <div class="account-settings">
              <div class="user-profile">
                <div class="user-avatar">
                  <img style="margin-top:15%;" src="<?php echo $row["profilePicture"]; ?>" alt="Maxwell Admin">
                </div>
                <h5 class="user-name"><?php
                                      echo $row["customerName"] ?></h5>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" style="margin-top:7%;">
        <div class="card h-80">
          <div class="card-body" style="margin-right:3%;margin-left:3%;margin-top:3%;">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h5 class="mb-2 text-danger" style="font-weight:15px;font-size:26px;">Personal Details</h5>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                 <br><br>
                   
                  <div class="form-group">
                    <label for="fullName">Customer Name</label>
                    <input type="text" class="form-control" value="<?php echo $row["customerName"]; ?>" name="uname" placeholder="Enter full name">
                  </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-5">
                  <div class="form-group">
                    <label for="eMail">Email</label>
                    <input type="email" class="form-control" name="eMail" value="<?php echo $row["email"]; ?>"  placeholder="Enter email ID">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row["phoneNumber"]; ?>" placeholder="Enter phone number">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                  <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="name" class="form-control" name="Address" value="<?php echo $row["address"]; ?>" placeholder="Enter Address">
                  </div>
                </div>
              </div>
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                <label for="fileToUpload" style="margin-right: 15%;">Select Image: </label><br>
                <input type="file" class="form-control" name="fileToUpload"><br>
                </div>
                  
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">
                    <button style="margin-bottom:2%; width: 12%;" type="submit" id="submit" name="submit" class="btn btn-danger btn-lg mt-3">Update</button>
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