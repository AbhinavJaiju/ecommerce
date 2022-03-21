<!DOCTYPE html>
<html lang="en">
<?php

if (!isset($_GET['productId'])) {
}
include("../config.php");

$id = $_GET['productId'];

$sql = "SELECT * FROM products WHERE  productId = $id";
$result = $conn->query($sql);
if ($result->num_rows != 1) {
    die('id not found');
}
$data = $result->fetch_assoc();
if($data['status'] ===1){
    $status = 'In Stock';
}
else{
    $status = "Out of Stock";
}

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ECOMMERECE ADMIN</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body>
    <div class="container-scroller d-flex">
        <!-- partial:./partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item sidebar-category">
                    <p>Navigation</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                        <div class="badge badge-info badge-pill"></div>
                    </a>
                </li>
                <li class="nav-item sidebar-category">
                    <p></p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">MANAGE</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../admin/user/user-listing.php">USERS</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../admin/customer/customer-listing.php">CUSTOMERS</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../admin/order/order-listing.php">
                        <i class="mdi mdi-view-headline menu-icon"></i>
                        <span class="menu-title">ORDERS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../admin/product/product-listing.php">
                        <i class="mdi mdi-chart-pie menu-icon"></i>
                        <span class="menu-title">CATEGORIES</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../admin/product/product-listing.php">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">PRODUCTS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/icons/mdi.html">
                        <i class="mdi mdi-popcorn menu-icon"></i>
                        <span class="menu-title">BANNERS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/icons/mdi.html">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">REVIEWS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/icons/mdi.html">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">ENQUIRES</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/icons/mdi.html">
                        <i class="mdi mdi-pulse menu-icon"></i>
                        <span class="menu-title">ABOUT US</span>
                    </a>
                </li>
                <li class="nav-item sidebar-category">
                    <p></p>
                    <span></span>
                </li>


            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="navbar-brand-wrapper">
                        <a class="navbar-brand brand-logo" href="../index.php"></a>
                        <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../images/logo-mini.svg" alt="logo" /></a>
                    </div>
                    <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" id="user"></h4>
                    <ul class="navbar-nav navbar-nav-right">

                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
                <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                    <ul class="navbar-nav mr-lg-2">
                        <li class="nav-item nav-search d-none d-lg-block">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search"> -->
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="../#" data-toggle="dropdown" id="profileDropdown">
                                <!-- <img src="images/faces/face5.jpg" alt="profile"/> -->
                                <span class="nav-profile-name" id="user1">Bidhu M Renchi</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                                <a class="dropdown-item" href="../../admin/pages/samples/login.html" id="logout">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">

                    <!-- row end -->
                    <script type="text/javascript" src="js/jquery.js"></script>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <p class="card-description">
                                    Update Product
                                </p>
                                <form id="submit_form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="productid" name="productid" value="<?php echo $data['productId'] ?>" disabled >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" id="productname" name="productname" value="<?php echo $data['productName'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Product Description</label>
                                        <textarea class="form-control" id="pdescription" name="pdescription" rows="2"> <?php echo $data['productDescription'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="number">price</label>
                                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $data['price'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Category</label>

                                        <select class="form-control" id="category" name="category">
                                            <?php
                                            $sql = "SELECT * FROM categories";
                                            $result = $conn->query($sql);
                                            ?>
                                            <option selected>Select a category</option>
                                            <?php
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value =" . $row['categoryId'] . ">" . $row['categoryName'] . "</option>";
                                            ?>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="<?php echo $data['status'] ?>"> <?php echo $status ?> </option>
                                                <option value="0">Out Of Stock</option>
                                                <option value="1">In Stock</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="file" required class="form-control" id="file" name="files[]" aria-describedby="inputGroupFileAddon03" aria-label="Upload" multiple>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Short Description</label>
                                        <textarea class="form-control" id="sDescription" name="sDescription" rows="3"> <?php echo $data['shortDescription'] ?> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Specification</label>
                                        <textarea class="form-control" id="specification" name="specification" rows="3"> <?php echo $data['specification'] ?> </textarea>
                                    </div>
                                    <input type="submit" name="submit" id="submit" class="btn btn-primary mr-2" value="Submit">
                                    <button type="button" class="btn btn-light" id="cancel">Cancel</button>
                                </form>
                                <div id="response"></div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#submit_form').on("submit", function(e) {
                                e.preventDefault();
                                var id = $('#productId');
                                var formData = new FormData(this);
                                //   var img = $('#image').val().split('\\').pop();
                                //   console.log(img);
                                var productname = $('#productname').val();
                                var pdresscription = $('#pdresscription').val();
                                var price = $('#price').val();
                                var category = $('#category').val();
                                // console.log(category);
                                // console.log(productname);
                                var status = $('#status').val();
                                // console.log(status);
                                var sDescription = $('#sDescription').val();
                                var specification = $('specification').val();
                                if (productname == "" || pdresscription == "" || price == "" || sDescription == "" || specification == "") {
                                    $('#response').fadeIn();
                                    $('#response').removeClass('success-msg').addClass('error-msg').html('All fields are Required.');
                                } else {
                                    //$('#response').html($('#submit_form').serialize());
                                    $.ajax({
                                        url: "product-editfunction.php?productId=<?php echo $data['productId'] ?>",
                                        type: "POST",
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            $('#submit_form').trigger("reset");
                                            $('#response').fadeIn();
                                            $('#response').removeClass('error-msg').addClass('success-msg').html(data);
                                            window.location.href = 'product-listing.php';
                                            // setTimeout(() => {
                                            //     $('#response').fadeOut("slow");
                                            // }, 4000);
                                        }
                                    })
                                }
                            })
                            $('#cancel').click(function() {
                                window.location.href = 'product-listing.php';
                            })
                        })
                    </script>



                </div>
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ECOMMERCE 2022</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script>
        var user = sessionStorage.getItem('UserName');

        if (!user) {
            window.location.href = '/ecommerce/admin/pages/samples/login.html';
        }

        $('#user').text("Welcome Back - " + user);
        $('#user1').text(user);

        $('#logout').click(function() {

            sessionStorage.removeItem('UserId');
            sessionStorage.removeItem('UserName');
            sessionStorage.removeItem('ROLE');

        });
    </script>
    <!-- base:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../js/dashboard.js"></script>
    <!-- End custom js for this page-->
</body>

</html>