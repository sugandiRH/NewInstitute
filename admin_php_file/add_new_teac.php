<?php

session_start();

if(isset($_POST["t_savebtn"])) {
    // Accept Form Data
    $T_name = $_POST["T_Name"];
    $T_nic = $_POST["T_nic"];
    $T_address = $_POST["T_address"];
	$T_email = $_POST["T_email"];
	$T_conNum = $_POST["T_connum"];
    $T_subject = $_POST["T_subject"];

	$T_avai_day1 = $_POST["T_avai_Day1"];
	$T_avai_day2 = $_POST["T_avai_Day2"];
	$T_avai_day3 = $_POST["T_avai_Day3"];

    //$day1_time = $_POST["day1_time"];
    //$day2_time = $_POST["day2_time"];
    //$day3_time = $_POST["day3_time"];


    //print_r($_POST);
    // Connect to the Server
    $con = mysqli_connect("localhost", "root", "");
    
    // Select DB
    mysqli_select_db($con, "sipma_db");

	//check id
    $sqlid = "SELECT * FROM teacher_tb WHERE email = '$T_email'";
    $retid = mysqli_query($con, $sqlid);
	$rowid = mysqli_fetch_assoc($retid);

	if($rowid){
		$_SESSION['status'] = "emai ready exits";
        header("Location: /newInstitute/admin_html_file/add_new_stu.php");
		exit();
	}

    else{
		// Perform SQL to get the count for teacher
		$sql1 = "SELECT tbname, num FROM pwcreate_tb WHERE tbname = 'teacher_tb'";
		$ret1 = mysqli_query($con, $sql1);
		$row1 = mysqli_fetch_assoc($ret1);
		$countTeach = $row1["num"] + 1;

        // Create the user_name for teacher
		$unTeach = 'teach-' . $T_subject . '-' . $countTeach;

		//insert data to teacher_tb
		$sql2 = "INSERT INTO teacher_tb(t_user_name, teacher_name, subject, email, contact_num, Address)
		         VALUES ('$unTeach', '$T_name', '$T_subject', '$T_email', '$T_conNum', '$T_address')";
		$ret2 = mysqli_query($con,$sql2); 

		//insert data to teacher_date_tb
		$sql3 = "INSERT INTO teacher_date_tb(teacher_uname, avaiDate1, avaiDate2, avaiDate3)
		         VALUES ('$unTeach', '$T_avai_day1', '$T_avai_day2', '$T_avai_day3')";
		$ret3 = mysqli_query($con,$sql3); 


		if ($ret2) {

			// Update the count Teacher
			$sql4 = "UPDATE pwcreate_tb SET num='$countTeach' WHERE tbname='teacher_tb'";
			$ret4 = mysqli_query($con, $sql4);

			$_SESSION['status'] = "Data inserted succseefully";
			header("Location: /newInstitute/abmin_html_file/add_new_teacher.php");
			
		} 
        else {
			$_SESSION['status'] = "Error: Somthing went wrong";
			header("Location: /newInstitute/abmin_html_file/add_new_teacher.php");
		}
    }
}

?>