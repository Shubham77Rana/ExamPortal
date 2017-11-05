<?php
    session_start();
    $_SESSION['id']=1;
    $_SESSION['rightanswer']=0;
    
    include("connection.php");
    
    $user=$_SESSION['name'];
    $query=mysqli_query($con,"select * from test_topic where user='$user'");
    $topic=mysqli_fetch_array($query);
    
    if(mysqli_num_rows($query)==1)
    {
        $_SESSION[$_SESSION['name']."testtopic"]=$topic['topic'];
    }
?>
<html>
    <head>
        <title>Adminstrator</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
<style>
    #right{
        float: right;
    }
</style>
    </head>
    <body>
       <?php include("navigation_bar.php"); ?>     <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!--form start-->
                    <form class="form-container form1"><ul>
                            <li><div>
                           <a href="user_signup.php">Register a Student</a>
                                </div><br></li>
                        <li> <div>
                            <a href="admin_signup.php">Register an Admin</a>
                            </div><br></li>
                        <li><div>
                            <a href="registered_students.php">Registered Students</a>
                            </div><br></li>
                        <li><div>
                           <a href="question_display.php">All Question</a>
                            </div><br></li>
                        <li><div>
                           <a href="conducting_test.php">Test Portal</a>
                            </div><br></li>
                        <li><div>
                            <a href="test_start.php">Test</a>
                            </div></li></ul>
                    </form>
                        <!--form end-->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
        </div>
    </body>
</html>
