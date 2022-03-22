<!-- PHP => Get wish list from database -->
<?php
session_start();
include "config.php";
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}
$userId = $_SESSION['cutomerId'];
if($userId<1){
    echo "<script>alert(\"Please login to E-Commerce\")</script>";
    echo "<script>window.location.href='index.php';</script>";
    exit;
}


$sql = "SELECT wishLists.wishListId,wishLists.productId,
products.productName,
productImage.fileName FROM wishLists
INNER JOIN products ON wishLists.productid = products.productid
LEFT JOIN productImage ON productImage.productid = products.productid
WHERE customerId=$userId";

$result = $conn->query($sql);
$row = $result->fetch_assoc();


// Get count of wishlist and cart
$wishlist = "SELECT COUNT(wishListId) AS wishList FROM wishLists where customerId=$userId";
$cart = "SELECT COUNT(productCartId) AS cart FROM productCarts where customerId=$userId";
$wishResult = $conn->query($wishlist);
$cartResult = $conn->query($cart);
$wishCount = $wishResult->fetch_assoc();
$cartCount = $cartResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List</title>

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
                    <div class="tip"></div>
                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                    <div class="tip"></div>
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
                                        echo '<div class="tip">' . $wishCount['wishList'] . '</div>';
                                    }
                                    ?>
                                </a></li>
                            <li><a href="shop-cart.php"><span class="icon_bag_alt"></span>

                                    <!-- Cart count badge -->
                                    <?php
                                    if ($cartCount['cart'] > 0) {
                                        echo '<div class="tip">' . $cartCount['cart'] . '</div>';
                                    }
                                    ?>
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Wish List</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Wish List Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td class="cart__product__item">
                                            <img src="img/shop/<?php echo $row["fileName"]; ?>" alt="" height="80px" width="80px">
                                            <div class="cart__product__item__title">
                                                <h6>
                                                    <a style="color: black;" href='product-details.php?id=<?php echo $row["productId"]; ?>'><?php echo $row["productName"]; ?></a>
                                                </h6>
                                            </div>
                                        </td>
                                        <td class="cart__quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </td>

                                        <td class="cart__close">
                                            <button class="btn btn-outline-danger" id="<?php echo $row["productId"]; ?>"><i class="fa fa-light fa-cart-plus"></i></button>
                                        </td>

                                        <td class="cart__close"><span class="icon_close" id="<?php echo $row["wishListId"]; ?>"></span></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="index.php">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="shop-cart.php">View Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->


    <?php
    include "footer.php";
    ?>


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


<!-- Scripts -->
<script>
    // Delete from wishlist
    $('.icon_close').click(function() {
        let val = $(this).get(0).id;
        // console.log(val);
        if (confirm('Are you sure you want to remove this product?')) {
            $.ajax({
                url: 'php/delete-wish-list.php',
                type: 'POST',
                data: {
                    id: val
                },
                dataType: 'json',
                success: function(data) {
                    if (data.result == 'success') {
                        alert('Product removed successfully');
                        location.reload();
                    } else {
                        alert('Something went wrong');
                        console.log(data);
                        // location.reload();
                    }
                }
            });
        }
    });

    // Add to cart button
    $('td').find('button').click(function() {

        var prodId = $(this).attr('id');
        var qty = $('.pro-qty').find('input').val();
        // console.log(val);
        // console.log(qty);

        $.ajax({
            url: 'php/add-to-cart.php',
            type: 'POST',
            data: {
                id: prodId,
                quantity: qty
            },
            dataType: 'json',
            success: function(data) {
                console.log(data.result)
                if (data.result == 'success') {
                    alert('Product added to cart successfully');
                    // location.reload();
                } else if (data.result == 'exists') {
                    alert('Product already in cart');
                } else {
                    alert('Something went wrong');
                    console.log(data);
                }

            }
        });
    });
</script>

<style>
    .btn {
        height: 45px;
        width: 45px;
        border-radius: 50%;
        font-size: 20px;
        /* line-height: 44px; */
        text-align: center;
        display: inline-block;
        font-weight: 600;
        cursor: pointer;
    }
</style>