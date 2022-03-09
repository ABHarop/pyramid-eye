
<?php
include 'dbcon.php'; 
session_start();
if(empty($_SESSION['employeeId'])):
header('Location: ./');
endif;
    $employeeId=$_SESSION['employeeId'];
    $schedule = date("Y-m-d H:i:s");
    $activity="logged out of the system";
    mysqli_query($con,"INSERT INTO historytb(employeeId,activity,schedule) VALUES('$employeeId','$activity','$schedule')")or die(mysqli_error($con));
    session_destroy();
    Header('Location: ./');
?>
