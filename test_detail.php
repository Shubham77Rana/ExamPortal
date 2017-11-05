<?php
session_start();
include("connection.php");
$date=$_POST['date'];
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
if($date=="" || $starttime=="" || $endtime=="")
{
	?>
	<script>
		alert("No Fields can be left empty");
		window.location="test_time.php";
	</script>
	<?php
}
$result=mysqli_query($con,"insert into testdetail (date,starttime,endtime) values('$date','$starttime','$endtime');") or die("Failed to query database ".mysql_error($result)); 
?>

<script>
            function Redirect(){
                window.location="create_test.php";
            }
            alert("time set");
            setTimeout('Redirect()',1);
        </script>

