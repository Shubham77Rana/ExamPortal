<html>
    <head>
<?php 
	session_start();
    	include("connection.php");
    
?>
<script>
    function Redirect()
    {
        <?php  $_SESSION['page']="question_display.php"; ?>
        window.location="add_question.php";
    }
</script>

        <title>Question Library</title>
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
		
    	      $query=mysqli_query($con,"select distinct topic from mcq");
    	      $total_topics=mysqli_num_rows($query);         
    	       while($total_topics--)
   	      {
			$topics=mysqli_fetch_array($query);  
              ?>
        
         <div class="container"> 
           <div class="responsive">
             <table class="form-container table table-striped table-bordered table-hover">
                 <h2 align="center" style="font-weight: bold" ><?php echo strtoupper($topics['topic']); ?></h2>
		<tbody>
		  <tr>
		    <th>S.NO</th>
		    <th>TOPIC</th>
		    <th>QUESTION</th>
		    <th>ANSWER</th>
		  </tr>
		  <tr>
    			<?php
    			$number=1;
    			$result=mysqli_query($con,"select * from mcq where topic='$topics[0]'");
    			while($ques=mysqli_fetch_array($result))
    			{
        			$answer=$ques['answer'];
        			$answer=$ques["$answer"];
        
        			echo "<tr>";
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
           <input onclick="Redirect();" type="button" value="Add a Question" class="btn btn-danger">
         </div>
       </body>
</html>