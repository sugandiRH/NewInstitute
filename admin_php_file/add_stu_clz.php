<?php

session_start();

if(isset($_POST["btnADD"])){
    // Accept Form Data
    $s_un = $_POST["s_un"];
    $c_id = $_POST["class_id"];

     // Connect to the Server
     $con = mysqli_connect("localhost", "root", "");
    
     // Select DB
     mysqli_select_db($con, "sipma_db");

     //insert data to teacher_tb
		$sql = "INSERT INTO class_stu_tb(class_id, stu_uname) VALUES ('$c_id','$s_un')";
        $ret = mysqli_query($con,$sql); 

        if ($ret) {
			$_SESSION['status'] = "Data inserted succseefully";
			header("Location: /newInstitute/abmin_html_file/veiw_student.php");
			
		} 
        else {
			$_SESSION['status'] = "Error: Somthing went wrong";
			header("Location: /newInstitute/abmin_html_file/veiw_student.php");
		}

}
?>