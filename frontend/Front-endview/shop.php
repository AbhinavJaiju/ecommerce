<?php
session_start();

//logout

if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}

//get,set values -> from sessions and links
$search = $_GET['search'];
echo  $search;

$strValue = $_GET['id'];
if ($strValue > 0) {
    $categoryId = $strValue;
} 
else {
    $categoryId = 1;
}

include "config.php";
$sql = "SELECT categoryName FROM categories 
WHERE categoryId=$categoryId";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$categoryName = $row['categoryName'];


$_SESSION["CategoryId"] = $categoryId;
$_SESSION["CategoryName"] = $categoryName;



//configuration


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
            <li><a href="wish-list.php"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a></li>

            <li><a href="shop-cart.php"><span class="icon_bag_alt"></span>
                    <div class="tip">2</div>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="login.php">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->


    <!-- Header Section Begin -->
    <?php
    include "navigation.php";
    ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="breadcrumb__links">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span><?php echo  $categoryName ?></span>
                    </div>
                </div>
                <div class="col-lg">
                    <input type="text" class="search-products" placeholder="Search products.....">
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
                            <div class="section-title">
                                <input type="text" class="search-categories" placeholder="Search category.....">
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <?php
                                    $sql = "SELECT * FROM categories ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
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
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                        if ($search != "") {
                            // $categoryId = 0;
                            $sql = "SELECT * FROM products where productName like '%$search%'";
                            $result = $conn->query($sql);
                            }
                            else{
                        $sql = "SELECT * FROM products where categoryId=$categoryId";
                        $result = $conn->query($sql);
                            }
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["productId"];
                                $sql2 = "SELECT fileName FROM productImage
                                WHERE productId=$id";
                                $result1 = $conn->query($sql2);
                                $file = $result1->fetch_assoc();
                                $location = "Images\\";
                                $filename = $location . $file["fileName"];
                                $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                $rs = $fmt->format($row["price"]);
                                
                                echo "<div class='col-lg-4 col-md-6'>
                                <div class='product__item'>
                                <div class='product__item__pic set-bg' data-setbg='img/shop/{$file["fileName"]}'>
                                
                                <ul class='product__hover'>
                                <li>  <div class='d-flex align-items-center justify-content-center'>
                                <div class='toast'>
                                    <i class='fa fa-solid fa-heart'></i>
                                </div>
                                </div></li>
                                </ul>
                                
                                <ul class='product__hover'>
                                    <li><a href=\"img/shop/{$file["fileName"]}\" class='image-popup'><span class='arrow_expand'></span></a></li>
                                    <li><a class='wishList' id='{$row["productId"]}'><span class='icon_heart_alt'></span></a></li>
                                    <li><a class='cart' id='{$row["productId"]}'><span class='icon_bag_alt'></span></a></li>
                                </ul>
                                </div>
                                <form method=\"POST\">
                                <div class='product__item__text'>
                                    <h6><a href='product-details.php?id={$row["productId"]}'>{$row["productName"]} </a></h6>
                                    <div class='rating'>
                                       
                                    </div>
                                <div class='product__price'>₹$rs</div>
                            </div>
                        </div>
                    </div>";
                            }
                        } else {
                            echo "0 results";
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
    <?php
    include "footer.php"
    ?>
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


<script>
    // Adding products to wishlist
    $('.wishList').click(function() {
        var product_id = $(this).attr('id');


        // console.log(product_id);
        $.ajax({
            url: "php/add-to-wishlist.php",
            method: "POST",
            data: {
                productId: product_id
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                if (response.result == "exists") {
                    alert('Product already in wishlist');
                } else if (response.result == "success") {
                    $('.toast').toast('show');
                } else {
                    alert("Something went wrong");
                    console.log(response);
                }

            }
        });
    });

    // Adding products to cart
    $('.cart').click(function() {
        var product_id = $(this).attr('id');


        // console.log(product_id);
        $.ajax({
            url: "php/addProductToCart.php",
            method: "POST",
            data: {
                productId: product_id
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                if (response.result == "exists") {
                    alert('Product already in cart');
                } else if (response.result == "success") {
                    alert('Product added to cartr');
                } else {
                    alert("Something went wrong");
                    console.log(response);
                }

            }
        });
    });


    // Search categories
    $('.search-categories').on("keyup", function() {
        var value = $(this).val().toLowerCase();
        // console.log(value);
        $('.card').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

        });
    });

    // Search products
    $('.search-products').on("keyup", function() {
        var value = $(this).val().toLowerCase();
        // console.log(value);
        $('.product__item').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

        });
    });
</script>


<style>
    .search-categories {
        width: 90%;
        font-size: 20px;
        border: none;
        border-bottom: 2px solid #dddddd;
        background: 0 0;
        color: #999;
    }

    .search-products {
        width: 80%;
        font-size: 20px;
        border: none;
        border-bottom: 2px solid #dddddd;
        background: 0 0;
        color: #999;
    }
</style>