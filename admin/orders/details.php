<?php include 'config-anj.php'; ?>
<?php  
 if(isset($_POST["employee_id"]))  
 {  
echo $output = '';
echo $_POST["employee_id"];

$view = "SELECT e.orderDetailsId, e.price,e.quantity, s.productName, d.orderId 
         FROM (orderDetails e JOIN products s ON e.productId = s.productId) 
        JOIN orders d ON e.orderId = d.orderId
        WHERE d.orderId={$_POST['employee_id']}";
        $vresult = $conn->query($view);
        $row2 = $vresult->fetch_assoc();

        //echo $view['']


//$sql = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";
// $result = $conn->query($sql) or trigger_error($conn->error.”[$sql]”);
 }
 
?>
<div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Orders</h4>
                                    <!-- <p class="card-description">
                    
                  </p> -->
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>orderId</th>
                                                    <th>Customer Name</th>
                                                    <th>Order Date</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>xxx</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                // $sql = "SELECT orders.orderId, customers.customerName, orders.orderdate,orders.totalprice,orders.orderStatus
                                                //     FROM orders
                                                //     INNER JOIN customers ON orders.customerId=customers.customerId
                                                //     ORDER BY orders.orderId DESC;";
                                                // $result = $conn->query($sql);

                                                while ($row2 = $result->fetch_assoc()) {
                                                    $id = $row2["orderId"];
                                                    echo "
                                                <tr>
                                                <td scope='col'>{$row["orderId"]}</td>
                                                <td scope='col'>{$row["customerName"]}</td>
                                                <td scope='col'>{$row["orderdate"]}</td>
                                                <td scope='col'>{$row["totalprice"]}</td>
                                                <td scope='col'>";
                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                      