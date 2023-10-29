<?php
// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");

if(isset($_GET["t_user_name"])) 
{
    $t_user_name = $_GET['t_user_name'];
    $sql1 = "SELECT t.t_user_name, t.teacher_name,t.subject, t.email, t.contact_num, t.Address, td.avaiDate1, td.avaiDate2, td.avaiDate3
            FROM teacher_tb t
            INNER JOIN teacher_date_tb td
            ON t.t_user_name = td.teacher_uname
            WHERE t.t_user_name = '$t_user_name' ";

    $ret = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($ret);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tearcher</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--link css file-->
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/formDash.css">
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/update_teach.css">

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
            <li><a href="/newInstitute/abmin_html_file/veiw_teacher.php"><i class="fa-solid fa-chalkboard-user"></i></a></li>
        </ul>

        </div>
    </div>
<!--header end-->

    <div class="container">

        <header>Update Information</header>

        <form name="frmTeacher" id="frmTeacher" method="post" action="/newInstitute/admin_php_file/update_teach.php">
            <div class="form">

                <div class="detail personal">
                    
                    <span class="title">Personal details</span>

                    <div class="fields">

                        <div class="input-field ">
                            <label>Teacher ID</label>
                            <input type="text" name="T_id" value="<?php echo $row['t_user_name']?>" readOnly>
                            
                        </div>

                        <div class="input-field ">
                            <label>Full name</label>
                            <input type="text" name="T_Name" value="<?php echo $row['teacher_name']?>" readOnly>
                            
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="T_address" id="T_address" required value="<?php echo $row['Address']?>">
                            <div class="error-field">
                                <p id="T_address_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" value="<?php echo $row['email']?>"  id="T_email" name="T_email" pattern=".*@gmail.com$" required>
                            <div class="error-field">
                                <p id="t_email_error"></p>
                            </div>
                        </div>
                        
                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="tel" value="<?php echo $row['contact_num']?>"  id="T_connum" name="T_connum" maxlength="9" minlength="9" required>
                            <div class="error-field">
                                <p id="T_connum_error"></p>
                            </div>
                        </div>
                        
                        <div class="input-field">
                            <label>Subject</label>
                            <input type="text" value="<?php echo $row['subject']?>" readOnly>
                        </div>

                    </div>

                </div>

                

                <div class="class Detail">
                    
                    <span class="title">class Available Date</span>

                    <div class="fields">
                        
                        <div class="input-field">
                            <label>Available date</label>
                            <select class="select-box" name="T_avai_Day1" id="T_avai_Day1" class="Day1">
                                <option value="<?php echo $row['avaiDate1']?>"><?php echo $row['avaiDate1']?></option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thurday">Thurday</option>
                                <option value="Friday">Friday</option>
                                <option value="Satarday">Satarday</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Available date</label>
                            <select class="select-box" name="T_avai_Day2" id="T_avai_Day2" class="Day2">
                                <option value="<?php echo $row['avaiDate2']?>"><?php echo $row['avaiDate2']?></option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thurday">Thurday</option>
                                <option value="Friday">Friday</option>
                                <option value="Satarday">Satarday</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Available date</label>
                            <select class="select-box" name="T_avai_Day3" id="T_avai_Day3" class="Day3">
                                <option value="<?php echo $row['avaiDate3']?>"><?php echo $row['avaiDate3']?></option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thurday">Thurday</option>
                                <option value="Friday">Friday</option>
                                <option value="Satarday">Satarday</option>
                            </select>
                            <div class="error-field">
                                <p id="t_date_error"></p>
                            </div>
                        </div>
                       
                    </div>

                    <div class="buttons">
                        <button class="submitBtn" onclick="Teacher_formValidation()" name="btnUpdate">
                            <span class="btnText">Update</span>
                            <i class="uil uil-navigator"></i>
                        </button>
    
                        <button class="clearBtn" type="reset">
                            <span class="btnText">clear all</span>
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

    <!--javaScript-->
    <script>

        var count = 0;

        function Teacher_formValidation() {

            var T_Address = document.getElementById('T_address').value;
            var T_email = document.getElementById('T_email').value;
            var T_conNum = document.getElementById('T_connum').value;

            var day1 = document.getElementById("T_avai_Day1").selectedIndex;
            var day2 = document.getElementById("T_avai_Day2").selectedIndex;
            var day3 = document.getElementById("T_avai_Day3").selectedIndex;


            //validate address
            if(T_Address == "")
		    {
			    count=1;
                document.getElementById("T_address_error").innerHTML="Enter address";
		    }
            if( T_Address != "")
		    {
			    document.getElementById("T_address_error").innerHTML="";
		    }

            //validation email
            if(T_email == "")
		    {
			    count=1;
                document.getElementById("t_email_error").innerHTML="Enter email";
		    }
            if( T_email != "")
		    {
			    document.getElementById("t_email_error").innerHTML="";
		    }

            //validate contact number//
            if(T_conNum == "")
		    {
			    document.getElementById("T_connum_error").innerHTML="Enter student contact number";
                count=1;
		    }
            //check is number
            if(isNaN(document.getElementById("T_connum").value) & T_conNum.length != 10)
		    {
                count=1;
			    document.getElementById("T_conNum_error").innerHTML="Invalid value. Check again!";
		    }
            //if all ok
            if(stu_conNum != "" & isNaN(T_conNum)==false & T_conNum.length == 10)
		    {
                document.getElementById("T_conNum_error").innerHTML="";
		    }


            else{
        	    document.getElementById("frmTeacher").submit();
            }

        }

    </script>

</body>
</html>