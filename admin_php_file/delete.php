<?php
session_start();

// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");


//deletw student
if(isset($_GET["s_user_name"])) {
    $user_name = $_GET['s_user_name'];
    $sql1 = "DELETE FROM student_tb WHERE s_user_name = '$user_name' ";

    $ret = mysqli_query($con, $sql1);

    if ($ret) {

        $_SESSION['status'] = "Data Delete succseefully";
        header("Location: /newInstitute/abmin_html_file/veiw_student.php");
        
    } else {
        $_SESSION['status'] = "Error: Somthing went wrong";
        header("Location: /newInstitute/abmin_html_file/veiw_student.php");
    }
}

//delete teacher
if(isset($_GET["t_user_name"])) {
    $user_name = $_GET['t_user_name'];

    $sql = "DELETE FROM teacher_date_tb WHERE teacher_uname = '$user_name' ";
    $ret = mysqli_query($con, $sql);

    $sql1 = "DELETE FROM teacher_tb WHERE t_user_name = '$user_name' ";
    $ret1 = mysqli_query($con, $sql1);

    if ($ret & $ret1) {

        $_SESSION['status'] = "Data Delete succseefully";
        header("Location: /newInstitute/abmin_html_file/veiw_teacher.php");
        
    } else {
        $_SESSION['status'] = "Error: Somthing went wrong";
        header("Location: /newInstitute/abmin_html_file/veiw_teacher.php");
    }
}



//delete class

if(isset($_GET["class_id"])) {
    $class_id = $_GET['class_id'];

    $sql = "DELETE FROM class_tb WHERE class_id = '$class_id' ";
    $ret = mysqli_query($con, $sql);

    if ($ret & $ret1) {

        $_SESSION['status'] = "Data Delete succseefully";
        header("Location: /newInstitute/abmin_html_file/veiw_teacher.php");
        
    } else {
        $_SESSION['status'] = "Error: Somthing went wrong";
        header("Location: /newInstitute/abmin_html_file/veiw_teacher.php");
    }
}
