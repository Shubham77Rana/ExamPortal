<html>
    <head>
        <title>Quiz</title>
      
<script type="text/javascript">
    
    var stop=setInterval(function()
    {
        var xhr=new XMLHttpRequest();
        xhr.open("GET","timer.php",false);
        xhr.send();
        var over=xhr.responseText;
        document.getElementById('time').textContent=over;
        
        if(over=="00:00:00")
        {
            clearInterval(stop);
            alert("Time Over");
            window.location="result_display.php";
        }
      
    },10);
    
</script>
        
<?php    
    
    session_start();
    
    include("connection.php");    
     
    $id=0;
    
    $total=mysqli_query($con,"select qno from mcq order by qno");
    $rows=mysqli_num_rows($total);
    
    if(isset($_GET['id']))
    {
        if(!isset($_SESSION['answer']))
        {
            echo "Test already over";
            die();
        }
        
        $id=$_GET['id'];
        
        if(isset($_POST['next']))
        {
            $_SESSION['answer'][$id-1]=1;
        }
        
        if(isset($_POST['answer']))
        {
            $correct=$_POST['correct'];
            $answer=$_POST['answer'];
           
            $_SESSION['answer'][$id-1]=2;
            
            if($correct==$answer)
            {
                $_SESSION['answer'][$id-1]=3;
            }
        }
        
        if($id==$rows)
        {
             ?>
            <script>
                alert("Test Ended" );
                window.location="result_display.php";
            </script><?php
        }
	$qno=$_SESSION['ques'][$id];
	$query=mysqli_query($con,"select * from mcq where qno='$qno'");	
    }    
    else
    {	

	$row=mysqli_fetch_array($total);

        $_SESSION['answer']=array(0);
        
	$_SESSION['ques']=array($row['qno']);
	
	while($row=mysqli_fetch_array($total))
	{
		array_push($_SESSION['ques'],$row['qno']);
                array_push($_SESSION['answer'],0);
	}

	$query=mysqli_query($con,"select * from mcq order by qno");
    
    }

    $result=mysqli_fetch_array($query);
   
    $id++;
    
    ?>
                
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">


<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
<style>
    .font{
        font-size: 30px;
        font-weight: bold;
    }
    .font1{
        font-size: 25px;
        font-weight: bold;
    }
    .con{
		margin-top: 13vh;
    }
    .row_style{
        margin-top: 30px;
    }
    body{
        background-image: url('images/images4.jpg');
    }
</style>
</head>
    <body>

	<?php include("navigation_bar.php")?>
        <div id="time" class="col-md-1 container font1" style="border: solid 5px; background-color: cyan;">
           
        </div>
        
        <div class="container">
        
                <div class="col-md-7  con">
                    <form method="POST" action="question.php?id=<?php echo $id; ?>">
                    <div class="panel panel-primary">
                        <div align="center" class="panel-footer font">
                         <?php 
                            echo "Question ".$id." out of ".$rows;
                         ?>
                        </div>
                        
                        
                        <div align="center" class="panel-heading font">
                         <?php 
                            echo $result['question'];
                         ?>
                        </div>
                        
                        <div class="panel-body font1">
                            <div><input type="radio" name="answer" value="option1"><?php echo " ".$result['option1'];  ?><br></div>
                            <div><input type="radio" name="answer" value="option2"><?php echo " ".$result['option2'];  ?><br></div>
                            <div><input type="radio" name="answer" value="option3"><?php echo " ".$result['option3'];  ?><br></div>
                            <div><input type="radio" name="answer" value="option4"><?php echo " ".$result['option4']; ?><br> 
                        </div>
                        <div class="panel-footer">
                            <?php
                                if($id!=$rows)
                                {
                                    echo '<input type="submit" name="next" value="Next Question" class="btn btn-warning">';       
                                }
                                else
                                {
                                    echo '<input type="submit" name="next" value="Submit Test" class="btn btn-warning">';
                                }
                            ?>
                            <input type="hidden" name="correct" value="<?php echo $result['answer'];  ?>" >
                        </div>
                        </div>
                    </div>
                     </form>
                </div>     
        
       
                <div class="col-md-4 col-xs-offset-1" style="margin-top: 9vh;">
                    <form  method="POST">
                       
                    <div class="panel panel-warning">
                        <div align="center" class="panel-heading font">
                            Question Panel
                        </div>
                        <div align="center" class="panel-body font1">
                         <?php 
                            for($i=1;$i<=$rows;$i++)
                            {
                                if($_SESSION['answer'][$i-1]==0)
                                {
                                    echo '<input type="button" class="btn btn-default" onclick="Redirect_question('.($i-1).');" value="'.$i.'">'." ";
                                }
                                else if($_SESSION['answer'][$i-1]==1)
                                {
                                    echo '<input type="button" class="btn btn-danger" onclick="Redirect_question('.($i-1).');" value="'.$i.'">'." ";
                                }
                                else if($_SESSION['answer'][$i-1]==2 || $_SESSION['answer'][$i-1]==3)
                                {
                                    echo '<input type="button" class="btn btn-success" onclick="Redirect_question('.($i-1).');" value="'.$i.'">'." ";
                                }
                                if(($i%4)==0)
                                {
                                    echo "<br><br>";
                                }
                            }
                         ?>
                        </div>            
                        <div align="center" class="panel-footer">
                            <input type="button"  onclick="End_Test();" name="endtest" value="End Test" class="btn btn-warning">       
                        </div>
                    </div>
                     </form>
                </div>     
            </div>
        <script>
            function Redirect_question(id)
            {
                window.location="question.php?id="+id;
            }
            function End_Test()
            {
                if(confirm("Are you sure?"))
                {
                    alert("Test Ended" );
                    window.location="result_display.php";
                }
            }
        </script>
    </body>   
</html>
