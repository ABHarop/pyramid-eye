<?php
include('dbcon.php');

$username = $_POST["username"];
$password = $_POST['newpassword'];


$passnew=password_hash($password, PASSWORD_BCRYPT);

$query2=mysqli_query($con,"SELECT * FROM employeetb WHERE username='$username' ")or die(mysqli_error($con));
$count=mysqli_num_rows($query2);
   
  if ($count>0)
  {

    mysqli_query($con,"UPDATE employeetb SET pass='$passnew' WHERE username='$username' ")or die(mysqli_error($con));

      echo "<script type='text/javascript'>alert('Password Reset Successful!');</script>"; 
      echo "<script>document.location='../pages/'</script>";
  }
  else
  {	
    echo "<script type='text/javascript'>alert('Username does not exist in the system!');</script>";
    echo "<script>document.location='../pages/'</script>";
  }
?>
