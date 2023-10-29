

<?php
session_start();

if(isset($_GET["class_id"])) {
   // print_r($_GET);

   $s_un = "";
   // Accept Form Data
   $month = date("M - Y");
   $c_id = $_GET["class_id"];
   $s_un = $_GET["stu_un"];

   // Connect to the Server
   $con = mysqli_connect("localhost", "root", "");
   
   // Select DB
   mysqli_select_db($con, "sipma_db");

   // Perform SQL to get the count for student
   $sql1 = "SELECT * FROM clzstu_atten_tb WHERE class_id= '$c_id' AND stu_uname = '$s_un' AND month = '$month'";
   $ret1 = mysqli_query($con, $sql1);
   $row1 = mysqli_fetch_assoc($ret1);

   if($row1){
       //update table
       
       $countAttend = $row1["atend"] + 1;
       $sql2= "UPDATE clzstu_atten_tb SET atend ='$countAttend' WHERE class_id='$c_id' AND stu_uname = '$s_un' AND month ='$month'";
       $ret2 = mysqli_query($con, $sql2);
   }
   else{
       // insert table
       $sql = "INSERT INTO clzStu_atten_tb(class_id, stu_uname, month, atend) 
               VALUES ('$c_id','$s_un','$month','1')";
       $ret = mysqli_query($con,$sql); 
   }

   if ($ret or $ret2) {
       $_SESSION['status'] = "Attendent Mark";
       header("Location: /newInstitute/abmin_html_file/mark_Attend.php");
       
   } else {
       $_SESSION['status'] = "Error: Somthing went wrong";
       header("Location: /newInstitute/abmin_html_file/mark_Attend.php");
   }
    
}
?>