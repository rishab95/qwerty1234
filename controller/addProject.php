<?php
	# check if session is started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user loggin in correctly
	if(!empty($_SESSION['username'])) {
		# obtain the user
		$username = $_SESSION['username'];
		
		# obtain form data
		if(!empty($_POST['desc']))
			$description = $_POST['desc'];
		else
			; # form not filled correctly	
		
		# perform validations
		
		# data conversion because of quotes in description
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn) {
			# die("connection failed") mysql_error()
		} else {
			# generate project id
			$projectId = NULL;
			
			# mysql query to insert the new project
			 $query = "INSERT INTO project VALUES ($projectId, $username, '$description');";
		
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
