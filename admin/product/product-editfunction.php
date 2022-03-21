<?php
    //db connection
    include_once '../config.php';
    $id = $_GET['productId'];
    $name = $_POST['productname'];
    $pdescription = $_POST['pdescription'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $sDescription = $_POST['sDescription'];
    $specification = $_POST['specification'];
    //inserting data into products table
    $sql1 = "UPDATE products SET productName = '{$name}', productDescription = '{$pdescription}', price = '{$price}' , categoryId = '{$category}' ,productStatus = '{$status}', shortDescription = '{$sDescription}', specification = '{$specification}'
                WHERE productId = $id ";

     if($conn->query($sql1)===TRUE){
        echo "Hello {$name}, your record is updated.";
        //getting Id of last inserted row
        
    }else{
        echo $conn->error; 
    }
    $error = array();
    $extension = array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
        $file_name = $_FILES["files"]["name"][$key];
        $file_tmp = $_FILES["files"]["tmp_name"][$key];
        $ext = pathinfo($file_name,PATHINFO_EXTENSION);

        if(in_array($ext,$extension)){
            if(!file_exists("../../frontend/Front-endview/img/shop/".$file_name)){
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../frontend/Front-endview/img/shop/".$file_name); 
                $sql = "UPDATE productImage SET fileName = '{$file_name}' WHERE productId = $id";
                if($conn->query($sql)===TRUE){
                    echo "Image uploaded into database";
                }else{
                    echo "Error : ".$sql . "</br>" . $conn->error;
                }
            }
            else{
                $filename = basename($file_name,$ext);
                $newFileName = $filename.time().".".$ext;
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../frontend/Front-endview/img/shop/".$file_name);
                $sql2 = "UPDATE productImage SET fileName = '{$file_name}' WHERE productId = $id";
                if($conn->query($sql2)===TRUE){
                    echo "Image uploaded into database";
                }else{
                    echo "Error : ".$sql2 . "</br>" . $conn->error;
                }
            }
        }
        else{
            array_push($error,"$file_name, ");
        }
    }
        
    $conn->close();

?>
