<html>
    <head>
<?php 
    session_start();
    include("connection.php");
    $_SESSION['page']="create_test.php";
?>
        

<title>Create Test</title>
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">


<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
<style>
	#right
	{
		float: right;
	}
        .font{
            font-size: 18px;
        }
</style>

</head>

    <body>

	<?php include("navigation_bar.php"); include("footer.php"); ?>
 <div class="container">
<form action="test_detail.php" method="POST">
                
            <div>
                <label style="font-size: 20px;">Enter date for test</label><br>
                            <input type="date" name="date">
            </div><br>
            <div>
                <label style="font-size: 20px;">Enter start time for test</label><br>
                <input type="time" name="starttime">
            </div><br>
            <div>
                <label style="font-size: 20px;">Enter end time for test</label><br>
                <input type="time" name="endtime">
            </div><br>
            <div>
                <input type="submit" class="btn btn-primary">
            </div><br>
             <div>
                 <input type="submit" value="update time" class="btn btn-primary">
            </div>
            
            </form>
 </div>
