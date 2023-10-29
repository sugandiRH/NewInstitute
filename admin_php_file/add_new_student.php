<?php

session_start();

if(isset($_POST["btnSave"])) {
    // Accept Form Data
    $stu_name = $_POST["stuname"];
    $stu_nic = $_POST["stunic"];
    $stu_Bday = $_POST["stubday"];
    $stu_address = $_POST["stuaddress"];
	$stu_email = $_POST["stuemail"];
	$stu_conNum = $_POST["stuconnum"];
	$pre_name = $_POST["pname"];
	$pre_conNum = $_POST["pconnum"];
	$pre_relation = $_POST["relationship"];
	$sch_name = $_POST["sclname"];
	$alYear = $_POST["alyear"];
	$subject = $_POST["subject"];

    // Connect to the Server
    $con = mysqli_connect("localhost", "root", "");
    
    // Select DB
    mysqli_select_db($con, "sipma_db");

	//check id
    $sqlid = "SELECT stu_nic FROM student_tb WHERE stu_nic = $stu_nic";
    $retid = mysqli_query($con, $sqlid);
	$rowid = mysqli_fetch_assoc($retid);

	if($rowid){
		$_SESSION['status'] = "id all ready exits";
        header("Location: /newInstitute/admin_html_file/add_new_stu.php");
		exit();
	}

    else{
		// Perform SQL to get the count for student
		$sql1 = "SELECT tbname, num FROM pwcreate_tb WHERE tbname = 'student_tb'";
		$ret1 = mysqli_query($con, $sql1);
		$row1 = mysqli_fetch_assoc($ret1);
		$countStu = $row1["num"] + 1;


		// Perform SQL to get the count for parent
		$sql3 = "SELECT tbname, num FROM pwcreate_tb WHERE tbname = 'parent_tb'";
		$ret3 = mysqli_query($con, $sql3);
		$row3 = mysqli_fetch_assoc($ret3);
		$countPar = $row3["num"] + 1;


		// Create the user_name for student
		$unStu = $subject . $alYear . '-' . $countStu;

		// Create the user_name for parent
		$unPar = 'parent' . $alYear . '-' . $countPar;

		//insert data to parent tb
		$sql6 = "INSERT INTO parent_tb(p_user_name, parent_name, cont_num, relationship)
		VALUES ('$unPar', '$pre_name', '$pre_conNum','$pre_relation')";
		$ret6 = mysqli_query($con,$sql6); 

		//insert data to student tb
		$sql5 = "INSERT INTO student_tb(s_user_name, student_name, stu_nic, email, contact_num, Address, stu_bday, parent_uname, school_name, AL_year, subject) 
				VALUES ('$unStu', '$stu_name','$stu_nic', '$stu_email','$stu_conNum','$stu_address','$stu_Bday','$unPar','$sch_name','$alYear','$subject')";
		$ret5= mysqli_query($con,$sql5);


		if ($ret5) {
    
			// Update the count parent
			$sql4 = "UPDATE pwcreate_tb SET num='$countPar' WHERE tbname='parent_tb'";
			$ret4 = mysqli_query($con, $sql4);

			// Update the count student
			$sql2 = "UPDATE pwcreate_tb SET num='$countStu' WHERE tbname='student_tb'";
			$ret2 = mysqli_query($con, $sql2);

			$_SESSION['status'] = "Data inserted succseefully";
			header("Location: /newInstitute/abmin_html_file/add_new_stu.php");
			
		} else {
			$_SESSION['status'] = "Error: Somthing went wrong";
			header("Location: /newInstitute/abmin_html_file/add_new_stu.php");
		}
    }

}
?>
