<html>
    <head>       
<?php
    session_start();
    include("connection.php");
    $id=$_GET['id'];
    if(isset($_POST['update']))
    {
       $date=$_POST['date'];
       $starttime=$_POST['starttime'];
       $endtime=$_POST['endtime'];
       $query=mysqli_query($con,"update testdetail set date='$date',starttime='$starttime',endtime='$endtime' where id=$id")
                    or die(mysqli_error($query));
       ?>
            <script>
                alert("Successfully Updated Time");
                window.location="time_display.php";
            </script>
             <?php
    }
    
  
    $query=mysqli_query($con,"select * from testdetail where id=$id");
    $time=mysqli_fetch_array($query);
?>
     <title>Edit Question</title>
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">


<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
<style>
	.form-container{
                width: 700px;
		margin-top: 6vh;
	}
        .area{
            height: 180px;
            width: 500px
        }
        .select{
            width: 100px;
            height: 30px;
        }
        .font{
            font-size: 15px;
        }
</style>
</head>
    <body>

	<?php include("navigation_bar.php"); ?>

      <div class="container">
          <form action="update_time.php?id=<?php echo $id; ?>" method="POST">
                
            <div>
                <label style="font-size: 20px;">Enter date for test</label><br>
                            <input type="date" name="date" value="<?php echo $time['date'];  ?>">
            </div><br>
            <div>
                <label style="font-size: 20px;">Enter start time for test</label><br>
                <input type="time" name="starttime"  value="<?php echo $time['starttime'];  ?>">
            </div><br>
            <div>
                <label style="font-size: 20px;">Enter end time for test</label><br>
                <input type="time" name="endtime"  value="<?php echo $time['endtime'];  ?>">
            </div><br>
             <div>
                 <input type="submit" value="update time" name="update" class="btn btn-primary">
            </div>
            
            </form>
 </div>