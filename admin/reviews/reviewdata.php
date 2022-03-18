<!DOCTYPE html>
<?php 
$servername = "localhost";
$username = "alfina";
$password = "Alfinamemysql@123";
$dbname = "ecommerce";

/// Create connection
$conn = new mysqli($servername, $username,$password,$dbname);//;
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query ="SELECT rev.review, rev.createdDate,rev.status,cust.customerName,
cust.email,prod.productId,prod.productName
FROM reviews rev
JOIN customers cust ON cust.customerId = rev.customerId
JOIN products prod ON prod.productId = rev.productId";

$result = $conn->query($query);
if ($result!=null){
    echo "no problem here!";
}
else
echo " problem here!"

?>
<head>

</head>
<body>
    
</body>
</html>
