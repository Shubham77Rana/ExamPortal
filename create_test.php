<html>
    <head>
        
        <script>
            function  delete_confirm(delid)
            {
                if(confirm("Are you sure?"))
                {
                    window.location="delete_question.php?id="+delid;
                }
            }
            </script>
        
<?php 
    session_start();
    include("connection.php");
    $_SESSION['page']="create_test.php";
?>
        

<title>Create Test</title>
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">


<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
<style>
	#right
	{
		float: right;
	}
        .font{
            font-size: 18px;
        }
</style>

</head>

    <body>

	<?php include("navigation_bar.php"); include("footer.php"); ?>

        <div class="container">
            <form method="POST" action="create_test.php">
                        <div id="saved" align="center">
                            <label style="font-size: 20px;">TEST TOPIC</label><br><input name="topic" type="text" class="input-sm"><br>
                            <input class="btn btn-success" name="topicbutton" value="Save topic" type="submit">
                        </div><br>
            </form>
            
            <h2 align="center" style="font-weight: bold" >
                <?php  if(isset($_SESSION[$_SESSION['name']."testtopic"]))
                        {
                            echo strtoupper($_SESSION[$_SESSION['name']."testtopic"]);   
                        }
                        else if(isset($_POST['topicbutton']))
                        {
                            echo strtoupper($_POST['topic']);
                        }
                ?>
            </h2>
            <form method="POST" action="add_question.php" id="form1">    
                        <table class="table table-striped table-bordered table-hover" style="background-color: whitesmoke">
                                <thead class="font">
                                    <tr>
                                        <th>Q.NO</th>
                                        <th>QUESTION</th>
                                        <th>ANSWER</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                         <?php
                                    $number=1;
                                    $username=$_SESSION['name'];
                                     $result=mysqli_query($con,"select * from createtest c,test_topic t where c.topic=t.topic and t.user='$username'");
                                     while($ques=mysqli_fetch_array($result))
                                 {
                                    echo "<tr>";
                                    echo "<td>".$number++."."."</td>";
                                    echo "<td>".$ques['question']."</td>";
                                    echo "<td>".$ques[$ques['answer']]."</td>";
                                    echo '<td align="center"><a href="edit_question.php?id='.$ques['id'].'"><span class="glyphicon glyphicon-edit"></span></a></td>';
                                    echo '<td align="center"><a onclick="delete_confirm('.$ques['id'].');"><span class="glyphicon glyphicon-trash"></span></a></td>';
                                    echo "<tr>";
                                   }
                                   ?> 
                                    </tr>
                                      </tbody>
                              
                      </table>
                     
                <div align="center" class="col-md-6"><input type="submit" id="btn1" name="addtest" value="Add Question" class="btn btn-primary"></div>
                <div align="center" class="col-md-6"><input type="submit" id="btn2" formaction="select_question.php" name="selecttest" value="Select Question" class="btn btn-primary"></div>
            <input type="hidden" name="topic" value="<?php if(isset($_POST['topic'])){echo $_POST['topic'];} ?>">  
            </form>
            <br><br>
                <br>
                <br>
           
             

                        <!--<form method="POST" action="select_question.php">
                            <div align="center" class="col-md-6"><input type="submit" name="selecttest" value="Select Question" class="btn btn-primary"></div>
                        </form>-->
                        </div>
                    <!--form end-->
                  
    </body>
            <script>
                document.getElementById('btn1').style.display="none";
                document.getElementById('btn2').style.display="none";
            </script>
            <?php
                if(isset($_SESSION[$_SESSION['name']."testtopic"])){  ?>
                             <script>
                                 document.getElementById('saved').style.display="none";
                                 document.getElementById('btn1').style.display="block";
                                 document.getElementById('btn2').style.display="block";
                             </script>
                     <?php
                        }
            
                 if(isset($_POST['topicbutton']))
                 {
                     $_SESSION[$_SESSION['name']."testtopic"]=$_POST['topic'];
                     ?>
                             <script>
                                 document.getElementById('saved').style.display="none";
                                 document.getElementById('btn1').style.display="block";
                                 document.getElementById('btn2').style.display="block";
                             </script>
                     <?php
                    
                 }
            ?>
</html>