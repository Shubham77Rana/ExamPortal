<html>
    <head>       
<?php
    session_start();
    include("connection.php");
    $id=$_GET['id'];
    if(isset($_POST['update']))
    {
       $question=$_POST['question'];
       $options=array($_POST['option1'],$_POST['option2'],$_POST['option3'],$_POST['option4']);
       $answer=$_POST['answer'];
       $query=mysqli_query($con,"update createtest set question='$question',option1='$options[0]',option2='$options[1]',option3='$options[2]',option4='$options[3]',answer='$answer' where id=$id")
                    or die(mysqli_error($query));
       ?>
            <script>
                alert("Successfully Updated Question");
                window.location="create_test.php";
            </script>
        <?php
    }
    
  
    $query=mysqli_query($con,"select * from createtest where id=$id");
    $question=mysqli_fetch_array($query);
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

        <div class="container-fluid font" >
            <div class="row">
                <div class="col-sm-4 col-xs-12 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!--form start-->
                    <form id="form1" class="form-container form1" method="POST">
                        <label id="hide">
                            Test Topic <br>
                            <input type="text" name="topic" class="input-sm">
                        </label>
                        <?php if($_SESSION['page']=="create_test.php") { ?>
                        <script> document.getElementById('hide').style.display="none"; </script>
                        <?php } ?>
                        <label>Question<br>
                            <textarea class="area" name="question" form="form1"><?php echo $question['question'];  ?></textarea>
                        </label>
                        <label>
                            Option 1:<br>
                            <input type="text" name="option1" class="input-sm" value="<?php echo $question['option1'];  ?>">
                        </label>
                        <label>
                            Option 2:<br>
                            <input type="text" name="option2" class="input-sm" value="<?php echo $question['option2'];  ?>">
                        </label>
                        <label>
                            Option 3:<br>
                            <input type="text" name="option3" class="input-sm" value="<?php echo $question['option3'];  ?>">
                        </label>
                        <label>
                            Option 4:<br>
                            <input type="text" name="option4" class="input-sm" value="<?php echo $question['option4'];  ?>">
                        </label>
                        <div>
                             <br><label>Answer</label><br>
                        <select class="select" id="choice" name="answer" >
                          <option value="option1">Option 1</option>
                          <option value="option2">Option 2</option>
                          <option value="option3">Option 3</option>
                          <option value="option4">Option 4</option>
                          </select>
                         </div>
                        
                        <br><br><input name="update" type="submit" value="Update" class="btn btn-success">
                        </form>
                    <!--form end-->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
        </div>
    </body>
</html>
