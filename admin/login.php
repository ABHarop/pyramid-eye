<?php
Session_start();
include('dbcon.php');
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare("SELECT manId, password FROM managetb WHERE username = ? ")) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
If ($stmt->num_rows > 0) {
	$stmt->bind_result($manId,$password);
	$stmt->fetch();

	//password_verify($_POST['password'], $password)
	If (($_POST["password"] == $password)) {
		Session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['manId'] = $manId;
		header('Location: staff');

		
	} else {
		echo "<script type='text/javascript'>alert('Invalid Password, please try again');
		document.location='../admin/'</script>";
	}
} else {
	echo "<script type='text/javascript'>alert('Invalid Username!');
	document.location='../admin/'</script>";
}

	$stmt->close();
}

?>

