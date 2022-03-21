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
  <!-- <link rel="stylesheet" href="css/elegant-icons.css" type="text/css"> -->
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
      width: 60%;
      padding: 5%;
      margin-top: 10%;
      margin-left: 20%;
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

    body {
      background-color: #F9EDF0;
    }
  </style>
</head>

<body>
  <div>


    <form method='post' action="" style="margin-left:1350px;margin-top:2%;">
      <input type="submit" class="btn btn-danger btn-sm" style="font-size:15px;font-weight:bold" value="home" name="home">
      <input type="submit" class="btn btn-danger btn-sm" style="font-size:15px;font-weight:bold" value="Logout" name="but_logout">
    </form>

  </div>

  </div>
  </div>
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav">
        <h4 style="margin-top:8%">My Account</h4>
        <hr>
        <ul class="nav nav-pills nav-stacked" style="margin-top:4%;padding: 1px;">
          <li class="active" style="margin-top:8%;">
            <?php
            session_start();
            include 'config.php';

            echo
            '<a href="http://localhost/ecommerce/frontend/Front-endview/editprofile.php?id=' . $custId . '">Manage profile</a></li>';
            ?>


          <li class="active" style="margin-top:8%"><a href="http://localhost/ecommerce/frontend/Front-endview/changepass.php">Change Password</a></li>
          <li class="active" style="margin-top:8%"><a href="wish-list.php">My Wish list</a></li>
          <li class="active" style="margin-top:8%"><a href="#section3">My Orders</a></li>
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

      <div class="col-sm-9">
        <div class="container" style="margin-top:15%;">
          <div class="main-body">

            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="<?php echo $row["profilePicture"]; ?>" alt="Admin" class="rounded-circle" width="150">
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

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-7">
            <div class="footer__about">
              <div class="footer__logo">
                <a href="./index.php"><img src="img/logo.png" alt=""></a>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                cilisis.</p>
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
                </script> All rights reserved<i class="fa fa-heart"> </p>
            </div>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>

</body>

</html>