<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo3.png" alt="" style="height: 35px;width: 100px;"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li><li><a href="#">Shop</a>
                                <ul class="dropdown">
                            <?php

                                    $sql = "SELECT * FROM categories ";
                                    //echo $sql;
                                    $result = $conn->query($sql);


                                    if ($result->num_rows > 0) {
                                        //echo "inside if";

                                        while ($row = $result->fetch_assoc()) {
                                            echo"<li><a href=\"./shop.php?id={$row["categoryId"]}\">{$row["categoryName"]}</a></li>";
                                        }
                                    }
                                    else{
                                        echo"Server Error ! Please try again later";
                                    }
                                            ?>
                                         
                                </ul>
                            </li>
                            <!-- <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./product-details.php">Product Details</a></li>
                                    <li><a href="./shop-cart.php">Shop Cart</a></li>
                                    <li><a href="./checkout.php">Checkout</a></li>

                                </ul>
                            </li> -->

                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <?php
                            if ($_SESSION['uname']) {

                                // echo '<a style="margin-left:10px;font-size:15px" href="http://localhost/ecommerce/frontend/Front-endview/logout.php"><strong>Logout</strong></a>';

                                echo $_SESSION['uname'];
                            } else {
                                echo  '<a href="login.php">Login</a>
                                <a href="#">Register</a>';
                            }

                            ?>

                        </div>

                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="wish-list.php"><span class="icon_heart_alt"></span>
                                    
                                </a></li>
                            <li><a href="shop-cart.php"><span class="icon_bag_alt"></span>
                                   
                                </a></li>
                            <li>
                                <form method='post' action="" style="margin-left:1%">
                                    <input type="submit" class="btn btn-default btn-sm" style="font-size:15px;font-weight:bold" value="Logout" name="but_logout">
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