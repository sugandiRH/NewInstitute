<?php
session_start();

if(isset($_POST["btn_Clz_Save"])) {
    //print_r($_POST);

    // Accept Form Data
    $T_id = $_POST["t_id"];
    $subject = $_POST["subject"];
    $clz_type = $_POST["clz_type"];
    $alyear = $_POST["alyear"];
	$s_time = $_POST["s_time"];
	$e_time = $_POST["e_time"];
	$class_fee = $_POST["class_fee"];
	$teacher_fee = $_POST["teacher_fee"];
    $avai_date = $_POST["avai_date"];

    // Connect to the Server
    $con = mysqli_connect("localhost", "root", "");
    
    // Select DB
    mysqli_select_db($con, "sipma_db");

    // Perform SQL to get the count for student
    $sql1 = "SELECT tbname, num FROM pwcreate_tb WHERE tbname = 'class_tb'";
    $ret1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($ret1);
    $count_Clz = $row1["num"] + 1;

    // Create the user_name for student
	$unClz = $subject . $clz_type . $alYear . '-' . $count_Clz;

    //insert data to parent tb 
    $sql = "INSERT INTO class_tb(class_id, subject, class_type, AL_year, teacher_uname, dates, start_time, end_time, class_fee, teacher_fee) 
            VALUES ('$unClz', '$subject', '$clz_type', '$alyear', '$T_id', '$avai_date', '$s_time', '$e_time', '$class_fee', '$teacher_fee')";
    $ret = mysqli_query($con,$sql); 

    if ($ret) {
    
        // Update the count parent
        $sql4 = "UPDATE pwcreate_tb SET num='$count_Clz' WHERE tbname='class_tb'";
        $ret4 = mysqli_query($con, $sql4);

        $_SESSION['status'] = "Data inserted succseefully";
        header("Location: /newInstitute/abmin_html_file/add_new_clas.php");
        
    } else {
        $_SESSION['status'] = "Error: Somthing went wrong";
        header("Location: /newInstitute/abmin_html_file/add_new_clas.php");
    }
    
}
?>