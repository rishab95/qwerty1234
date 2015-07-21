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
		else {
			# form not filled correctly
			header("Location: /student/profile#proj");
		}
		
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
			$query1="SELECT COUNT(project_id) FROM project WHERE username=$username;";
			 
			 if ($result = mysqli_query($conn,$query1)) {
				while($row = mysqli_fetch_row($result)) {
					$projectId=$row[0]+1;
			 	}
			 }
			
			# mysql query to insert the new project
			$query = "INSERT INTO project VALUES ($projectId, $username, '$description');";
			
			if(mysqli_query($conn, $query)) {
				# data successfully entered
				header("Location: /student/profile#proj");
			} else {
				# data not entered
			}
		}
	} else {
		header("Location: /");
	}
?>
