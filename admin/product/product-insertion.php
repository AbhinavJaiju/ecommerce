<?php
    //db connection
    include_once 'config.php';

    $name = $_POST['productname'];
    $pdescription = $_POST['pdescription'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $sDescription = $_POST['sDescription'];
    $specification = $_POST['specification'];
    //inserting data into products table
    $sql1 = "INSERT INTO products(productName,productDescription,price,categoryId,productStatus,shortDescription,specification)
            VALUES('$name','$pdescription',$price,'$category','$status','$sDescription','$specification')";

     if($conn->query($sql1)===TRUE){
        echo "Hello {$name}, your record is saved.";
        //getting Id of last inserted row
        $last_id = $conn->insert_id;
        
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
            if(!file_exists("productimage/".$file_name)){
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../productImages/".$file_name); 
                $sql = "INSERT INTO productImage(fileName,productId) VALUES('$file_tmp',$last_id)";
                if($conn->query($sql)===TRUE){
                    echo "Image uploaded into database";
                }else{
                    echo "Error : ".$sql . "</br>" . $conn->error;
                }
            }
            else{
                $filename = basename($file_name,$ext);
                $newFileName = $filename.time().".".$ext;
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"productimage/".$newFileName);
                $sql2 = "INSERT INTO productImage(fileName,productId) VALUES('$file_tmp',$last_id)";
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
