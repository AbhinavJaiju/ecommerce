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
                                           
                                            
                                        </div>
                                    </td>
                                    <td class=\"cart__price\" id=\"priceid\">₹ $rs</td>";

                                    
                                   
                                    echo"
                                    <td class=\"cart__quantity\">
                                        <div >
                                            <p id=\"qty\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;{$row["quantity"]}</p>
                                        </div>
                                    </td>";

                                    
                                    
                                    $rowtotal=(int)$products["price"]*(int)$row["quantity"];
                                   
                                    echo"
                                    <td class=\"cart__total\">₹$rowtotal</td>
                                    
                                    <td class=\"cart__close\">
                                   

                                    <form method='post'>
                                    <input type=hidden name=cid value= {$row["productCartId"]} >
                                    <button type=\"submit\" class=\"btn  \" name=delete>
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash3\" viewBox=\"0 0 16 16\">
                                    <path d=\"M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z\"/>
                                    </svg>
                                    </button>
                                
                                    </form>

                                   
                                    
                                    
    
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
                        //$sum= $fmt->format($products["price"]);
               
                            echo"₹$sum";
                            //}
               ?>
               </span>
            </li> </ul>


<?php
if (isset($_POST['checkout'])) {
                            
    if ($userId > 0 ) {
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $today= date('Y-m-d');
        
       $orderStatus="pending";
       if($sum>0){
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
                                    echo "<script>window.location.href='checkout.php';</script>";
                                   
                                    
                                    
                                    } 

            
            }
        }
        else{
            echo"Server Error";
        }
           
       }
       else{
           echo"Cart is empty";
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