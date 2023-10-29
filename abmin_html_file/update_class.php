<?php
// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");

if(isset($_GET["class_id"])) 
{
    $class_id = $_GET['class_id'];
    $sql1 = "SELECT c.class_id, c.subject, c.class_type, c.AL_year, c.dates, c.start_time, c.end_time, c.class_fee,c.teacher_fee, t.t_user_name,t.teacher_name,td.avaiDate1,td.avaiDate2,td.avaiDate3
            FROM teacher_tb t 
            INNER JOIN class_tb c
            ON c.teacher_uname = t.t_user_name
            INNER JOIN teacher_date_tb td
            ON t.t_user_name = td.teacher_uname
            WHERE c.class_id = '$class_id' ";

    $ret = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($ret);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Update Class Time</title>

    <link rel="stylesheet" href="/newInstitute/abmin_css_file/update_stu.css">
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/formDash.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&family=Josefin+Sans&family=Poppins:wght@200;300;400;500;600;700;800&family=Rubik:wght@300;400;600;700&display=swap');


    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body{
        min-height: 100vh;
        display: flex;
        background: #fff;
    }

    .container{
        top: 60px;
        left: 200px;
        position: relative;
        max-width: 1000px;
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px ;
        background-color: white;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .container header{
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }

    .container header::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: aqua;
    }

    .container form {
        position: relative;
        margin-top: 16px;
        background-color: #fff;
    }

    .container form .form {
        position: absolute;
        background-color: #fff;
    }

    .container form .title {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }

    .container form .fields {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    form .fields .input-field {
        display: flex;
        flex-direction: column;
        margin: 4px 0;
    }

    .input-field label {
        font-size: 12px;
        font-weight: 500;
        color: #2e2e2e;
    }

    .input-field input {
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 35px;
        margin: 8px 0;
    }

    .input-field .select-box{
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 35px;
        margin: 8px 0;
    }

    /*for check box*/

    .input-field .checktime{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 35px;
        max-width: 350px;
        width: 100%;
        border: none;
        outline: none;
        border-radius: 5px;
        margin: 10px 0;
    }

    .checktime .check {
        transform: scale(2);
        margin-right: 10px;
        margin-left: 18px;
    }

    .checktime .chtext{
        font-size: 12px;
    }

    /* for error message

    .input-field .error {
        display: flex;
        align-items: center;
        margin-top: 6px;
        color: var(--error);
        font-size: 13px;
        display: none;
    }

    .error .error-icon {
        margin: 6px;
        font-size: 16px;
    }

    error end*/

    .container form button, .clearBtn {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 35px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }

    .container form button,
    .container form .clearBtn {
        font-size: 14px;
        font-weight: 400;
    }

    form button:hover{
        background-color: rgb(17, 77, 207);
    }

    form .buttons {
        display: flex;
        align-items: center;
    }

    form button i {
        margin: 0 6px;
    }

    form .buttons button , .clearBtn {
        margin-right: 14px;
    }


</style>

</head>
<body>

<!--header start-->

    <div class="header">

        <div class="header-menu">
        <div class="title">New <span>Sipma</span></div>

        <ul>
            <li><a href="/newInstitute/abmin_html_file/veiw_class.php"><i class="fa-solid fa-school"></i></a></li>
        </ul>

        </div>
    </div>
<!--header end-->

<div class="container">
<form name="frmClass" id="frmClass" method="post" action="/newInstitute/admin_php_file/update_clz.php">
            <div class="form first">

                <div class="detail personal">
                    
                    <span class="title">class details</span>

                    <div class="fields">

                        <div class="input-field">
                            <label>Class ID</label>
                            <input type="text" name="clz_id" value="<?php echo $row['class_id']?>" readOnly>
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
                        
                        <div class="input-field">
                            <label>teacher id</label> 
                            <input type="text" value="<?php echo $row['t_user_name']?>" readOnly>   
                        </div>

                        <div class="input-field">
                            <label>teacher Name</label> 
                            <input type="text" value="<?php echo $row['teacher_name']?>" readOnly>   
                        </div>

                        <div class="input-field">
                            <label>Date</label>
                            <select class="select-box" name="avai_date" id="avai_date" required>
                            <option value="<?php echo $row['avaiDate1']?>"><?php echo $row['avaiDate1']?></option>
                            <option value="<?php echo $row['avaiDate2']?>"><?php echo $row['avaiDate2']?></option>
                            <option value="<?php echo $row['avaiDate3']?>"><?php echo $row['avaiDate3']?></option>
                            </select>
                            <div class="error-field">
                                <p id="date_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>start time</label>
                            <input type="time" required id="s_time" name="s_time" value="<?php echo $row['start_time']?>">
                            <div class="error-field">
                                <p id="s_time_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>end time</label>
                            <input type="time" required id="e_time" name="e_time" value="<?php echo $row['end_time']?>">
                            <div class="error-field">
                                <p id="e_time_error"></p>
                            </div>
                        </div>

                        <div class="input-field ">
                            <label>class fees</label>
                            <input type="num" value="<?php echo $row['class_fee']?>" id="class_fee" name="class_fee" require maxlength="4">
                            <div class="error-field">
                                <p id="class_fee_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>teacher fees</label>
                            <input type="num" value="<?php echo $row['teacher_fee']?>" id="teacher_fee" name="teacher_fee" require maxlength="4">
                            <div class="error-field">
                                <p id="teacher_fee_error"></p>
                            </div>
                        </div>

                    </div>

                </div>

                

                <div class="class Detail">
                    
                    <div class="buttons">
                        <button class="submitBtn" onclick="Clz_formValidation()" name ="btnUpdate">
                            <span class="btnText">Update</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                    </div>

                </div>

            </div>

        </form>
</div>
    
</body>
</html>