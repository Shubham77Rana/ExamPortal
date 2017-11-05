<html>
    <head>
<?php 
	session_start();
    	include("connection.php");
    
?>


        <title>Timings</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
    </head>
    <body>
              <?php include("navigation_bar.php");?>
        
         <div class="container"> 
           <div class="responsive">
             <table class="table table-striped table-bordered table-hover">
                 <h2 align="center" style="font-weight: bold" >Timings</h2>
		<tbody>
		  <tr>
                      <th>S.NO</th>
		    <th>DATE</th>
		    <th>STARTTIME</th>
		    <th>ENDTIME</th>
                    <th>EDIT</th>
		  </tr>
		  <tr>
    			<?php
    			$number=1;
    			$result=mysqli_query($con,"select * from testdetail");
    			while($time=mysqli_fetch_array($result))
    			{
        			
        
        			echo "<tr>";
        			echo "<td>".$time['id']."</td>";
       				echo "<td>".$time['date']."</td>";
        			echo "<td>".$time['starttime']."</td>";
        			echo "<td>".$time['endtime']."</td>";
                                 echo '<td align="center"><a href="update_time.php?id='.$time['id'].'"><span class="glyphicon glyphicon-edit"></span></a></td>';
         			echo "<tr>";
    			}
   		        
	 ?>
	
		</tr>
	      </tbody>
	    </table>
           </div>
         </div>
       </body>
</html>