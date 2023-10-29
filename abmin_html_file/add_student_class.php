<?php

// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");

if(isset($_GET["s_user_name"])) 
{
    $user_name = $_GET['s_user_name'];
    $sql1 = "SELECT stu.s_user_name, stu.student_name, stu.stu_nic, stu.AL_year, stu.subject
             FROM student_tb stu
             WHERE stu.s_user_name = '$user_name' ";

    $ret = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($ret);

    //get class according subject
    $subject = $row['subject'];
    $sql2 = "SELECT * FROM class_tb WHERE subject ='$subject' ";
    $ret2 = mysqli_query($con, $sql2);
}
?>

<html>

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
        left: 250px;
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

<head>
	<title>Add to Class</title>
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/update_stu.css">  
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/formDash.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>

    <!--header start-->

    <div class="header">

    <div class="header-menu">
    <div class="title">New <span>Sipma</span></div>

    <ul>
        <li><a href="/newInstitute/abmin_html_file/veiw_student.php"><i class="fa-solid fa-graduation-cap"></i></a></li>
    </ul>

    </div>
    </div>
<!--header end-->


    <div class="container">

        <header>Add to class</header>

        <form name="frmClzStu" id="frmClzStu" method="post" action="/newInstitute/admin_php_file/add_stu_clz.php">
            <div class="form first">

                <!--for enter student personal detail-->
                <div class="detail personal">
                    
                    <span class="title">Student details</span>

                    <div class="fields">

                        <div class="input-field ">
                                <label>User ID</label>
                                <input type="text" name= "s_un" value="<?php echo $row['s_user_name']?>" readOnly>
                                
                        </div>

                        <div class="input-field ">
                            <label>Full name</label>
                            <input type="text" value="<?php echo $row['student_name']?>" readOnly>
                            
                        </div>

                        <div class="input-field">
                            <label>NIC number</label>
                            <input type="num" value="<?php echo $row['stu_nic']?>" readOnly>
                            
                        </div>

                        <div class="input-field">
                            <label>A/L year</label>
                            <input type="num" value="<?php echo $row['AL_year']?>" readOnly>
                            
                        </div>

                        <div class="input-field">
                            <label>Subject</label>
                            <input type="text"  value="<?php echo $row['subject']?>" readOnly>
                            
                        </div>

                        <div class="input-field">
                            <label>Class</label>
                            <select class="select-box" name="class_id" id="class_id" required>
                                <option value="">Select Class</option>
                                <?php 
                                while($row2 = mysqli_fetch_assoc($ret2)) {
                                    echo '<option value="' . $row2['class_id'] . '">';
                                    echo $row2['subject'] . '       - ' . $row2['AL_year'].'       - ' . $row2['class_type'];
                                    echo '</option>';
                                }
                            ?>
                            </select>
                            <div class="error-field">
                                <p id="date_error"></p>
                            </div>
                        </div>

                    </div>
                    <div class="buttons">
                        <button class="submitBtn" onclick="formValidation()" name ="btnADD">
                            <span class="btnText">ADD</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>
</form>
</body>

<!--javaScript-->
<script>

function formValidation() {

    

    else{
        document.getElementById("frmClzStu").submit();
    }

}
</html>