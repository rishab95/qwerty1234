<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in correctly
	if(!empty($_SESSION['username'])) {
		# obtain the username
		$username = $_SESSION['username'];
		
		# obtain form data
		if(!empty($_POST['descp'])) {
			$description = $_POST['desc'];
		} else {
			# form not filled correctly	
		}
		
		# perform validations
		
		# data conversion because of quotes
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		} else {
			# generate other info id
			$otherInfoId = NULL;
			
			# mysql queries to check for registration in the database table
			$query = "INSERT INTO other_info VALUES ($otherInfoId,$username,'$description');";
		
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
