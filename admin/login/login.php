<?php
     include "../config.php";
      $un=$_POST['username'];
      $ps=$_POST['password'];

      // $un="bidhu@gmail.com";
      // $ps="bidhu@123";
      // echo $un.$ps;
      // echo '<br>';
      $sql = "SELECT * FROM users WHERE email='$un' && password=MD5('$ps') ";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // session_start();
            // $_SESSION["UserID"]=$row['rid'];
            // $_SESSION["UserName"]=$row['userName'];
            echo json_encode(array('id'=>$row['userId'],'user'=>$row['userName']));
      }else{
            // echo "Error: " . $sql . "<br>" . $conn->error;
          echo json_encode(array('id'=>0,'user'=>'Incorrect Username or Password'));
      }