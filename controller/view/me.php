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
			$query = "SELECT semester, university, year, max_cgpa, cgpa FROM academic_mtech where username = $username ORDER BY semester;";
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out,
					 			array(
								 	'year' => $row[1],
									'sem' => $row[2],
									'cgpa' => $row[3],
									'max_cgpa' => $row[4],
									'divi' => $row[5]
								)		
					);
				}
			}
		}
	} else
		header("Location: /");
?>
