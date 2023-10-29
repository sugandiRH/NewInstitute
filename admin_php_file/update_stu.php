<?php

session_start();

if(isset($_POST["btnUpdate"])) {
    // Accept Form Data
    $s_un = $_POST["s_un"];
    $p_un = $_POST["p_un"];

    $stu_address = $_POST["stuaddress"];
	$stu_email = $_POST["stuemail"];
	$stu_conNum = $_POST["stuconnum"];
	$pre_name = $_POST["pname"];
	$pre_conNum = $_POST["pconnum"];
	$pre_relation = $_POST["relationship"];
	$alYear = $_POST["alyear"];
	$subject = $_POST["subject"];

// validate email
    if($stu_email!="noEmail"){
        if (!filter_var($stu_email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['status'] = "Email format is wrong";
            header("Location: /newInstitute/abmin_html_file/veiw_student.php");
    }
    }

    // Connect to the Server
    $con = mysqli_connect("localhost", "root", "");
    
    // Select DB
    mysqli_select_db($con, "sipma_db");

    //update table
    $sql5 = "UPDATE student_tb SET email='$stu_email' , contact_num='$stu_conNum' , Address='$stu_address' , 
            AL_year='$alYear',`subject`='$subject' WHERE s_user_name='$s_un' ";
	$ret5= mysqli_query($con,$sql5);

    if ($ret5) {

        $_SESSION['status'] = "Data Updated succseefully";
        header("Location: /newInstitute/abmin_html_file/veiw_student.php");
        
    } else {
        $_SESSION['status'] = "Error: Somthing went wrong";
        header("Location: /newInstitute/abmin_html_file/veiw_student.php");
    }
}