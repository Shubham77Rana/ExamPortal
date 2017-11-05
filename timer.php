<?php
session_start();

date_default_timezone_set('Asia/Kolkata');

$now=date('Y-m-d H:i:s');

$remaining_time=strtotime($_SESSION['endtime'])-strtotime($now);

echo gmdate('H:i:s',$remaining_time);

?>