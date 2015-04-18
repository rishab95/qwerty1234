<?php
	# check if session is started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['username'])) {
		# obtain the username
		$username = $_SESSION['username'];
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			# die("connection failed") mysql_error()
		} else {
			# mysql querie to retrieve all projects
			$query = "SELECT activity_description FROM curricular_activity WHERE username =                         				                       $username;";
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out, array('description' => $row[0]));
				}
			}
			echo json_encode($out);
		}
	} else
		header("Location: /");
?>
