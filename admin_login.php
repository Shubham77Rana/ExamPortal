<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>
    </head>
    <body><?php
$username=$_POST['username'];
$password=$_POST['password'];
$school=$_POST['school'];
$con=mysqli_connect("localhost","root","rana77","exam") or die(mysqli_error($con));
$result=mysqli_query($con,"select * from admin where name= '$username' and password= '$password' and school='$school'")
        or die("Failed to query database ".mysql_error($result)); 

if($username=="" || $password=="")
{
	?>
	<script>
		alert("No field can be left empty");
		window.location="index.php";
	</script>
	<?php
}

if(mysqli_num_rows($result)==1)
{
    session_start();
    $_SESSION['name']=$username;
    header("Location: adminstrator.php");
}
 else { ?>
     <script> alert("Login Failed : Check username, password or school"); window.history.back();</script>
     <?php
     }
 ?>
         </body>
</html>
