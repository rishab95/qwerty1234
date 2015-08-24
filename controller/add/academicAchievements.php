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
			# form incorrectly filled
			header("Location: /student/profile#acadAch");
		}
		
		# perform validations
		
		# data conversion because of quotes in description
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		} else {
			
			# generate achievement id
			$query1="SELECT COUNT(achieve_id) FROM acad_achieve WHERE username=$username;";
			 
			 if ($result = mysqli_query($conn,$query1)) {
				while($row = mysqli_fetch_row($result)) {
					$aaId=$row[0]+1;
			 	}
			 }
			# mysql queries to insert the academic achievements in sql
			$query = "INSERT INTO acad_achieve VALUES ($aaId, $username, '$description');";
		
			$retval = mysqli_query( $conn, $query );
			
			if($retval) {
				# data successfully entered
				header("Location: /student/profile#acadAch");
			} else {
				# data not entered
			}
		}
	} else {
		header("Location: /");
	}
?>
