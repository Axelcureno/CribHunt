<?php 
include('config.php');
$email = $_POST['email'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$emailErr = "Invalid email format"; 
	} else {
		mysqli_query($con, "INSERT INTO emails (emails) VALUES ('$email')");
	}
?>