<?php
Session_start();
include('../database/dbcon.php');
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

$schedule = date("Y-m-d H:i:s");
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare("SELECT employeeId, status, pass FROM employeetb WHERE username = ? ")) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
If ($stmt->num_rows > 0) {
	$stmt->bind_result($employeeId,$status,$pass);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	//password_verify($_POST['password'], $password)
	//$_POST['password'] === $password
	If (password_verify($_POST["password"], $pass)) {
	
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		if($status=='Active'){
		Session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['employeeId'] = $employeeId;
	
		$activity="logged into the system";  
		mysqli_query($con,"INSERT INTO historytb(employeeId,activity,schedule) VALUES('$employeeId','$activity','$schedule')")or die(mysqli_error($con));
		header('Location: home');

		} else {
			echo "<script type='text/javascript'>alert('Account Suspended! Contact Your Supervisor');
			document.location='../pages/'</script>";
		}
	} else {
		echo "<script type='text/javascript'>alert('Invalid Password, please try again');
		document.location='../pages/'</script>";
	}
} else {
	echo "<script type='text/javascript'>alert('Invalid Username!');
	document.location='../pages/'</script>";
}

	$stmt->close();
}
?>