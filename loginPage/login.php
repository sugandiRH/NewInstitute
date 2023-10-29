<?php

if(isset($_POST["loginbtn"])) {
    $uname = $_POST["userName"];
    $pw = $_POST["password"];

    if($uname == "admin" && $pw == "admin1234")
    {
        header("Location: /newInstitute/sideMenu/dash.html");
    }

    else{
       //Connect to the Server
        $con = mysqli_connect("localhost:3306","sugandi","s1234");
        //Select DB
        mysqli_select_db($con, "sipmadb");

        $sql = "select * from student_tb where user_name = '$uname' && password = '$pw' ";
        $ret = mysqli_query($con,$sql);

        if($ret){
            header("Location: /newInstitute/dashboard/dashboard.html");
        }
    }   
}


?>