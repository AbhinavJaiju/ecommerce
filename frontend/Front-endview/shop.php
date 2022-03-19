<?php
session_start();
//get category id from session

$strValue = $_GET['id'];
if ($strValue > 0) {
    $categoryId = $strValue;
} else {
    $categoryId = 3;
}


$_SESSION["CategoryId"] = $strValue;
//$categoryId=3;
include "config.php";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>

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
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
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
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.html">Home</a></li>
                            <li><a href="#">Women’s</a></li>
                            <li><a href="#">Men’s</a></li>
                            <li class="active"><a href="./shop.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./product-details.html">Product Details</a></li>
                                    <li><a href="./shop-cart.html">Shop Cart</a></li>
                                    <li><a href="./checkout.html">Checkout</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="#">Login</a>
                            <a href="#">Register</a>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="wish-list.php"><span class="icon_heart_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
                            <li><a href="shop-cart.php"><span class="icon_bag_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">



                                    <?php

                                    $sql = "SELECT * FROM categories ";
                                    //echo $sql;
                                    $result = $conn->query($sql);


                                    if ($result->num_rows > 0) {
                                        //echo "inside if";

                                        while ($row = $result->fetch_assoc()) {
                                            echo "  <div class='card'>
                                        <div class='card-heading active'>
                                            <a href=\"shop.php?id={$row["categoryId"]}\">{$row["categoryName"]}</a>
                                        </div>
                                    </div>
                                    ";
                                        }
                                    }



                                    ?>





                                </div>
                            </div>
                        </div>

                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" <?php


                                                                                                                                    $minsql = "SELECT MIN(price) as min FROM products where categoryId=$categoryId";
                                                                                                                                    //echo $minsql;
                                                                                                                                    $min = $conn->query($minsql);

                                                                                                                                    $val = $min->fetch_assoc();
                                                                                                                                    $minval = (int)$val["min"];



                                                                                                                                    $maxsql = "SELECT MAX(price) as max FROM products where categoryId=$categoryId";
                                                                                                                                    //echo $minsql;
                                                                                                                                    $max = $conn->query($maxsql);

                                                                                                                                    $val2 = $max->fetch_assoc();
                                                                                                                                    $maxval = (int)$val2["max"];





                                                                                                                                    echo "data-min=$minval
                                    data-max=$maxval

                                    ";







                                                                                                                                    ?>></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price</p>
                                        <input type="text " id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div><a href="#">FILTER</a>

                            <!-- <a href=\"http://localhost/ashion-master/shop.php?id=$categoryId?min=$minval?max=$maxval\">
                                FILTER</a> -->

                        </div>






                    </div>
                </div>



                <div class="col-lg-9 col-md-9">
                    <div class="row">


                    





                        <?php
                        // echo $maxbyurl = $_GET['max'];

                        // $minbyurl = $_GET['min'];
                        // if($maxbyurl>0&&$minbyurl>0){
                        //     $sql = "SELECT * FROM products where categoryId=$categoryId 
                        //     and price between $minbyurl and $maxbyurl";

                        // }

                        // else{
                        $sql = "SELECT * FROM products where categoryId=$categoryId";
                        // }

                        //echo $sql;

                        $result = $conn->query($sql);


                        if ($result->num_rows > 0) {
                            //echo "inside if";

                            while ($row = $result->fetch_assoc()) {
                                //echo "inside while";
                                $id = $row["productId"];

                                //echo $id;



                                $sql2 = "SELECT fileName FROM productImage
                     WHERE productId=$id";
                                $result1 = $conn->query($sql2);
                                $file = $result1->fetch_assoc();
                                $location = "Images\\";
                                $filename = $location . $file["fileName"];
                                $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                $rs = $fmt->format($row["price"]);
                                //NEWW
                                //  <div class='label new'>New</div>


                                echo "
                    
                    <div class='col-lg-4 col-md-6'>
                            <div class='product__item'>
                                <div class='product__item__pic set-bg' data-setbg='img/shop/{$file["fileName"]}'>
                                
                                <!-- Toaster Begins -->
                                <ul class='product__hover'>
                                <li>  <div class='d-flex align-items-center justify-content-center'>
                                <div class='toast'>
                                    <i class='fa fa-solid fa-heart'></i>
                                </div>
                                </div></li>
                                </ul>

                                <!-- Toaster Ends -->

                                    <ul class='product__hover'>
                                        <li><a href=\"img/shop/{$file["fileName"]}\" class='image-popup'><span class='arrow_expand'></span></a></li>
                                        <li><a class='wishList' id='{$row["productId"]}'><span class='icon_heart_alt'></span></a></li>
                                        <li><a href='#'><span class='icon_bag_alt'></span></a></li>
                                    </ul>
                        
                                  
                                </div>
                                <form method=\"POST\">
                                
                                <div class='product__item__text'>
                                    <h6><a href='product-details.php?id={$row["productId"]}'>{$row["productName"]}</a></h6>
                                    <div class='rating'>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                    </div>
                                    <div class='product__price'>₹$rs</div>
                                </div>
                            </div>
                        </div>
                        

                    ";
                            }
                        } else {
                            echo "0 results";
                        }
                        // mysqli_close($con);



                        if (isset($_POST['edit'])) {




                            // echo $did = $_POST['id'];
                            //echo "inside edit"."$did";
                            // $_COOKIE['productId'] = $did;


                            // $_SESSION['id'] = $_POST['id'];
                            // $var = $_POST['id'];
                            // echo "$var";



                            // header("Location: http://localhost/Projects/productEdit.php?id=" . $var);
                        }
                        ?>
                        
   
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
  
    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
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
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
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


<script>
    

    // Adding products to wishlist
    $('.wishList').click(function() {
        var product_id = $(this).attr('id');
        $('.toast').toast('show');
        // console.log(product_id);
        // $.ajax({
        //     url: "php/add-to-wishlist.php",
        //     method: "POST",
        //     data: {
        //         productId: product_id
        //     },
        //     success: function(data) {
        //         if(data == 'success'){
        //             alert('Product added to wishlist');
        //         }
        //         else{
        //             alert("Something went wrong");
        //             console.log(data);
        //         }
        //     }
        // });
    });
</script>