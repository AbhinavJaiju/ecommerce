<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ECOMMERECE ADMIN</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <?php

    include "config.php";
    $sql1 = "SELECT COUNT(customerId) as custcount FROM customers";
    $sql2 = "SELECT COUNT(orderId) as ordercount FROM orders";
    $sql3 = "SELECT COUNT(userId) as usercount FROM users";

    $result1 = $conn->query($sql1);
    while($row1 = $result1->fetch_assoc()) {
      $cc = $row1['custcount'];
    }

    $result2 = $conn->query($sql2);
    while($row2 = $result2->fetch_assoc()) {
      $cc1 = $row2['ordercount'];
    }

    $result3 = $conn->query($sql3);
    while($row3 = $result3->fetch_assoc()) {
      $cc3 = $row3['usercount'];
    }

    

  ?>
  

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
          <a class="nav-link" href="index.php">
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
              <li class="nav-item"> <a class="nav-link" href="user/user-listing.php">USERS</a></li>
              <li class="nav-item"> <a class="nav-link" href="customer/customer-listing.php">CUSTOMERS</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/forms/basic_elements.html">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">ORDERS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product/category.php">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">CATEGORIES</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/tables/basic-table.html">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">PRODUCTS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
            <i class="mdi mdi-popcorn menu-icon"></i>
            <span class="menu-title">BANNERS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">REVIEWS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">ENQUIRES</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
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
            <a class="navbar-brand brand-logo" href="index.php"></a>
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
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
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <!-- <img src="images/faces/face5.jpg" alt="profile"/> -->
                <span class="nav-profile-name" id="user1">Bidhu M Renchi</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                
                <a class="dropdown-item" href="../admin/pages/samples/login.html" id="logout">
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
         
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-account-multiple-plus text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h5 class="text-white font-weight-bold"><?php echo $cc." Global Customers"; ?>  </h5>
                      <p class="mt-2 text-white card-text">You numbers are growing</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-google d-flex align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-arrow-up-bold-hexagon-outline text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h5 class="text-white font-weight-bold"><?php echo $cc1." Orders"; ?></h5>
                      <p class="mt-2 text-white card-text">You numbers are growing</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-twitter d-flex align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-blackberry text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h5 class="text-white font-weight-bold"><?php echo $cc3." Users"; ?></h5>
                      <p class="mt-2 text-white card-text">Our family is getting bigger</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- row end -->

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recent Customers Who Joined Our Family</h4>
                  <p class="card-description"> Customers
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      
                      <thead>
                        <tr>
                          <th> Id </th>
                          <th> Name </th>
                          <th> Gender </th>
                          <th> Address </th>
                          <th> Email </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql4 = "SELECT * FROM customers ORDER BY customerId DESC";
                        $result4 = $conn->query($sql4);

                        while ($row4 = $result4->fetch_assoc()) {

                        ?>
                          <tr>
                            <td> <?php echo $row4['customerId'] ?> </td>
                            <td> <?php echo $row4['customerName'] ?> </td>
                            <td> <?php echo $row4['gender'] ?> </td>
                            <td> <?php echo $row4['address'] ?> </td>
                            <td> <?php echo $row4['email'] ?> </td>
                            
                          </tr>
                        <?php
                        $conn->close();
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

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

    if(!user){
      window.location.href='/ecommerce/admin/pages/samples/login.html';
    }

    $('#user').text("Welcome Back - "+user);
    $('#user1').text(user);

    $('#logout').click(function(){
                
                            sessionStorage.removeItem('UserId');
                            sessionStorage.removeItem('UserName');
                            sessionStorage.removeItem('ROLE');
                        
            });

  </script>
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>