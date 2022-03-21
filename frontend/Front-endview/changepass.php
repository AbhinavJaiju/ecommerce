<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="pass.js"></script> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
  .btn{
        color: white;
      background-color: #ca1515;
      border: #ca1515 solid 1px;  
      }

      .container{
        height:100px;
        width:1600px;
      }
  </style>
</head>
<?php
      include 'config.php';
      session_start();
     
      if (isset($_POST['re_password']))
          {
            
          $old_pass = $_POST['old_pass'];
          $new_pass = $_POST['new_pass'];
          $re_pass = $_POST['re_pass'];
          $sql_query= "select * from customers where customerId=".$_SESSION["id"];
          $result = mysqli_query($conn,$sql_query);
          $row = mysqli_fetch_array($result);
          $database_password = $row['passwords'];
          if ($database_password == $old_pass)
              {
              if ($new_pass == $re_pass)
                  {
                  $sql_query1="update customers set passwords='$new_pass' where customerId=".$_SESSION["id"];
                  //echo $sql_query1;
                  if ($conn->query($sql_query1) === TRUE) {
                  echo "<script>alert('Update Sucessfully'); window.location='myaccount.php'</script>";
                  }
                  else{
                    echo "error";
                  }
                  }
                else
                  {
                  echo "<script>alert('Your new and Retype Password is not match'); window.location='changepass.php'</script>";
                  }
              }
            else
              {
              echo "<script>alert('Your old password is wrong'); window.location='changepass.php'</script>";
              }
          }
       
      
?>
<body>

<div class="container">
<div class="row">
<div class="col-sm-12">
<h1 style="text-aign:center;margin-left:40%;margin-top:16%;margin-bottom:1%;color:#ca1515">Change Password</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<div class="card h-100" style="height:720px;margin-right:2%;margin-left:2%">
<div class="card-body"style="height:270px; ">
<form method="post" id="passwordForm" action="changepass.php">
<label style="margin-top:2%;font-size:14px;">Old Password</label>
<input type="password" class="input-lg form-control" name="old_pass" id="password" placeholder="Old Password" autocomplete="off"><br>
<label style="font-size:14px;">New Password</label>
<input type="password" class="input-lg form-control" name="new_pass" id="password1" placeholder="New Password" autocomplete="off"><br>
<label style="font-size:14px;">Re-Type New Password</label>
<input type="password" class="input-lg form-control" name="re_pass" id="password2" placeholder="Confirm Password" autocomplete="off"><br>
<input type="submit" name="re_password" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
</form>
</div>
</div>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
</body>
</html>