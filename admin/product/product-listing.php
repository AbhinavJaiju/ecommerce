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
    <link rel="stylesheet" href="paging.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- tablesorter link -->


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
                    <a class="nav-link" href="../orders/orderlisting.php">
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
                    <a class="nav-link" href="../enquiries/enquiries.php">
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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Product</h4>
                                <p class="card-description"> List of Products
                                </p>
                                <div class="table-responsive">

                                    <table class="table table-bordered" id="pager">
                                        <a href="../product/product-form.php">
                                            <button type="button" class="btn btn-outline-primary btn-fw" style="float: right;margin-bottom:6px">Add Product</button>
                                        </a>
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Name </th>
                                                <th> Product Description </th>
                                                <th> Price </th>
                                                <!-- <th> CategoryId </th> -->
                                                <th> Status </th>
                                                <th> Short Description</th>
                                                <th> Specification </th>
                                                <th> Image</th>
                                                <th> </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../config.php';
                                            $sql = "SELECT * from products ORDER BY productId DESC";
                                            // LEFT JOIN productImage on products.productId = productImage.productId 
                                            // UNION 
                                            // SELECT * from products
                                            // RIGHT JOIN productImage on products.productId = productImage.productId ";
                                            $result = $conn->query($sql);

                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['productId'];
                                            ?>
                                                <tr>
                                                    <td> <?php echo $row['productId'] ?> </td>
                                                    <td> <?php echo $row['productName'] ?> </td>
                                                    <td> <?php echo $row['productDescription'] ?></td>
                                                    <td> <?php echo $row['price'] ?> </td>
                                                    <td> <?php echo $row['productStatus'] ?> </td>
                                                    <td> <?php echo $row['shortDescription'] ?> </td>
                                                    <td> <?php echo $row['specification'] ?> </td>
                                                    <td>
                                                        <?php
                                                        $sql1 = "SELECT * FROM productImage  WHERE productId = $id";
                                                        $result1 = $conn->query($sql1);
                                                        while ($row1 = $result1->fetch_assoc()) {

                                                        ?>
                                                            <img src="../../frontend/Front-endview/img/product/<?php echo $row1['fileName'] ?>" alt="">
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form action='product-remove.php?productId="<?php echo $row['productId']; ?>"' method="post">
                                                                <input type="hidden" name="productId" value="<?php echo $row['productId']; ?>">
                                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-icon" onClick="return confirm('Are you Sure?')" name="delete">
                                                                    <i class="bi bi-trash"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                        </svg>
                                                                    </i>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href='product-edit.php?productId=<?php echo $row['productId']; ?>'>
                                                                <input type="hidden" name="productId" value="<?php echo $row['productId']; ?>">
                                                                <button type="submit" class="btn btn-sm btn-primary" name="edit" onClick="return Confirm('Are you Sure?')">
                                                                    <i class="mdi mdi-lead-pencil"></i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- Pagination nav -->
                                    <div id="pageNavPosition" class="pager-nav">
                                    </div>
                                    <!-- pagination nav done-->
                                
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
    <!-- pagination function -->
    <script>
        /* eslint-env browser */
        /* global document */

        function Pager(tableName, itemsPerPage) {
            'use strict';

            this.tableName = tableName;
            this.itemsPerPage = itemsPerPage;
            this.currentPage = 1;
            this.pages = 0;
            this.inited = false;

            this.showRecords = function(from, to) {
                let rows = document.getElementById(tableName).rows;

                // i starts from 1 to skip table header row
                for (let i = 1; i < rows.length; i++) {
                    if (i < from || i > to) {
                        rows[i].style.display = 'none';
                    } else {
                        rows[i].style.display = '';
                    }
                }
            };

            this.showPage = function(pageNumber) {
                if (!this.inited) {
                    // Not initialized
                    return;
                }

                let oldPageAnchor = document.getElementById('pg' + this.currentPage);
                oldPageAnchor.className = 'pg-normal';

                this.currentPage = pageNumber;
                let newPageAnchor = document.getElementById('pg' + this.currentPage);
                newPageAnchor.className = 'pg-selected';

                let from = (pageNumber - 1) * itemsPerPage + 1;
                let to = from + itemsPerPage - 1;
                this.showRecords(from, to);

                let pgNext = document.querySelector('.pg-next'),
                    pgPrev = document.querySelector('.pg-prev');

                if (this.currentPage == this.pages) {
                    pgNext.style.display = 'none';
                } else {
                    pgNext.style.display = '';
                }

                if (this.currentPage === 1) {
                    pgPrev.style.display = 'none';
                } else {
                    pgPrev.style.display = '';
                }
            };

            this.prev = function() {
                if (this.currentPage > 1) {
                    this.showPage(this.currentPage - 1);
                }
            };

            this.next = function() {
                if (this.currentPage < this.pages) {
                    this.showPage(this.currentPage + 1);
                }
            };

            this.init = function() {
                let rows = document.getElementById(tableName).rows;
                let records = (rows.length - 1);

                this.pages = Math.ceil(records / itemsPerPage);
                this.inited = true;
            };

            this.showPageNav = function(pagerName, positionId) {
                if (!this.inited) {
                    // Not initialized
                    return;
                }

                let element = document.getElementById(positionId),
                    pagerHtml = '<span onclick="' + pagerName + '.prev();" class="pg-normal pg-prev">&#171;</span>';

                for (let page = 1; page <= this.pages; page++) {
                    pagerHtml += '<span id="pg' + page + '" class="pg-normal pg-next" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</span>';
                }

                pagerHtml += '<span onclick="' + pagerName + '.next();" class="pg-normal">&#187;</span>';

                element.innerHTML = pagerHtml;
            };
        }



        //
        let pager = new Pager('pager', 5);

        pager.init();
        pager.showPageNav('pager', 'pageNavPosition');
        pager.showPage(1);
    </script>
    <!-- table pagination done-->
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