
<?php

session_start();

if(isset($_POST["btnUpdate"])) {
    // Accept Form Data
    $t_un = $_POST["T_id"];

    $T_address = $_POST["T_address"];
	$T_email = $_POST["T_email"];
	$T_connum = $_POST["T_connum"];

	$T_avai_Day1 = $_POST["T_avai_Day1"];
    $T_avai_Day2 = $_POST["T_avai_Day2"];
    $T_avai_Day3 = $_POST["T_avai_Day3"];

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

    //update teacher_avai date
    $sql = "UPDATE teacher_date_tb SET avaiDate1='$T_avai_Day1', avaiDate2 ='$T_avai_Day2', avaiDate3 ='$T_avai_Day3'
             WHERE teacher_uname = '$t_un' ";
	$ret= mysqli_query($con,$sql);

    //update teacher table
    $sql1 = "UPDATE teacher_tb SET email='$T_email',contact_num='$T_connum',Address='$T_address'
             WHERE t_user_name ='$t_un' ";
    $ret1 = mysqli_query($con,$sql1);

    if ($ret1 & $ret) {

        $_SESSION['status'] = "Data Updated succseefully";
        header("Location: /newInstitute/abmin_html_file/veiw_teacher.php");
        
    } else {
        $_SESSION['status'] = "Error: Somthing went wrong";
        header("Location: /newInstitute/abmin_html_file/veiw_teacher.php");
    }
}