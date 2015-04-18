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
			$description="";
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
			$query1="SELECT COUNT(info_id) FROM other_info WHERE username=$username;";
			 
			 if ($result = mysqli_query($conn,$query1)){
				while($row = mysqli_fetch_row($result))
				{
				$otherInfoId=$row[0]+1;
			 	}
			 }
			
			# mysql queries to check for registration in the database table
			$query = "INSERT INTO other_info VALUES ($otherInfoId,$username,'$description');";
		
			$retval = mysqli_query( $conn, $query );
			if($retval) {
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
