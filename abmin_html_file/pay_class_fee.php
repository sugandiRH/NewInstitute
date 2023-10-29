<?php
// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");

if(isset($_GET["class_id"])) 
{
    $class_id = $_GET['class_id'];
    $s_un = $_GET['stu_un'];

    $sql1 = "SELECT cs.class_id, c.subject, c.class_type, c.AL_year, c.class_fee, cs.stu_uname, s.student_name,s.email
            FROM class_stu_tb cs
            INNER JOIN class_tb c
            ON cs.class_id = c.class_id
            INNER JOIN student_tb s
            ON cs.stu_uname = s.s_user_name
            WHERE cs.class_id = '$class_id' AND cs.stu_uname = '$s_un'";

    $ret = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($ret);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay to Class</title>

    <link rel="stylesheet" href="/newInstitute/abmin_css_file/main.css">
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/update_stu.css">

</head>
<body>

<div class="container">
<form name="frmClass" id="frmClass" method="post" action="/newInstitute/admin_php_file/pay_clz_fee.php">
            <div class="form first">

                <div class="detail personal">
                    
                    <span class="title">class details</span>

                    <div class="fields">

                        <div class="input-field">
                            <label>Student id</label> 
                            <input type="text" value="<?php echo $row['stu_uname']?>" readOnly name="stu_un">   
                        </div>

                        <div class="input-field">
                            <label>student Name</label> 
                            <input type="text" value="<?php echo $row['student_name']?>" readOnly>   
                        </div>

                        <div class="input-field">
                            <label>Email</label> 
                            <input type="text" value="<?php echo $row['email']?>" readOnly>   
                        </div>

                        <div class="input-field">
                            <label>Class ID</label>
                            <input type="text" name="class_id" value="<?php echo $row['class_id']?>" readOnly>
                        </div>

                        <div class="input-field">
                            <label>Subject</label>
                            <input type="text" value="<?php echo $row['subject']?>" readOnly>
                        </div>

                        <div class="input-field">
                            <label> Class type</label>
                            <input type="text" value="<?php echo $row['class_type']?>" readOnly>
                        </div>

                        <div class="input-field">
                            <label>A/L year</label>
                            <input type="num" value="<?php echo $row['AL_year']?>" readOnly>
                        </div>

                        <div class="input-field ">
                            <label>class fees</label>
                            <input type="num" value="<?php echo $row['class_fee']?>" readOnly>
                        </div>

                    </div>

                </div>

                

                <div class="class Detail">
                    
                    <div class="buttons">
                        <button class="submitBtn"  name ="btnUpdate">
                            <span class="btnText">Pay</span>
                        </button>

                    </div>

                </div>

            </div>

        </form>
</div>
    
</body>
</html>