<!-- for search box -->
<?php
session_start();
?>

<?php
// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");

$sql1 = "SELECT c.class_id, c.subject, c.class_type, c.AL_year, t.teacher_name
FROM class_tb c
INNER JOIN teacher_tb t 
ON c.teacher_uname = t.t_user_name";
$ret = mysqli_query($con, $sql1);
?>


<!-- for table -->
<?php
   if(isset($_POST["searchBtn"])){
       
    $c_id = $_POST["class"];
     // Connect to the Server
    $con = mysqli_connect("localhost", "root", "");
    
     // Select DB
    mysqli_select_db($con, "sipma_db");

    $ret1 ="";
    $sql1 = "SELECT cs.class_id, s.student_name, s.s_user_name
    FROM class_stu_tb cs
    INNER JOIN student_tb s
    ON cs.stu_uname = s.s_user_name
    WHERE cs.class_id = '$c_id'";
    $ret1 = mysqli_query($con, $sql1);

   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendent</title>

    <!-- link css file -->
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/formDash.css">
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/mark_att.css">

    <!--link boostrap for alert box-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<style>
    body{
        margin: 0;
        padding: 0;
        display: flex;
        top: 200px;
        height: 100vh;
        font-family: sans-serif;
        background-color: #fff;
    }

    .container{
        position: relative;
        max-width: 1000px;
        width: 100%;
        padding: 30px;
        top: 60px;   
    }

    .container .alert{
        justify-content: right;
    }

    .table-box{
        height: 500px;
        overflow-y: scroll;
        background: #fff;
    }

    table{
        width: 100%;
    }

    table,th,td{
        border: 0.2px solid #005577;
        border-collapse: collapse;
        text-align: left;
    }

    th{
        position: sticky;
        top: 0;
        background: #00dcd4;
        color: #fff;
    }

    tr {
        cursor: pointer;
    }

    tr th:nth-child(1){
        text-align: center;
        background-color: #03707d;
    }

    tr td:nth-child(1){
        background-color: #00bcd4;
        text-align: center;
        color: #fff;
    }

    tr:hover{
        background-color: rgb(216, 231, 244);
    }

    .delete{
        color: red;
    }

    .edit{
        color: blue;
    }

    i{
        margin-right: 20px;
    }

    .delete:hover{
        box-shadow: 0 0 5px 4px red;
        transition: 0.6s;
        border-radius: 4px;
    }

    .edit:hover{
        box-shadow: 0 0 5px 4px blue;
        transition: 0.6s;
        border-radius: 4px;
    }

    .search input{
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

    .search{
        display: inline;
    }

    .search i{
        margin-left: 20px;
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
        <div class="alert">
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
        </div>

        <form name="frmAttend" id="frmAttend" method="post" action="#">
                    <label>Class</label>
                    <select class="select-box" name="class" id="class" required>
                        <option value="">select class</option>
                        <!--get data from teacher_tb-->
                        <?php 
                            while($row = mysqli_fetch_assoc($ret)) {
                                echo '<option value="' . $row['class_id'] . '">';
                                echo $row['subject'] . '       - ' . $row['class_type'] . '       - ' . $row['AL_year'] . '       - ' . $row['teacher_name'];
                                echo '</option>';
                            }
                        ?>
                    </select>
                    
                    <button class="searchBtn" name ="searchBtn" onclick="formValidation()"> Search</button>
            </form>

       
            <input type="text" id="search" onkeyup="search();" placeholder="Type here">
        

        <div class="table-box">
            <table cellpadding ="10" id = "veiw_tb">

                <tr>
                    <th>Class ID</th>
                    <th>Student Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                <div class ="tb">
                    <tr>

                    <?php
                    if(isset($_POST["searchBtn"])){

                        if($ret1!=""){
                            while($row1 = mysqli_fetch_assoc($ret1)){

                    ?>
                                <td><?php echo $row1['class_id'] ?></td>
                                <td><?php echo $row1['student_name'] ?></td>
                                <td><?php echo $row1['s_user_name'] ?></td>

                                <td>
                                    <a href="/newInstitute/admin_php_file/mark_atten.php?class_id=<?php echo $row1['class_id'] ?>&stu_un=<?php echo $row1['s_user_name'] ?>"><i class="fa-solid fa-user-plus"></i></i></a>
                                    <a  href="/newInstitute/abmin_html_file/pay_class_fee.php?class_id=<?php echo $row1['class_id'] ?>&stu_un=<?php echo $row1['s_user_name'] ?>"><i class="fa-solid fa-money-bill"></i></a>
                                </td>

                        </tr>
                    <?php
                            }
                        }

                    }
                    
                    ?>
                </div>
                
                
            </table>

    </div>

    <script src="/newInstitute/js_file/veiw_search.js"></script>

<script>
    function formValidation() {
        //Validate class
        if(document.getElementById("class").selectedIndex == 0)
        {
            alert("select class");
        }

        else{
        	document.getElementById("frmAttend").submit();
        }
    }
</script>

    <!--for alert box-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
</body>
</html>