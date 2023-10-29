<?php
session_start();

// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");

//get data from teacher_tb
$sql = "SELECT * FROM teacher_tb";
$ret = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New class</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--link boostrap for alert box-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--link css file-->
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/main.css">
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/add_new_class.css">
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/formDash.css">
    
    <!--inconscout css-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
        left: 40px;
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
        <li><a href="/newInstitute/sideMenu/dash.html"><i class="fas fa-desktop"></i></a></li>
    </ul>

    </div>
    </div>
<!--header end-->
    <div class="container">
        <?php
            if (isset($_SESSION['status'])) {

                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong><?php echo $_SESSION['status']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php 
                unset($_SESSION['status']);
            }
        ?>


        <header>New class</header>

        <form name="frmClass" id="frmClass" method="post" action="/newInstitute/admin_php_file/add_new_class.php">
            <div class="form first">

                <div class="detail personal">
                    
                    <span class="title">class details</span>

                    <div class="fields">
                        
                        <div class="input-field">
                            <label>teacher id</label>
                            <select class="select-box" name="t_id" id="t_id" required >
                                <option value="">select techer id</option>

                            <!--get data from teacher_tb-->
                            <?php 
                                while($row = mysqli_fetch_assoc($ret)) {
                                    echo '<option value="' . $row['t_user_name'] . '">';
                                    echo $row['t_user_name'] . '       - ' . $row['teacher_name'];
                                    echo '</option>';
                                }
                            ?>
                            </select>
                            <div class="error-field">
                                <p id="t_id_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>Subject</label>
                            <select class="select-box" name="subject" id="subject" required>
                                <option value="">select subject</option>
                                <option value="Bio">Bio</option>
                                <option value="Maths">Maths</option>
                                <option value="Technical">Technical</option>
                            </select>
                            <div class="error-field">
                                <p id="t_subject_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label> Class type</label>
                            <select class="select-box" name="clz_type" id="clz_type" required>
                                <option value="">select class type</option>
                                <option value="revision">Revision Class</option>
                                <option value="paper">Paper Class</option>
                                <option value="normal">Normal Class</option>
                            </select>
                            <div class="error-field">
                                <p id="classType_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>A/L year</label>
                            <input type="num" placeholder="2024" required id="alyear" name="alyear" maxlength="4" minlength="4">
                            <div class="error-field">
                                <p id="alyear_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>Date</label>
                            <select class="select-box" name="avai_date" id="avai_date" required>
                            <option value="non">select date</option>
                                
                            </select>
                            <div class="error-field">
                                <p id="date_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>start time</label>
                            <input type="time" required id="s_time" name="s_time" require>
                            <div class="error-field">
                                <p id="s_time_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>end time</label>
                            <input type="time" required id="e_time" name="e_time" require>
                            <div class="error-field">
                                <p id="e_time_error"></p>
                            </div>
                        </div>

                        <div class="input-field ">
                            <label>class fees</label>
                            <input type="num" placeholder="Enter class fee"  id="class_fee" name="class_fee" require maxlength="4">
                            <div class="error-field">
                                <p id="class_fee_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>teacher fees</label>
                            <input type="num" placeholder="Enter teacher's fee" id="teacher_fee" name="teacher_fee" require maxlength="4">
                            <div class="error-field">
                                <p id="teacher_fee_error"></p>
                            </div>
                        </div>

                    </div>

                </div>

                

                <div class="class Detail">
                    
                    <div class="buttons">
                        <button class="submitBtn" onclick="Clz_formValidation()" name ="btn_Clz_Save">
                            <span class="btnText">Submit</span>
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

        var al = isNaN(document.getElementById("alyear").value);
        function Clz_formValidation() {
            //Validate teacher
            if(document.getElementById("t_id").selectedIndex == 0)
            {
                document.getElementById("t_id_error").innerHTML="select the teacher";
                count=1;
            }
            if(document.getElementById("t_id").selectedIndex != 0)
            {
                document.getElementById("t_id_error").innerHTML="";
            }

            //Validate subject
            if(document.getElementById("subject").selectedIndex == 0)
            {
                document.getElementById("t_subject_error").innerHTML="select the subject";
                count=1;
            }
            if(document.getElementById("subject").selectedIndex != 0)
            {
                document.getElementById("t_subject_error").innerHTML="";
            }

            //Validate class type
            if(document.getElementById("clz_type").selectedIndex == 0)
            {
                document.getElementById("classType_error").innerHTML="select the class type";
                count=1;
            }
            if(document.getElementById("clz_type").selectedIndex != 0)
            {
                document.getElementById("classType_error").innerHTML="";
            }

            //validate student A/L year
            if(document.getElementById("alyear").value == "")
		    {
			    document.getElementById("alyear_error").innerHTML="Enter year of A/L";
                count=1;
		    }
            if(isNaN(document.getElementById("alyear").value) & alyear.length != 4)
		    {
                count=1;
			    document.getElementById("alyear_error").innerHTML="Invalid value. Check again!";
		    }
            if(document.getElementById("alyear").value != "" & al=="false" & alyear.length == 4)
		    {
			    document.getElementById("alyear_error").innerHTML=""
		    }
            
            //Validate Available date
            if(document.getElementById("avai_date").selectedIndex == 0)
            {
                document.getElementById("date_error").innerHTML="select the Available date";
                count=1;
            }
            if(document.getElementById("avai_date").selectedIndex != 0)
            {
                document.getElementById("date_error").innerHTML="";
            }

            //validate class start time
            if(document.getElementById("s_time").value == "")
		    {
			    document.getElementById("s_time_error").innerHTML="Enter class start time";
                count=1;
		    }
            if(document.getElementById("s_time").value != "")
		    {
			    document.getElementById("s_time_error").innerHTML=""
		    }

            //validate class end time
            if(document.getElementById("e_time").value == "")
		    {
			    document.getElementById("e_time_error").innerHTML="Enter class end time";
                count=1;
		    }
            if(document.getElementById("e_time").value != "")
		    {
			    document.getElementById("e_time_error").innerHTML=""
		    }

            //validate class  fee
            if(document.getElementById("class_fee").value == "")
		    {
			    document.getElementById("class_fee_error").innerHTML="Enter class fees";
                count=1;
		    }
            if(isNaN(document.getElementById("class_fee").value) & class_fee.length != 4)
		    {
                count=1;
			    document.getElementById("class_fee_error").innerHTML="Invalid value. Check again!";
		    }
            if(isNaN(document.getElementById("class_fee").value)=="false" & class_fee.length == 4)
		    {
			    document.getElementById("class_fee_error").innerHTML=""
		    }

            //validate teachers's fee
            if(document.getElementById("teacher_fee").value == "")
		    {
			    document.getElementById("teacher_fee_error").innerHTML="Enter the fees";
                count=1;
		    }
            if(isNaN(document.getElementById("teacher_fee").value) & class_fee.length != 4)
		    {
                count=1;
			    document.getElementById("teacher_fee_error").innerHTML="Invalid value. Check again!";
		    }
            if(isNaN(document.getElementById("teacher_fee").value)=="false" & teacher_fee.length == 4)
		    {
			    document.getElementById("teacher_fee_error").innerHTML=""
		    }
        }

    </script>

    <!--for alert box-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
    <!-- script for get teacher available date -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            $('#t_id').on("change",function(){
            var sid = $("#t_id").val();
            console.log(sid); 
            //alert(sid);
            var getURL = "/newInstitute/admin_php_file/get_avai_date.php?id=" + sid;
            $.get(getURL, function(data, status){
                    $("#avai_date").html(data);
            });
            console.log(sid); 
            });
        });
    </script> 



</body>
</html>