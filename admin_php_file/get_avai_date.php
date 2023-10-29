<?php
// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");

if(isset($_GET['id'])){
    $tid = mysqli_real_escape_string($con,($_GET['id']));
    //get data from teacher_tb
    $sql = "SELECT * FROM t_datetime WHERE t_id='$tid'" ;
    $ret = mysqli_query($con, $sql);
    $dlist = "";
    while($row = mysqli_fetch_assoc($ret)){
        $dlist .= "<option value=\"{$row['date']}\">{$row['date']}</option>";
    }
    echo $dlist; 
}
else{
    echo "<option>error</option>";
}
?>