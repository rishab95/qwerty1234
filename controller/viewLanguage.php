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
			$query = "SELECT language, understand, read, write, speak FROM student_language where username = $username;";
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out,
					 	array(
							'language' => $row[0],
							'understand' => $row[1],
							'read' => $row[2],
							'write' => $row[3],
							'speak' => $row[4]
						)
					);
				}
			}
		}
	} else
		header("Location: /");
?>
