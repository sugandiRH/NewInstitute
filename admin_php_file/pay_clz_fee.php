

<?php
session_start();

if(isset($_POST["btnUpdate"])) {
    print_r($_POST);

   $s_un = "";
   // Accept Form Data
   $month = date("M - Y");
   $c_id = $_POST["class_id"];
   $s_un = $_POST["stu_un"];

   // Connect to the Server
   $con = mysqli_connect("localhost", "root", "");
   
   // Select DB
   mysqli_select_db($con, "sipma_db");

   // Perform SQL to get the count for student
   $sql1 = "SELECT * FROM clzstu_atten_tb WHERE class_id= '$c_id' AND stu_uname = '$s_un' AND month = '$month'";
   $ret1 = mysqli_query($con, $sql1);
   $row1 = mysqli_fetch_assoc($ret1);
   $fees = $row1["clz_fee"];

   if($fees=="not Paid"){
       //update table
       $sql2= "UPDATE clzstu_atten_tb SET  clz_fee='paid' WHERE class_id='$c_id' AND stu_uname = '$s_un' AND month ='$month'";
       $ret2 = mysqli_query($con, $sql2);
   }


   if ($ret2) {
    $_SESSION['status'] = "Paid mark";
    header("Location: /newInstitute/abmin_html_file/mark_Attend.php");
    
    } else {
        $_SESSION['status'] = "Already paid";
        header("Location: /newInstitute/abmin_html_file/mark_Attend.php");
    }
    
}
?>