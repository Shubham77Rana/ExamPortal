<?php
    session_start();
    include("connection.php");
    $result=mysqli_query($con,"select * from test_topic");
    $row=mysqli_fetch_array($result);

    date_default_timezone_set('Asia/Kolkata');

    $time=explode(':',$row['duration'],3);

    $test_start_date=$row['startdate'];
    $test_end_date=$row['enddate'];

    $starttime=date('Y-m-d H:i:s');

    if(strtotime($test_start_date)>strtotime($starttime))
    {
        ?>
            <script>
                    alert('Test Coming Soon');
            </script>
        <?php
        die();
    }

    if(strtotime($test_end_date)<=strtotime($starttime))
    {
        ?>
            <script>
                    alert('Test Ended Long Ago');
            </script>
        <?php
        die();
    }

    $endtime=strtotime($test_end_date)-strtotime($starttime);

    $enddate=date('Y-m-d H:i:s', strtotime('+'.$endtime.'seconds',strtotime($starttime)));

    $_SESSION['endtime']=date('Y-m-d H:i:s', strtotime('+'.$time[0].'hours',strtotime($starttime)));

    $_SESSION['endtime']=date('Y-m-d H:i:s', strtotime('+'.$time[1].'minutes',strtotime($_SESSION['endtime'])));

    $_SESSION['endtime']=date('Y-m-d H:i:s', strtotime('+'.$time[2].'seconds',strtotime($_SESSION['endtime'])));

    if(strtotime($_SESSION['endtime'])>strtotime($enddate))
    {
        $_SESSION['endtime']=$enddate;
    }

    header("Location: question.php");

?>