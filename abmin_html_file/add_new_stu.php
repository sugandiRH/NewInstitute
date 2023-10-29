<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--link boostrap for alert box-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
       integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--link css file-->
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/main.css">
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/add_new_student.css">
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
        left: 50px;
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
     <br>

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

        <header>Registation</header>

        <form name="frmStudent" id="frmStudent" method="post" action="/newInstitute/admin_php_file/add_new_student.php">
            <div class="form first">

                <!--for enter student personal detail-->
                <div class="detail personal">
                    
                    <span class="title">Personal details</span>

                    <div class="fields">
                        <div class="input-field ">
                            <label>Full name</label>
                            <input type="text" placeholder="Enter name" required id="stuname" name = "stuname">
                            <div class="error-field">
                                <p id="stuname_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>NIC number</label>
                            <input type="num" placeholder="Enter NIC" required id="stunic" name="stunic" maxlength="12" minlength="12">
                            <div class="error-field">
                                <p id="stunic_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>BirthDay</label>
                            <input type="date" placeholder="Enter date" required id="stubday" name="stubday">
                            <div class="error-field">
                                <p id="bday_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" placeholder="Enter Address" required id="stuaddress" name="stuaddress">
                            <div class="error-field">
                                <p id="stuaddress_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="abc@gmail.com" required id="stuemail" pattern=".*@gmail.com$" name="stuemail">
                            <div class="error-field">
                                <p id="stuemail_error"></p>
                            </div>
                        </div>
                        
                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="tel" placeholder="775643290" required id="stuconnum" maxlength="10" name="stuconnum">
                            <div class="error-field">
                                <p id="stuconnum_error"></p>
                            </div>
                        </div>

                    </div>

                </div>

                <!--for enter student perent detail-->

                <div class="parent Detail">
                    
                    <span class="title">Perent details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>full name</label>
                            <input type="text" placeholder="Enter parent name" required id="pname" name="pname">
                            <div class="error-field">
                                <p id="pname_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>contact number</label>
                            <input type="tel" placeholder="enter contact number" required id="pconnum"  name="pconnum" maxlength="10">
                            <div class="error-field">
                                <p id="pconnum_error"></p>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>relationship</label>
                            <select class="select-box" id="relation" class="relation" name = "relationship">
                                <option value="non">select relationship</option>
                                <option value="mother">mother</option>
                                <option value="father">father</option>
                                <option value="other">others</option>
                            </select>
                            <div class="error-field">
                                <p id="relation_error"></p>
                            </div>
                        </div>
                       
                    </div>

                </div>

                <!--for enter student school detail-->

                <div class="school Detail">
                    
                    <span class="title">School Info</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>School name</label>
                            <input type="text" placeholder="Enter school name" required id="sclname" name="sclname">
                            <div class="error-field">
                                <p id="sclname_error"></p>
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
                            <label>Subject</label>
                            <select class="select-box" name="subject" id="subject" class="stusubject" >
                                <option value="non">select subject</option>
                                <option value="bio">Bio</option>
                                <option value="maths">Maths</option>
                                <option value="tech">Technical</option>
                            </select>
                            <div class="error-field">
                                <p id="subject_error"></p>
                            </div>
                        </div>
                       
                    </div>

                    <div class="buttons">
                        <button class="submitBtn" onclick="formValidation()" name ="btnSave">
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

        function formValidation() {

            var msg = "#fix Erro#\n";
		    var count = 0;

            var stu_name =document.getElementById("stuname").value;
            var stu_nic = document.getElementById("stunic").value;
            var stu_Address = document.getElementById("stuaddress").value;
            var stu_conNum = document.getElementById("stuconnum").value;

            //validate student name
            if(stu_name == "")
            {
                count=1;
                document.getElementById("stuname_error").innerHTML="Enter the student name"                
            }
            if(stu_name != "")
            {
                document.getElementById("stuname_error").innerHTML=""                
            }

            //validate student nic//
            //check is empty
            if(stu_nic == "")
		    {
                count=1;
                document.getElementById("stunic_error").innerHTML="enter student NIC"
		    }
            //check is number
            if(isNaN(document.getElementById("stunic").value) & stu_nic.length != 12)
		    {
                count=1;
			    document.getElementById("stunic_error").innerHTML="Invalid value. Check again!"
		    }
            //if all ok
            if(stu_nic != "" && isNaN(stu_nic)==false & stu_nic.length == 12)
		    {
                document.getElementById("stunic_error").innerHTML=""
		    }

            //validate student address
            if(stu_Address == "")
		    {
			    count=1;
                document.getElementById("stuaddress_error").innerHTML="Enter student address"
		    }
            if( stu_Address != "")
		    {
			    document.getElementById("stuaddress_error").innerHTML=""
		    }


            //validate student contact number//
            if(stu_conNum == "")
		    {
			    document.getElementById("stuconnum_error").innerHTML="Enter student contact number"
                count=1;
		    }
            //check is number
            if(isNaN(document.getElementById("stuconnum").value) & stu_conNum.length != 12)
		    {
                count=1;
			    document.getElementById("stuconnum_error").innerHTML="Invalid value. Check again!"
		    }
            //if all ok
            if(stu_conNum != "" & isNaN(stu_conNum)==false & stu_conNum.length == 10)
		    {
                document.getElementById("stuconnum_error").innerHTML=""
		    }

            //validate student email
            if(document.getElementById("stuemail").value == "")
		    {
			    document.getElementById("stuemail_error").innerHTML="Enter email"
                count=1;
		    }
            if(document.getElementById("stuemail").value != "")
		    {
			    document.getElementById("stuemail_error").innerHTML=""
		    }

            //validate parent name
            if(document.getElementById("pname").value == "")
		    {
			    document.getElementById("pname_error").innerHTML="Enter parent name"
                count=1;
		    }
            if(document.getElementById("pname").value != "")
		    {
			    document.getElementById("pname_error").innerHTML=""
		    }

            //validate parent conNum
            
            if(document.getElementById("pconnum").value == "")
		    {
			    document.getElementById("pconnum_error").innerHTML="Enter parent contact number"
                count=1;
		    }
            //check is number
            if(isNaN(document.getElementById("pconnum").value) & stu_conNum.length != 12)
		    {
                count=1;
			    document.getElementById("pconnum_error").innerHTML="Invalid value. Check again!"
		    }
            //if all ok
            if(document.getElementById("pconnum").value != "" & isNaN(document.getElementById("pconnum").value)==false & document.getElementById("pconnum").value.length == 10)
		    {
                document.getElementById("pconnum_error").innerHTML=""
		    }

            //validate school name
            if(document.getElementById("sclname").value == "")
		    {
			    document.getElementById("sclname_error").innerHTML="Enter school name"
                count=1;
		    }
            if(document.getElementById("sclname").value != "")
		    {
			    document.getElementById("sclname_error").innerHTML=""
		    }

            //validate student A/L year
            if(document.getElementById("alyear").value == "")
		    {
			    document.getElementById("alyear_error").innerHTML="Enter year of A/L"
                count=1;
		    }
            if(document.getElementById("alyear").value != "")
		    {
			    document.getElementById("alyear_error").innerHTML=""
		    }

            //Validate subject
            if(document.getElementById("subject").selectedIndex == 0)
            {
                document.getElementById("subject_error").innerHTML="select the subject"
                count=1;
            }
            if(document.getElementById("subject").selectedIndex != 0)
            {
                document.getElementById("subject_error").innerHTML=""
            }

            //Validate relationship
            if(document.getElementById("relation").selectedIndex == 0)
            {
                document.getElementById("relation_error").innerHTML="select the relationship"
                count=1;
            }
            if(document.getElementById("relation").selectedIndex != 0)
            {
                document.getElementById("relation_error").innerHTML=""
            }

            if(count==1){
        	    alert(msg);
            }

            else{
        	    document.getElementById("frmStudent").submit();
            }

        }

    </script>

    <!--for alert box-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    
</body>
</html>