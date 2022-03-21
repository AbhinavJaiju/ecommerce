<?php
session_start();
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
$userId=$_SESSION['cutomerId'];
include "config.php";

?>


<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eshop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

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
                        <span>My Orders</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Details</th>
                                    <th>Status</th>
                                    <th>Order date</th>
                                    <th>Amount</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                 

                                       

                            <?php
                            $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                            $sql = "SELECT orders.orderdate,orders.orderStatus,orders.orderId,orders.totalprice,
                            orders.customerId,orderDetails.productId,orderDetails.price,orderDetails.orderId,products.productName,productImage.fileName
                            FROM orders 
                            INNER JOIN orderDetails on orders.orderId=orderDetails.orderId
                            inner join products on products.productId=orderDetails.productId 
                            inner join productImage on products.productId=productImage.productId
                            order by orders.orderdate DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {
                                    echo"   <tr>
                                    <td class=\"cart__product__item\">
                                        <img src=\"img/shop/{$row["fileName"]}\" alt=\"{$row["productName"]}\" style=\"height: 110px;
                                        width: 90px;\">
                                        <div class=\"cart__product__item__title\">
                                           
                                            <h5>
                                                <a style=\"color: black;\" href=\"product-details.php?id= {$row["productId"]}\">{$row["productName"]}</a>
                                            </h5>
                                           
                                            
                                        </div>
                                        
                                    </td>";
                                    $rs = $fmt->format($row["price"]);
                                    echo"<td>
                                                <h5>
                                               {$row["orderStatus"]}
                                                </h5>
                                            </td>
                                            <td>
                                                <h5>
                                                {$row["orderdate"]}

                                                </h5>
                                            </td>
                                            <td>
                                                <h5>
                                                ₹ $rs

                                                </h5>
                                            </td>
                                            ";
                                    
                                    
                                   

                                    
                                }
                            }
                            else{
                                echo "No order history found";
                            }
                            echo"
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-lg-6 col-md-6 col-sm-6\">
                    <div class=\"cart__btn\">
                        <a href=\"index.php\">Continue Shopping</a>
                    </div>
                </div>
                <div class=\"col-lg-6 col-md-6 col-sm-6\">
                    <div class=\"cart__btn update__btn\">


                        
                       
                    </div>
                </div>
            </div>";                
                              ?>                
                             
            
            
               </span>
            </li> </ul>
                    </div > 
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

   
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

</html>