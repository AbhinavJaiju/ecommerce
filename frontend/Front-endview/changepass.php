<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EShop</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="pass.js"></script> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

<style>
  .btn{
        color: white;
      background-color: #ca1515;
      border: #ca1515 solid 1px;  
      }

      .container{
        height:100px;
        width:1600px;
      }
  </style>
  <?php
  include "navigation.php";
  ?>
</head>
<?php
      include 'config.php';
      session_start();
     
      if (isset($_POST['re_password']))
          {
            
          $old_pass = $_POST['old_pass'];
          $new_pass = $_POST['new_pass'];
          $re_pass = $_POST['re_pass'];
          $sql_query= "select * from customers where customerId=".$_SESSION["id"];
          $result = mysqli_query($conn,$sql_query);
          $row = mysqli_fetch_array($result);
          $database_password = $row['passwords'];
          if ($database_password == $old_pass)
              {
              if ($new_pass == $re_pass)
                  {
                  $sql_query1="update customers set passwords='$new_pass' where customerId=".$_SESSION["id"];
                  //echo $sql_query1;
                  if ($conn->query($sql_query1) === TRUE) {
                  echo "<script>alert('Update Sucessfully'); window.location='myaccount.php'</script>";
                  }
                  else{
                    echo "error";
                  }
                  }
                else
                  {
                  echo "<script>alert('Your new and Retype Password is not match'); window.location='changepass.php'</script>";
                  }
              }
            else
              {
              echo "<script>alert('Your old password is wrong'); window.location='changepass.php'</script>";
              }
          }
       
      
?>
<body>

<div class="container">
<div class="row">
<div class="col-sm-12">
<h3 style="text-aign:center;margin-left:40%;margin-top:10%;margin-bottom:4%;color:#ca1515">Change Password</h3>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<div class="card h-100" style="height:720px;margin-right:2%;margin-left:2%">
<div class="card-body"style="height:270px; ">
<form method="post" id="passwordForm" action="changepass.php">
<label style="margin-top:2%;font-size:14px;">Old Password</label>
<input type="password" class="input-lg form-control" name="old_pass" id="password" placeholder="Old Password" autocomplete="off"><br>
<label style="font-size:14px;">New Password</label>
<input type="password" class="input-lg form-control" name="new_pass" id="password1" placeholder="New Password" autocomplete="off"><br>
<label style="font-size:14px;">Re-Type New Password</label>
<input type="password" class="input-lg form-control" name="re_pass" id="password2" placeholder="Confirm Password" autocomplete="off"><br>
<input type="submit" name="re_password" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
</form>
</div>
</div>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>

</body>
<!-- Footer Section Begin -->
<footer class="footer mt-5">
        <div class="container" style="margin-top:33%;">
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
</html>