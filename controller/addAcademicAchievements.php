<?php
	# check if session is started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user loggin in correctly
	if(!empty($_SESSION['username'])) {
		# obtain the username
		$username = $_SESSION['username'];
		
		# obtain form data
		if(!empty($_POST['desc'])) {
			$description = $_POST['desc'];
		} else {
			# form not filled correctly	
		}
		
		# perform validations
		
		# data conversion because of quotes in description
		
		# generate achievement id
		$aaId = NULL;
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		} else {
			# mysql queries to insert the academic achievements in sql
			$query = "INSERT INTO acad_achieve VALUES ($aaId, $username, '$desc');";
		
			if($conn->query($query)==True) {
				# data successfully entered
				header("Location: /student/?p=profile");
			} else {
				# data not entered
			}
		}
	} else {
		header("Location: /");
	}
?>
