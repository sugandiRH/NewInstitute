<?php

session_start();

if(isset($_POST["btnUpdate"])) {
    // Accept Form Data
    $clz_id = $_POST["clz_id"];

    $s_time = $_POST["s_time"];
	$e_time = $_POST["e_time"];
	$class_fee = $_POST["class_fee"];
	$teacher_fee = $_POST["teacher_fee"];
    $avai_date = $_POST["avai_date"];


    // Connect to the Server
    $con = mysqli_connect("localhost", "root", "");
    
    // Select DB
    mysqli_select_db($con, "sipma_db");

    //update table
    $sql5 = "UPDATE class_tb SET dates='$avai_date',start_time='$s_time',end_time='$e_time',
                   class_fee='$class_fee',teacher_fee='$teacher_fee' WHERE class_id = '$clz_id' ";
	$ret5= mysqli_query($con,$sql5);

    if ($ret5) {

        $_SESSION['status'] = "Data Updated succseefully";
        header("Location: /newInstitute/abmin_html_file/veiw_class.php");
        
    } else {
        $_SESSION['status'] = "Error: Somthing went wrong";
        header("Location: /newInstitute/abmin_html_file/veiw_class.php");
    }
}