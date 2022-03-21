<?php
session_start();
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}

$userId=$_SESSION['cutomerId'];
$categoryId = $_SESSION["CategoryId"];
$total=$_SESSION["TotalAmount"];
$customerId = $_SESSION['cutomerId'];

include "config.php";

$sql = "SELECT * FROM customers
WHERE customerId=$customerId";
$result = $conn->query($sql);

$row = $result->fetch_assoc() ;
$address= $row["address"];
$phn= $row["phoneNumber"];



?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eshop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                    <div class="tip">2</div>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <?php
    
    include "navigation.php"
    ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
           
            <form action="" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <h3>Your order has been placed</h3>
                    </div>
                        
                        <div class="col-lg-4">
                            <div class="checkout__order" >
                                <h5>Details</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        
                                        
                                        <li>
                                            <span class="top__text">Address</span>
                                           
                                        </li>
                                        <li><?php echo $address; ?></li>
                                        <li>
                                            <span class="top__text">Mode</span>
                                           
                                        </li>
                                        <li>Pay on delivery</li>
                                        
                                        
                                        
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                  <?php  $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                               $rs= $fmt->format($total);
                               ?>
                                       
                                        <li>Total <span>₹ <?php echo $rs; ?></span></li>
                                    </ul>
                                </div>
                                
                               
                            </div>
                            <div class="cart__btn mt-4">
                        <a href="index.php">Continue Shopping</a>
                    </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

   

    <!-- Footer Section Begin -->
    <?php include "footer.php"; ?>

    <!-- Search Begin -->
   <?php include "globalsearch.php"; ?>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>