<html>
    <head>
        
<?php
    session_start();
    include("connection.php");
    if(!isset($_SESSION[$_SESSION['name']."testtopic"]))
    {
        ?>
            <script> alert("Enter the topic"); window.location="create_test.php" </script>
        <?php
    }
?>

<title>Add Question</title>
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
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!--form start-->
                    <form id="form1" class="form-container form1" action="insert_questions.php" method="POST">
                        <label id="hide">
                            Test Topic <br>
                            <input type="text" name="topic" class="input-sm">
                        </label>
                        
                        <?php if($_SESSION['page']=="create_test.php") 
                              { ?>
                                    <script>
                                            document.getElementById('hide').style.display="none";
                                    </script>
                        <?php } ?>
                                    
                        <label>Question<br>
                            <textarea class="area" name="question" form="form1"></textarea>
                        </label>
                        <label>
                            Option 1:<br>
                            <input type="text" name="option1" class="input-sm">
                        </label>
                        <label>
                            Option 2:<br>
                            <input type="text" name="option2" class="input-sm">
                        </label>
                        <label>
                            Option 3:<br>
                            <input type="text" name="option3" class="input-sm">
                        </label>
                        <label>
                            Option 4:<br>
                            <input type="text" name="option4" class="input-sm">
                        </label>
                        <div>
                             <br><label>Answer</label><br>
                        <select class="select" id="choice" name="answer">
                          <option value="option1">Option 1</option>
                          <option value="option2">Option 2</option>
                          <option value="option3">Option 3</option>
                          <option value="option4">Option 4</option>
                          </select>
                         </div>
                        
                        <br><br><input type="submit" value="submit" class="btn btn-success">
                        <input type="hidden" name="testtopic" value="<?php if(isset($_SESSION[$_SESSION['name']."testtopic"])){ echo $_SESSION[$_SESSION['name']."testtopic"]; } else { echo "topic";} ?>">
                </form>
                    <!--form end-->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
        </div>
    </body>
</html>