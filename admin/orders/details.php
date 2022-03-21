<?php include '../config.php'; ?>

<?php
if (isset($_POST["order_id"])) {
    //echo $output = '';
    //echo $_POST["order_id"];

    $view = "SELECT e.orderDetailsId, e.price,e.quantity, s.productName, d.orderId 
         FROM (orderDetails e JOIN products s ON e.productId = s.productId) 
        JOIN orders d ON e.orderId = d.orderId
        WHERE d.orderId={$_POST['order_id']}";
    $vresult = $conn->query($view);






    //$sql = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";
    // $result = $conn->query($sql) or trigger_error($conn->error.”[$sql]”);

echo "<table class='table'>
<thead>
<tr>
<th>Id</th>
<th>Product </th>
<th>Quantity</th>
<th>Price</th>
</tr>
</thead>
<tbody>";
while ($row2 = $vresult->fetch_assoc()) {

echo"  

<tr>
<td>{$row2['orderDetailsId']}</td>
<td>{$row2['productName']}</td>
<td>{$row2['quantity']}</td>
<td>{$row2['price']}</td>
</tr>";


}
echo"</tbody>
</table>";

}
?>