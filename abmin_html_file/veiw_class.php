<?php
session_start();
?>

<?php
// Connect to the Server
$con = mysqli_connect("localhost", "root", "");
    
// Select DB
mysqli_select_db($con, "sipma_db");

$sql1 = "SELECT * FROM class_tb";
$ret = mysqli_query($con, $sql1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Class List</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- link css file -->
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/veiw_clz.css">
    <link rel="stylesheet" href="/newInstitute/abmin_css_file/formDash.css">

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

        <div class="search">
            <input type="text" id="search" onkeyup="search();" placeholder="Type here">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>

    
        <div class="table-box">
            <table cellpadding ="10" id = "veiw_tb">

                <tr>
                    <th>Class ID</th>
                    <th>Subject</th>
                    <th>Class Type</th>
                    <th>A/L Year</th>
                    <th>Teacher Name</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                </tr>

                <div class ="tb">
                    <tr>
                    <?php
                        while($row = mysqli_fetch_assoc($ret)){

                    ?>
                            <td><?php echo $row['class_id'] ?></td>
                            <td><?php echo $row['subject'] ?></td>
                            <td><?php echo $row['class_type'] ?></td>
                            <td><?php echo $row['AL_year'] ?></td>
                            <td><?php echo $row['teacher_uname'] ?></td>
                            <td><?php echo $row['dates'] ?></td>
                            <td><?php echo $row['start_time'] ?></td>
                            <td><?php echo $row['end_time'] ?></td>

                            <td>
                                <a href="/newInstitute/abmin_html_file/update_class.php?class_id=<?php echo $row['class_id'] ?>"><i class="fa-solid fa-pen-to-square edit"></i></a>
                                <a onclick= "checker()" href="/newInstitute/admin_php_file/delete.php?class_id=<?php echo $row['class_id'] ?>"><i class="fa-solid fa-trash delete"></i></a>
                            </td>

                    </tr>
                    <?php
                        }
                    ?>
                </div>
                
                
            </table>
        </div>
      
            
    </div>

    <script src="/newInstitute/js_file/veiw_search.js"></script>

    <script>
        function checker() {
            var result = confirm('Are you sure?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>

    
    <!--for alert box-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>