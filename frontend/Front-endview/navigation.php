<?php
session_start();
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}
$userId = $_SESSION['cutomerId'];

include "config.php";

if($userId>0){
// Get count of wishlist and cart
$wishlist = "SELECT COUNT(wishListId) AS wishList FROM wishLists where customerId=$userId";
$cart = "SELECT COUNT(productCartId) AS cart FROM productCarts where customerId=$userId";
$wishResult = $conn->query($wishlist);
$cartResult = $conn->query($cart);
$wishCount = $wishResult->fetch_assoc();
$cartCount = $cartResult->fetch_assoc();
}
else{
    $wishCount=0;
    $cartCount=0;
}

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


