
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body><?php
include("connection.php");
session_start();
$school_name=$_SESSION['name'];

$username=$_POST['username'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$email=$_POST['email'];

//existing email
if(mysqli_num_rows(mysqli_query($con,"select * from user where email='$email';"))==1)
{
	?>
	<script>
		alert("already existing email address");
		window.location="user_signup.php";
	</script>
	<?php
}

//empty validations
if($username=="" || $password1=="" || $password2=="" || $email=="")
{
	?>
	<script>
		alert("No Fields can be left empty");
		window.location="user_signup.php";
	</script>
	<?php
}

//confirm password
if($password1!=$password2)
{ ?>
        <script> alert("Password did not match");
	window.location="user_signup.php";
	</script>
        <?php
}

else
{
    $result1=mysqli_query($con,"select school from admin where name='$school_name';");
    $school=mysqli_fetch_array($result1);
    $school_name=$school['school'];
    $result2= mysqli_query($con,"insert into user (school,name,password,email) values('$school_name','$username','$password1','$email');") 
           or die(mysqli_error($result2));
    ?>
        <script>
            function Redirect(){
                window.location="adminstrator.php";
            }
            alert("Successfully Registered Student");
            setTimeout('Redirect()',1);
        </script>    
        <?php
}
 ?>
         </body>
</html>
