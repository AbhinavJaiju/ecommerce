<?php
      // $servername = "localhost";
      // $username = "aaa";
      // $password = "Bidhu@123";
      // $dbname = "ecommerce";

      // // Create connection
      // $conn = new mysqli($servername, $username, $password, $dbname);
      // // Check connection
      // if ($conn->connect_error) {
      //   die("Connection failed: " . $conn->connect_error);
      // }
      $servername = "localhost";
   $username = "abhinav.jaiju";
   $password = "experion@123";
   $dbname = "ecommerce";

   //create connection
   $conn = new mysqli($servername,$username,$password, $dbname);

   //check connection
   if($conn -> connect_error){
       die("Connection Failed:" . $conn->connect_error);
   }

      $un=$_POST['username'];
      $ps=$_POST['password'];

      // $un="bidhu@gmail.com";
      // $ps="bidhu@123";
      // echo $un.$ps;
      // echo '<br>';
      $sql = "SELECT * FROM users WHERE email='$un' && passwords=MD5('$ps') ";

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