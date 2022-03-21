<?php
session_start();
include "config.php";
$custId = $_SESSION['cutomerId'];
// Check user login or not
if (!isset($_SESSION['uname'])) {
  header('Location: index.php');
}

// logout
if (isset($_POST['but_logout'])) {
  session_destroy();
  header('Location: login.php');
}
if (isset($_POST['home'])) {
  header('Location: index.php');
}

// Fetching customer details from db 
$sql_query = "select * from customers where customerId=" . $custId;

$result = mysqli_query($conn, $sql_query);

$row = mysqli_fetch_array($result);

$count = count($row);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ashion</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    Css Styles -->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"> -->
  <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
      height: 770px
    }

    /* Set gray background color and 100% height */
    .sidenav {
      /* background-color: #f1f1f1; */
      background-color: #ffffff;
      height: 100%;
    }


    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 300px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }

      .row.content {
        height: auto;
      }
    }

    .nav-pills li.active a {
      background-color: #B7395F;
      width: 100%;
      padding: 5%;
      margin-top: 10%;
      margin-left: 10%;
      font-size: larger;
    }

    .nav-pills {
      margin-top: 100px;
    }

    .nav-pills li.active a:hover {
      color: #ca1515;
      background-color: white;
      border: #ca1515 solid 1px;
    }

    .sidenav h4 {
      margin-top: 10px;
      margin-left: 10px;
      font-weight: bolder;
      color: #B7395F;
    }

    hr {
      width: 104%;
      height: 10px;
      background-color: white;
    }

    .btn {
      color: #ca1515;
      background-color: white;
      border: #ca1515 solid 1px;
    }

    .gutters-sm {
      background-color: #ffffff;
      margin-left: 10%;
      padding: 5%;
      border-radius: 10px;
    }

    /* body {
      background-color: #F9EDF0;
    } */
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
$wishlist = "SELECT COUNT(wishListId) AS wishList FROM wishLists where customerId=$userId";
$cart = "SELECT COUNT(productCartId) AS cart FROM productCarts where customerId=$userId";
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
  
  <div>


    <!-- <form method='post' action="" style="margin-left:1350px;margin-top:2%;">
      <input type="submit" class="btn btn-danger btn-sm" style="font-size:15px;font-weight:bold" value="home" name="home">
      <input type="submit" class="btn btn-danger btn-sm" style="font-size:15px;font-weight:bold" value="Logout" name="but_logout">
    </form> -->

  </div>

  </div>
  </div>
  <div class="container-fluid"style="margin-top:2% ;">
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <h4 style="margin-top:8% ;margin-left:23%; " >My Account</h4>
       
        <ul class="nav nav-pills nav-stacked" style="margin-top:4%;padding: 1px;">
          <li class="active" style="margin-top:28%;">
            <?php
            session_start();
            include 'config.php';

            echo
            '<a href="editprofile.php?id=' . $custId . '">Manage profile</a></li>';
            ?>


          <li class="active" style="margin-top:8%"><a href="changepass.php">Change Password</a></li>
          <li class="active" style="margin-top:8%"><a href="wish-list.php">My Wish list</a></li>
          <li class="active" style="margin-top:8%"><a href="orderhistory.php">My Orders</a></li>
          <li class="active" style="margin-top:8%"><a href="contact.php">contact us</a></li>

        </ul><br>

        <!-- <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div> -->
      </div>

      <div class="col-sm-10">
        <div class="container" style="margin-top:5%;">
          <div class="main-body">

            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="../Front-endview/profilePic/<?php echo $row["profilePicture"]; ?>" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4> <?php
                              echo $_SESSION['uname']; ?> </h4>

                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">

                        <?php echo $row["customerName"]; ?>
                      </div>
                    </div>
                    </br>
                    <div class="row" style="margin-top:1%">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $row["email"]; ?>
                      </div>
                    </div>
                    </br>

                    <div class="row" style="margin-top:1%">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Phone Number</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $row["phoneNumber"]; ?>
                      </div>
                    </div>
                    </br>
                    <div class="row" style="margin-top:1%">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Gender</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $row["gender"]; ?>
                      </div>
                    </div>
                    </br>
                    <div class="row" style="margin-top:1%">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $row["address"]; ?>
                      </div>
                    </div>
                    </br>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
<!-- Instagram Begin -->
<div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/pic1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ Eshoppe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/pic2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ Eshoppe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/pic3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ Eshoppe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/pic4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ Eshoppe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/pic5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ Eshoppe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/pic6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ Eshoppe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="./index.php"><img src="img/logo5.png" alt=""></a>
                        </div>
                        <p>We provide the products from the best brands with the offer that you will not expect.</p>
                        <div class="footer__payment">
                            <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                            <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                            <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                            <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                            <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>Quick links</h6>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Orders Tracking</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>NEWSLETTER</h6>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                        <p>Copyright &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

</body>

</html>