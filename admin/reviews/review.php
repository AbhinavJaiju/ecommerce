<!DOCTYPE html>
<html lang="en">

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
              <li class="nav-item"> <a class="nav-link" href="../user/user-listing.php">USERS</a></li>
              <li class="nav-item"> <a class="nav-link" href="../customer/customer-listing.php">CUSTOMERS</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/forms/basic_elements.html">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">ORDERS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../product/category.php">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">CATEGORIES</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../product/product-listing.php">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">PRODUCTS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../banner/banner.php">
            <i class="mdi mdi-popcorn menu-icon"></i>
            <span class="menu-title">BANNERS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../reviews/review.php">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">REVIEWS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">ENQUIRES</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../aboutus/about.php">
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



          <!-- body -->

          <?php
          include "../config.php";

          ?>
          <div class="col-lg-12 grid-margin mt-5 stretch-card">
            <div class="card">
              <div class="card-body">
                <!-- <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href = 'add.php';" style="float: right;">Add a new Review</button> -->
                <h4 class="card-title">Manage Reviews</h4>
                <p class="card-description"> Review Request

                </p>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Product</th>
                        <th>Posted at</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $query = "SELECT rev.review, rev.createdDate,rev.status,cust.customerName,
                      cust.email,prod.productId,prod.productName,cust.customerId
                      FROM reviews rev
                      JOIN customers cust ON cust.customerId = rev.customerId
                      JOIN products prod ON prod.productId = rev.productId LIMIT 10";

                      $result = $conn->query($query);

                      while ($row = mysqli_fetch_array($result)) {

                      ?>
                        <tr>
                          <?php $id = $row['productId']; ?>
                          <td><?php echo $row['customerName']; ?></td>
                          <td><?php echo $row['productName'] ?? ''; ?></td>
                          <td><?php echo $row['createdDate'] ?? ''; ?></td>
                          <td><?php echo $row['status'] ?? ''; ?></td>
                          <td><?php echo "<a type='button' class='btn btn-icon btn-lg' href='reviewdata.php?id=$row[customerId]'>" ?><i class="mdi mdi-eye"></i></td>
                          <!-- <td><button type="button" class="btn btn-primary btn-rounded btn-icon" onClick="document.location.href='reviewdata.php'" > -->
                          <!-- <i class=" mdi mdi-eye "></i>
                      </button></td> -->
                        </tr>

                        <tr>
                          <td colspan="8">
                          </td>
                        <tr>
                        <?php
                      }
                      $conn->close(); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



          <!-- body ends -->




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