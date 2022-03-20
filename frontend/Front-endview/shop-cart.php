<?php
session_start();
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
//get category id from session
//$categoryId = 3;

$userId=$_SESSION['cutomerId'];
$sum=0;
$categoryId = $_SESSION["CategoryId"];

include "config.php";
$quantityArray = array();
$productArray=array();
$priceArray=array();
$append="";



?>


<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

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
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
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
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            if (isset($_POST['delete'])) {
                                $did = $_POST['cid'];
                                $query = "DELETE FROM productCarts WHERE productCartId=$did";
                                if ($conn->query($query) === TRUE ) {
                                    } 
                                else {
                                    echo '<script type="text/javascript"> ';
                                    echo ' alert("Error deleting product details")';
                                    echo '</script>';
                            }



}

                        $sql = "SELECT * FROM productCarts where customerId=$userId";
                        $result = $conn->query($sql);
                      
                        $i=0;
                        
                        
                        if ($result->num_rows > 0 ) {

                            //echo "inside if";
                           
                            while ($row = $result->fetch_assoc()) {
                                
                                //echo "inside while";
                                $productid = $row["productId"];
                                
                                
                                
                                //echo $id;
                                $productssql = "SELECT * FROM products
                                WHERE productId=$productid";
                               $productresult = $conn->query($productssql);
                                $products = $productresult->fetch_assoc();

                              $sql2 = "SELECT fileName FROM productImage
                                 WHERE productId=$productid";
                               $result1 = $conn->query($sql2);
                                $file = $result1->fetch_assoc();
                                
                                $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                               $rs= $fmt->format($products["price"]);

                               
                               




                             echo"   <tr>
                                    <td class=\"cart__product__item\">
                                        <img src=\"img/shop/{$file["fileName"]}\" alt=\"{$products["productName"]}\" style=\"height: 110px;
                                        width: 90px;\">
                                        <div class=\"cart__product__item__title\">
                                            <h5>{$products["productName"]}</h5>
                                            <p>{$products["shortDescription"]}</p>
                                            
                                        </div>
                                    </td>
                                    <td class=\"cart__price\" id=\"priceid\">₹ $rs</td>";
                                   
                                    echo"
                                    <td class=\"cart__quantity\">
                                        <div >
                                            <p id=\"qty\">{$row["quantity"]}</p>
                                        </div>
                                    </td>";

                                    
                                    
                                    $rowtotal=(int)$products["price"]*(int)$row["quantity"];
                                   

                                    echo"
                                    <td class=\"cart__total\">₹$rowtotal</td>
                                    
                                    <td class=\"cart__close\">
                                    <form method='POST'>
                                    <input type=hidden name=cid value= {$row["productCartId"]} >
                                    <input type=submit value=X name=delete 
                                    class='btn btn-danger btn-xs me-3 text-black'
                                    onclick=\"return confirm('Remove item?')\"
                                        ></form>
                                    
                                    
    
                                    </td>
                                    
                                    
                                    
                                    
                                </tr>";
                                $sum+=$rowtotal;
                                $quantityArray[$i]=$row["quantity"];
                                $productArray[$i]=$productid;
                                $priceArray[$i]=$rowtotal;
                                $i++;
                                


                            }}else{
                                echo "No items in cart";
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
                             
            <div class="row">
                <div class="col-lg-6">
                    
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <!-- <h6>Cart total</h6> -->
                        <ul>
                            <li>Total <span>

                    <?php
                    //if (isset($_POST['updateCart'])) {
               
                            echo"₹$sum";
                            //}
               ?>
               </span>
            </li> </ul>


<?php
if (isset($_POST['checkout'])) {
                            
    if ($userId > 0) {
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $today= date('Y-m-d');
        
       $orderStatus="pending";
       $_SESSION["TotalAmount"]=$sum;
        //date_default_timezone_set('Indian/Mahe');

        $order = "INSERT into orders(orderdate, orderStatus, customerId,totalprice)
    VALUES (\"$today\", \"$orderStatus\",$userId, $sum);";
    
    if ($conn->query($order) === TRUE) {
        $lastId = $conn->insert_id;
        $i=0;
    while($quantityArray[$i]>0){
        
      
        $append.="($quantityArray[$i],$lastId,$productArray[$i],$priceArray[$i]),";
        $i++;

    }
   

       
            $tempquery= "INSERT INTO orderDetails(quantity,orderId,productId,price)VALUES".$append;
            $query=rtrim($tempquery, ", ").";";
            if ($conn->query($query) === TRUE) {
                $query = "DELETE FROM productCarts WHERE customerId=$userId;";
                                if ($conn->query($query) === TRUE ) {
                                    echo "<script>alert(\"Order placed\")
                                    </script>";
                                    
                                    
                                    } 

            
            }
        }
        else{
            echo"Server Error";
        }
       
        
    }
    else{
        
        echo "Please login to checkout";
    }
    
    
}
            echo"<form method=\"POST\">
            <a class=\"primary-btn\">
            <input type=\"submit\" name=\"checkout\" value=\"Proceed to checkout\" class=\"btn btn-link text-white\" >
            </a>
                            
                            
                        </form>
                        ";
                       

                        





?>


                         


                    </div > 
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

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
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
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