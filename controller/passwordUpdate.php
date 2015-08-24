<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# initialize all variables
	$pass = true;
	$currPass = "";
	$newPass = "";
	$newCPass = "";
	$username = $_SESSION['username'];
	
	$currPass = $_POST['currPass'];
	$newPass = $_POST['newPass'];
	$newCPass = $_POST['newCPass'];
	
	if($newCPass != $newPass)
		$pass = false;
	else
		$pass &= true;
	
	# password conversion
	$currPass = md5($currPass);
	
	# initialize MySQL connection
	$servername="localhost";
	$dbname = "pap";
	$conn = mysqli_connect($servername , "root" , "" , $dbname);
	if(!$conn){
		#die("connection failed") mysql_error()
	}
	
	# mysql query to check the current password
	$query = "SELECT password FROM auth where username = $username";

	$result = $conn->query($query);
	
	# check result
	if($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		if($row['password'] == $currPass) {
			$pass &= true;
		} else
			# password does not match
			$pass = false;
	} else {
		$pass = false;
		if($result->num_rows < 1) {
			# password not found
		} else {
			# code injection has occured
		}
	}
	
	if($pass) {
		# convery password
		$newCPass = md5($newCPass);
		
		# mysql queries to check for registration in the database table
		$query = "UPDATE auth SET password = '$newCPass' where username = $username;";
	
		if($conn->query($query)==true) {
			# registration successful
			echo json_encode(array("auth"=>"true"));
		} else {
			# registration unsuccessful
			# echo "Not Registered";
		}
	} else {
		echo json_encode(array("auth"=>"false"));
	}
?>
