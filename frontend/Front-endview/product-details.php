<?php
session_start();
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}

include "config.php";
$customerId = $_SESSION['cutomerId'];
$categoryId = $_SESSION['CategoryId'];
$categoryName=$_SESSION["CategoryName"];




$strValue = $_GET['id'];
$_SESSION["ProductId"] = $strValue;
$catnam = $_SESSION["Category"];
$sql = "SELECT productName FROM products
WHERE productId=$strValue";
$result = $conn->query($sql);

$row = $result->fetch_assoc() ;
$_SESSION["ProductName"] = $row['productName'];

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
        include "navigation.php";
        ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="shop.php?id=<?php echo $categoryId; ?>"><?php echo $categoryName; ?></a>
                        <span><?php echo $_SESSION["ProductName"];?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">

                        <?php
                        $sql = "SELECT * FROM products where productId=$strValue";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $check = $row["productStatus"];
                        if ($check == 1) {
                            $availability = "In Stock";
                        } else {
                            $availability = "Out of Stock";
                        }
                        $sql2 = "SELECT fileName FROM productImage
                        WHERE productId=$strValue";
                        $result1 = $conn->query($sql2);
                        $file = $result1->fetch_assoc();
                        $original = (int)($row["price"]) + ((int)($row["price"]) * 5 / 10);
                        $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                        $rs = $fmt->format($row["price"]);
                        $oldvalue = $fmt->format($original);


                        $reviewcount = "SELECT count(reviewId) as count FROM reviews
                        WHERE productId=$strValue && status = 'Approved'";

                        $reviewcountvalue = $conn->query($reviewcount);
                        $rcount = $reviewcountvalue->fetch_assoc();
                        $count = $rcount["count"];

                        echo "
                        <div class='toast'>
                            <i class='fa fa-solid fa-heart'></i>
                        </div>
                        <div class=\"product__details__slider__content\">
                       <div class=\"product__details__pic__slider owl-carousel\">
                        <img data-hash=\"product-1\" class=\"product__big__img\" src=\"img/shop/{$file["fileName"]}\" alt=\"\">          
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class=\"col-lg-6\">
                            <div class=\"product__details__text\">
                        <h3>{$row["productName"]} <span>Brand: {$row["productName"]}</span></h3>
                        <div class=\"rating\">
                            
                            <span>Reviews ( $count )</span>
                        </div>
                        <div class=\"product__details__price\">???$rs <span>??? $oldvalue</span></div>
                        <p>{$row["productDescription"]}</p>
                        <div class=\"product__details__button\">

                        <form method=\"POST\">
                            <div class=\"quantity\">
                                <span>Quantity:</span>
                                <div class=\"pro-qty\">
                                    <input type=\"text\" value=\"1\" name=\"quantity\">
                                </div>
                            </div>
                            <input type=\"submit\" name=\"qtysubmit\" value=\"Add to cart\" class=\"cart-btn\" >
                        </form>
                        ";
                       

                        if (isset($_POST['qtysubmit'])) {
                            $qty = $_POST['quantity'];
                            $_SESSION["Quantity"] = $qty;
                            if ($customerId > 0) {
                                $check="SELECT quantity FROM productCarts where customerId=$customerId and productId=$strValue;";
                                //$conn->query($check);
                                $result = $conn->query($check);
                                $row = $result->fetch_assoc();
                                if($row['quantity']>0)
                                {
                                    $qty=$qty+$row['quantity'];
                                    $update="UPDATE productCarts
                                    SET quantity=$qty
                                    WHERE customerId=$customerId and productId=$strValue; ";
                                    $conn->query($update);
                                    echo "<script type=\"text/javascript\">toastr.success(\"Product added to cart ,
                                { timeOut: 1 },{positionClass: \'toast-bottom-right\'}\")</script>";
                                    echo "<script>alert(\"Quantity updated in cart\")</script>";
                                }
                                else{
                                    $insert = "INSERT into productCarts(quantity, customerId, productId)
                            VALUES ($qty, $customerId, $strValue);";
                                $conn->query($insert);
                                echo "<script type=\"text/javascript\">toastr.success(\"Product added to cart ,
                            { timeOut: 1 },{positionClass: \'toast-bottom-right\'}\")</script>";
                                echo "<script>alert(\"Product added to cart\")</script>";
                                } 
                            }
                        }
                        echo "   
                        
                            <ul>
                            
                                <li><a class='wishList' id='$strValue'><span class=\"icon_heart_alt\"></span></a></li>
                                
                            </ul>
                        </div>
                        <div class=\"product__details__widget\">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class=\"stock__checkbox\">
                                    <p>
                                       
                                            $availability
                                            
                                            </p>
                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-12\">
                    <div class=\"product__details__tab\">
                        <ul class=\"nav nav-tabs\" role=\"tablist\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link active\" data-toggle=\"tab\" href=\"#tabs-1\" role=\"tab\">Description</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" data-toggle=\"tab\" href=\"#tabs-2\" role=\"tab\">Specification</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" data-toggle=\"tab\" href=\"#tabs-3\" role=\"tab\">Reviews ( $count )</a>
                            </li>
                        </ul>
                        <div class=\"tab-content\">
                            <div class=\"tab-pane active\" id=\"tabs-1\" role=\"tabpanel\">
                                <h6>Description</h6>
                                <p>{$row["shortDescription"]}</p>
                            </div>
                            <div class=\"tab-pane\" id=\"tabs-2\" role=\"tabpanel\">
                                <h6>Specification</h6>
                                <p>{$row["specification"]}</p>
                            </div>
                            <div class=\"tab-pane\" id=\"tabs-3\" role=\"tabpanel\">
                                <h6>Reviews ( $count )</h6>";
                                echo"
                             <div class=\"contact__form\">
                            <h5>ADD A REVIEW</h5>
                            
                            <form  method=\"post\" enctype=\"multipart/form-data\">

                                <textarea placeholder=\"Review\" name=\"message\"></textarea>
                                <button type=\"submit\" name=\"review\" class=\"site-btn\">SUBMIT</button>
                            </form>
                        </div><br><br>";
                        if (isset($_POST['review'])) {
                            
                            $message = $_POST['message'];
                            date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                            $today= date('Y-m-d');
                            $status=0;

                            $sql = "INSERT INTO reviews (review, createdDate, status,customerId,productId) 
                            VALUES (\"$message\", \"$today\", $status, $customerId,$strValue)";

                            if ($conn->query($sql) === TRUE) {

                                //echo "Review submitted";
                            } else {
                                echo "Server Error ! Please try again later";
                            }
                        }
                        

                        $sql = "SELECT *  FROM reviews where productId=$strValue && status='Approved'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $name = "SELECT * FROM customers where customerId={$row["customerId"]}";
                                $nameresult = $conn->query($name);
                                $customer = $nameresult->fetch_assoc();

                                echo "
                                        {$customer["customerName"]}&nbsp;&nbsp;{$customer["createdDate"]}
                                        <p>{$row["review"]}</p>";
                            }
                        } else {
                            
                           
                        }
                        ?></div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>RELATED PRODUCTS</h5>
                </div>
            </div>
            <?php
            $strValue;
            $sql = "SELECT *  FROM products where categoryId=$categoryId
                                    AND  productId <> $strValue 
                                    limit 4 ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["productId"];
                    $sql2 = "SELECT fileName FROM productImage
                                    WHERE productId=$id";
                    $result1 = $conn->query($sql2);
                    $file = $result1->fetch_assoc();
                    $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                    $rs = $fmt->format($row["price"]);
                    echo " <div class=\"col-lg-3 col-md-4 col-sm-6\">
                                    <div class=\"product__item\">
                                    <div class=\"product__item__pic set-bg\" data-setbg=\"img/shop/{$file["fileName"]}\">
                                    <ul class='product__hover'>
                                         <li>  <div class='d-flex align-items-center justify-content-center'>
                                            <div class='toast'>
                                        <i class='fa fa-solid fa-heart'></i>
                                        </div>
                                        </div></li>
                                        </ul>
                                        <ul class=\"product__hover\">
                                            <li><a href=\"img/shop/{$file["fileName"]}\" class=\"image-popup\"><span class=\"arrow_expand\"></span></a></li>
                                            <li><a class='wishList' id='$strValue'><span class=\"icon_heart_alt\"></span></a></li>
                                           
                                            <li><a href=\"#\"><span class=\"icon_bag_alt\"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class=\"product__item__text\">
                                    <h6><a href='product-details.php?id={$row["productId"]}'> {$row["productName"]}</a></h6>
                                    <div class=\"rating\">
                                    <i class=\"fa fa-star\"></i>
                                    <i class=\"fa fa-star\"></i>
                                    <i class=\"fa fa-star\"></i>
                                    <i class=\"fa fa-star\"></i>
                                    <i class=\"fa fa-star\"></i>
                                    </div>
                                    <div class=\"product__price\">???$rs</div>
                                    </div>
                                    </div>
                                </div>";
                }
            } else {
                echo "No results";
            }
            ?>
        </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    
    <?php
    include "footer.php"
    ?>
    

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
<script>
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
                    alert('Product added to cart');
                } else {
                    alert("Something went wrong");
                    console.log(response);
                }

            }
        });
    });
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
    </script>


</html>
<style>
 
 
.toast {
 
 
position: absolute;
 
 
color: red;
 
 
background: none;
 
 
font-size: 50px;
 
 
bottom: 45%;
 
 
left: 85%;
 
 
}
 
 
</style>