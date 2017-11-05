<?php
    session_start();
    $_SESSION['id']=1;
?>
<html>
    <head>
        <title>test portal</title>
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
       <?php include("navigation_bar.php"); ?>     <div class="container-fluid bg">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!--form start-->
                    <form class="form-container form1"><ul>
                            <li><div>
                           <a href="create_test.php">create test</a>
                                </div><br></li>
                            <li><div>
                            <a href="test_time.php">Set time for test</a>
                                </div><br></li>
                            <li><div>
                            <a href="time_display.php">Test Timings</a>
                                </div><br></li>
                    </form></ul>
                        
                        <!--form end-->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
        </div>
    </body>
</html>
