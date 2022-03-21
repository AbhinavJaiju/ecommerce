<?php include '../config.php'; ?>

<?php
if (isset($_POST["enquiry_id"])) {
    $output = $_POST["enquiry_id"];
    //echo $output;

    $view = "SELECT message FROM enquiries
        WHERE enquiryId={$_POST['enquiry_id']}";
    $vresult = $conn->query($view);
    $row2 = $vresult->fetch_assoc();
    echo $row2['message'];
   
}
?>

