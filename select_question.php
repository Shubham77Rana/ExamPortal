<html>
    <head>  
<?php 
	session_start();
    	include("connection.php");
        
        if(isset($_POST['addtest']))
        {
                ?>

                <?php
                $total=$_POST['total'];
                $i=1;
                while($i<=$total)
                {
                    if(isset($_POST[$i]))
                    {
                        $question=$_POST[$i];
                        $result=mysqli_fetch_array(mysqli_query($con,"select * from mcq where qno='$question'"));
                        
                        $topic=$_SESSION[$_SESSION['name']."testtopic"];
                        $id= mysqli_num_rows(mysqli_query($con,"select * from createtest where topic='$topic'"));
                        $id++;
                        $ques=$result['question'];
                        $option=array($result['option1'],$result['option2'],$result['option3'],$result['option4']);
                        $answer=$result['answer'];
                        
                        $query=mysqli_query($con,"insert into createtest (id,topic,question,option1,option2,option3,option4,answer)
                                values($id,'$topic','$ques','$option[0]','$option[1]','$option[2]','$option[3]','$answer')") 
                                or die(mysqli_error($query));
                    }
                    $i++;
                }
            ?>
              <script>
                  alert("Questions Sucessfully added");
                  window.location="create_test.php";
              </script>  
              
                
            <?php
        }
?>
                
        <title>Select Question for Test</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
<style>
    .form-container{
        margin-top: 3vh;
        margin-bottom: 7vh;
    }
</style>
    </head>
    <body>
              <?php include("navigation_bar.php");
	      $total_question=0;
    	      $query=mysqli_query($con,"select distinct topic from mcq");
    	      $total_topics=mysqli_num_rows($query);         
    	       while($total_topics--)
   	      {
			$topics=mysqli_fetch_array($query);  
              ?>
        
         <div class="container"> 
             <form method="POST">
           <div class="responsive">
             <table class="form-container table table-striped table-bordered table-hover" style="background-color: whitesmoke;">
                 <h2 align="center" style="font-weight: bold" ><?php echo strtoupper($topics['topic']); ?></h2>
                 <tbody>
                 <tr>
    			<?php
    			$number=1;
    			$result=mysqli_query($con,"select * from mcq where topic='$topics[0]'");
    			while($ques=mysqli_fetch_array($result))
    			{
                                $total_question++;
        			$answer=$ques['answer'];
        			$answer=$ques["$answer"];
        			echo '<tr>';
                                $value=$ques['qno'];
                                echo '<td><input type="checkbox" name="'.$ques['qno']. '" value="'.$value.'".></td>';
                                echo "<td>".$number++.".</td>";
       				echo "<td>".$ques['topic']."</td>";
        			echo "<td>".$ques['question']."</td>";
        			echo "<td>".$answer."</td>";
         			echo "<tr>";
    			}
   		}        
	 ?>
	
		</tr>
	      </tbody>
	    </table>
                  
           </div>
                 <input type="submit" name="addtest" value="Add to Test" class="btn btn-danger">
           <input type="hidden" name="total" value="<?php echo $total_question; ?>">
          </form>
         </div>
       </body>
</html>