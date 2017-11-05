<?php
    session_start();
    include("connection.php");

     $id=0;    

    $total=mysqli_query($con,"select qno from mcq");
    $rows=mysqli_num_rows($total);

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
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

	$query=mysqli_query($con,"select * from mcq");
    
    }

    print_r($_SESSION['answer']);
    
    $result=mysqli_fetch_array($query);

    echo $result['question'];

    $id++;
		
    ?>	

    <br><a href="quiz.php?id=<?php echo $id; ?>">Next question</a><br>

        <?php
    
    for($i=0;$i<$rows;$i++)
    {
	echo '<a href="quiz.php?id='.$i.'">'.$i.'</a><br>';
    }

?>
