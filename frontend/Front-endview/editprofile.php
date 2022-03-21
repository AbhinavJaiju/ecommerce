<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
  body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

</style>
</head>

<body>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12" >
<div class="card h-100" style="height:300px;margin-right:2%;margin-left:2%;margin-top:32%">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img style="margin-top:15%;"
					src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
				<h5 class="user-name"><?php
        session_start();
                      echo $_SESSION['uname'];?></h5>
				<a>Change profile</a>
			</div>
			
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<form action="editprofile.php" method="post">
<?php
include "config.php";
session_start();

if(isset($_POST['submit'])){
  $sql_query= "Update customers set customerName='".$_POST["uname"]."', email='".$_POST["eMail"]."', phoneNumber='".$_POST["phone"]."', address='".$_POST["Address"]."' where customerId=".$_SESSION["id"];
  //echo $sql_query;
  $result=$conn->query($sql_query);
  //echo $result;
 
  if ( $result=== TRUE) {
    

     $_SESSION['uname']=$_POST['uname'];
     $conn->close(); 
    header("Location:http://localhost/ecommerce/frontend/Front-endview/myaccount.php");
} else {
  echo "Error : " . $conn->error;
}
   
        

    }
    else{
      include 'config.php';
      $sql_query= "select * from customers where customerId=".$_GET["id"];
       
        //echo $sql_query;
        $result = $conn->query($sql_query);
        if ($result->num_rows > 0) {
          $row;
          while($row = $result->fetch_assoc()) {
            
              echo '<div class="card-body" style="margin-top:10%;margin-right:3%;margin-left:3%">
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h6 class="mb-2 text-primary" style="font-weight:15px;font-size:20px;">Personal Details</h6>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                 
                   
                  <div class="form-group">
                  <input type="text" class="form-control" name="id"style="display:none">
                    <label for="fullName">Customer Name</label>
                    <input type="text" class="form-control" value="'.$row["customerName"].'" name="uname" placeholder="Enter full name">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="eMail">Email</label>
                    <input type="email" class="form-control" name="eMail" value="'.$row["email"].'" placeholder="Enter email ID">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="'.$row["phoneNumber"].'" placeholder="Enter phone number">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="name" class="form-control" name="Address"value="'.$row["address"].'" placeholder="Enter Address">
                  </div>
                </div>
              </div>
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <label for="gender" style="margin-right: 15%;">Gender: </label><br>
                      <input type="radio" name="gender" id="male" ';if($row["gender"]=="Male")echo'checked'; echo' value="Male">Male
                      <input type="radio" name="gender" id="female" ';if($row["gender"]=="Female")echo'checked'; echo' value="Female"style="margin-left:1%;" >Female
                      <input type="radio" name="gender" id="other" ';if($row["gender"]=="Other")echo'checked'; echo' value="Other"style="margin-left:1%;">Other <br><br>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">
                    <button style="margin-right:2%;margin-bottom:2%;" type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              
            </div>';
        
          }
          $conn->close();
          //echo "Record deleted successfully";
        } else {
          
          echo "Error deleting record: " . $conn->error;
        }
        echo $row[0];
        $count=count($row);
       //echo $count;
     
    }
   


?>
	
</form>
</div>
</div>
</div>
</div>
</body>
</html>