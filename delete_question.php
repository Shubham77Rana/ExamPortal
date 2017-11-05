<?php
session_start();
include("connection.php");
$id=$_GET['id'];
$query=mysqli_query($con,"delete from createtest where id=$id");

header("Location: create_test.php");

?>
