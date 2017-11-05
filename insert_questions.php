<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <?php
include("connection.php");
session_start();
$school_name=$_SESSION['name'];
$topic=$_POST['topic'];
if($_SESSION['page']=="create_test.php")
{
    $topic=$_POST['testtopic'];
    $table_name="createtest";
}
 else {
     $table_name="mcq";
 }
$question=$_POST['question'];
$options=array($_POST['option1'],$_POST['option2'],$_POST['option3'],$_POST['option4']);
$answer=$_POST['answer'];
//existing email
if(mysqli_num_rows(mysqli_query($con,"select * from $table_name where question='$question';"))==1)
{
	?>
	<script>
		alert("already existing question");
		window.location="add_question.php";
	</script>
	<?php
}
//empty validations
if($topic=="" || $question=="" || $options[0]=="" || $options[1]=="" ||$options[2]=="" ||$options[3]=="" ||$answer=="")
{
	?>
	<script>
		alert("No Fields can be left empty");
		window.location="add_question.php";
	</script>
	<?php
}
else
{     $row=mysqli_num_rows(mysqli_query($con,"select * from $table_name where topic='$topic'"));
       $row++;
       $qno=mysqli_num_rows(mysqli_query($con,"select * from mcq"));
       $qno++;
       mysqli_query($con,"insert into $table_name (qno,id,topic,question,option1,option2,option3,option4,answer) values($qno,$row,'$topic','$question','$options[0]','$options[1]','$options[2]','$options[3]','$answer');") 
          or die("cannot insert");
    
      if(isset($_SESSION['page']) && $_SESSION['page']=="create_test.php")
      {
    ?>    
        <script>
            function Redirect(){
                
                window.location="create_test.php";
            }
            alert("Question Successfully added to Test");
            setTimeout('Redirect()',1);
        </script>    
        <?php
      }
      else
      {
          ?> <script> alert("Sucessfully added Question");
                      window.location="question_display.php";
             </script>
             <?php
      }
}
 ?>
         </body>
</html>