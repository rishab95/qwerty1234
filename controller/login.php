<?php
	# obtain form data
	$username = $_POST['username'];
	$password = $_POST['password'];
	$userType = $_POST['usertype'];
	
	# authentication variable
	$auth = False;
	
	# mysql queries to check for authenticity in the database table 
	# return $auth = True if authenticated
	
	if($auth == True) {
		# create session and redirect to user's home page
		session_start();
		$_SESSION['username'] = $username;
		header('Location: '.$username.'/');
	} else if($auth == False) {
		# redirect to login interface
		header('Location: /?auth=false');
	}
?>