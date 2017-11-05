<?php 
	session_start();
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
    .form-container{
        margin-top: 3vh;
    }
    th{
        color: blue;
    }
</style>
    </head>
    <body>
        <?php include("navigation_bar.php");    ?>
        <?php
//make connection
include("connection.php");
$name=$_SESSION['name'];
$result=mysqli_query($con,"select school from admin where name='$name'");
$school=mysqli_fetch_array($result);
$school_name=$school['school'];
$result=mysqli_query($con,"select * from user where school='$school_name'")
        or die("Failed to query database ".mysql_error());
?>
        <div class="container">
            <div class="responsive">
<input class="form-control" id="sinput" type="text" placeholder="Search Students...">
<br>
<table class="form-container table table-bordered table-condensed table-hover form1">
<thead style="border: solid 2px; color: white; background-color: cyan;  ">
<tr>
<th>ROLL</th>
<th>NAME</th>
<th>PASSWORD</th>
<th>EMAIL</th>
<th>SCHOOL</th>
</tr>
</thead>
<tbody id="students">
<tr>
    <?php
   	 while($user=mysqli_fetch_array($result))
    	{
        	echo "<tr>";
        	echo "<td>".$user['rollno']."</td>";
        	echo "<td>".$user['name']."</td>";
        	echo "<td>".$user['password']."</td>";
        	echo "<td>".$user['email']."</td>";
        	echo "<td>".$user['school']."</td>";
         	echo "<tr>";
        }
    ?>
</tr>
</tbody>
</table>
            </div>
        </div>

      <!-- search using jquery-->
      <script>
            $(document).ready(function(){
                $("#sinput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#students tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
      </script>
    </body>
</html>