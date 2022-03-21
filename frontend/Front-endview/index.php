<?php
session_start();
include "config.php";

$id = $_SESSION['cutomerId'];
// Check user login or not
// if(!isset($_SESSION['uname'])){
//     header('Location: index.php');
// }

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EShop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
<?php

include "config.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT productImage.fileName,productImage.pImageId ,products.productId,products.productname,products.price FROM productImage join products ON productImage.productId = products.productId ORDER BY productImage.pImageId DESC LIMIT 10;";
$ssql = "SELECT bannerImage FROM `banners` LIMIT 1;";
$rsql = "SELECT products.productId, COUNT(orderDetails.productId)  as prdCount,products.productName ,productImage.fileName,products.price FROM products INNER JOIN productImage ON products.productId=productImage.productId INNER JOIN orderDetails on orderDetails.productId=products.productId GROUP by productId ,fileName ORDER BY prdCount DESC LIMIT 5;";
?>

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
            <!-- <li><a href="#"><span class="icon_heart_alt"></span>

                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>

                </a></li> -->
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/logo3.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
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
                                    <?php

                                    $seql = "SELECT * FROM categories ";
                                    //echo $sql;
                                    $result = $conn->query($seql);


                                    if ($result = $conn->query($seql)) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<li><a href=\"./shop.php?id={$row["categoryId"]}\">{$row["categoryName"]}</a></li>";
                                        }
                                    } else {
                                        echo "Server Error ! Please try again later";
                                    }
                                    ?>

                                </ul>
                            </li>

                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="myaccount.php" style="font-weight: bold; font-size: large;">
                                <?php
                                if ($_SESSION['uname']) {


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

                                </a></li>
                            <li><a href="shop-cart.php"><span class="icon_bag_alt"></span>

                                </a></li>
                            <li>
                                <form method='post' action="">
                                    <button type="submit" class="btn text-black " name="but_logout">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
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
    <!-- Header Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg" data-setbg="img/categories/lappic3.jpeg" style="margin-left:.5em;">
                        <div class="categories__text">
                            <h1 style="color: white;">Laptop</h1>
                            <p style="font-weight: bold;">Get All the Latest High Specification Laptops</p>
                            <a href="shop.php?id=1" style="color: white;">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/camera.jpg">
                                <div class="categories__text">
                                    <h4 style="color: white;">Camera</h4>
                                    <!-- <p style="color: white;">358 items</p> -->
                                    <a href="shop.php?id=3" style="color: white;">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/mobile.png">
                                <div class="categories__text">
                                    <h4 style="color: white;">Mobiles</h4>
                                    <!-- <p style="color: white;">273 items</p> -->
                                    <a href="shop.php?id=2" style="color: white;">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/headset.jpg">
                                <div class="categories__text">
                                    <h4 style="color: white;">Headset</h4>
                                    <!-- <p style="color: white;">159 items</p> -->
                                    <a href="shop.php?id=4" style="color: white;">Shop now</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




    &nbsp;
    &nbsp;
    &nbsp;
    <div class="newproduct" style="margin-left: 3em;">
        <div class="section-title">
            <h4>New product</h4>
        </div>
        <div class="row1">
            <?php
            $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
            if ($result = $conn->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    $rs = $fmt->format($row["price"]);

            ?>


                    <div class="column1" style="float: left;width:20%;padding: 5px;">

                        <div class="product__item ">



                            <div class="product__item__pic set-bg" data-setbg="img/shop/<?php echo $row['fileName'] ?>" style="width: 60%;">
                                <div class="label new">New</div>
                                <ul class="product__hover">
                                    <li><a href="img/shop/<?php echo $row['fileName'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text ">
                                <h6><a href="#"><?php echo $row["productname"] ?></a></h6>

                                <div class="product__price">Rs <?php echo $rs ?></div>
                            </div>
                        </div>
                    </div>

            <?php

                }
                $result->free();
            } ?>

        </div>
    </div>

    &nbsp;
    <br>
    <br>
    <!-- </section> -->
    <!-- Product Section End -->

    <?php
    if ($result = $conn->query($ssql)) {
        while ($row = $result->fetch_assoc()) {

    ?>
            <section class="banner set-bg" data-setbg="img/banner/<?php echo $row['bannerImage'] ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 m-auto">
                            <div class="banner__slider owl-carousel">
                                <div class="banner__item">
                                    <div class="banner__text">
                                        <span>The Best Camera Collections</span>
                                        <h1>Available from 30 March 2022</h1>
                                        <a href="#">Shop now</a>
                                    </div>
                                </div>
                                <div class="banner__item">
                                    <div class="banner__text">
                                        <span>Cannon EOS</span>
                                        <h1>M50</h1>
                                        <a href="#">Shop now</a>
                                    </div>
                                </div>
                                <div class="banner__item">
                                    <div class="banner__text">
                                        <span>CheckOut </span>
                                        <h1>Available @ 69999</h1>
                                        <a href="#">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php
        }
    } ?>
    <!-- Banner Section End -->


    &nbsp;
    &nbsp;
    <div class="row3" style="margin-left: 3em;">
        <div class="section-title">
            <h4>Most ordered Products</h4>
        </div>
        <div class="row1">
            <?php
            $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
            if ($result = $conn->query($rsql)) {
                while ($row = $result->fetch_assoc()) {
                    $rs = $fmt->format($row["price"]);

            ?>


                    <div class=" column1" style="float: left;width:20%;padding: 5px;">

                        <div class="product__item">



                            <div class="product__item__pic set-bg" data-setbg="img/shop/<?php echo $row['fileName'] ?>" style="width: 60%;">

                                <ul class="product__hover">
                                    <li><a href="img/shop/<?php echo $row['fileName'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#"><?php echo $row["productName"] ?></a></h6>

                                <div class="product__price">Rs <?php echo $rs ?></div>
                            </div>
                        </div>
                    </div>

            <?php

                }
                $result->free();
            } ?>

        </div>
    </div>


    <!-- Discount Section Begin -->
    &nbsp;
    &nbsp;
    <section class="discount">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="discount__pic">
                        <img src="img/discountphone.jpg" alt="" style="width: 585px;height: 390px;">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="discount__text">
                        <div class="discount__text__title">
                            <span>Discount</span>
                            <h2>Summer 2019</h2>
                            <h5><span>Sale</span> 50%</h5>
                        </div>
                        <div class="discount__countdown" id="countdown-time">
                            <div class="countdown__item">
                                <span>22</span>
                                <p>Days</p>
                            </div>
                            <div class="countdown__item">
                                <span>18</span>
                                <p>Hour</p>
                            </div>
                            <div class="countdown__item">
                                <span>46</span>
                                <p>Min</p>
                            </div>
                            <div class="countdown__item">
                                <span>05</span>
                                <p>Sec</p>
                            </div>
                        </div>
                        <a href="shop.php">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Free Shipping</h6>
                        <p>For all oder over $99</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Money Back Guarantee</h6>
                        <p>If good have Problems</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6>Online Support 24/7</h6>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>Payment Secure</h6>
                        <p>100% secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

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

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
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