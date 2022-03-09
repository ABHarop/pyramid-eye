<?php 
    include('dbcon.php');
    mysqli_query($con,"DELETE FROM poitb WHERE poiId='".$_GET['poiId']."'");
    header('location:poi');
?>