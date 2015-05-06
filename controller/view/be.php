<?php
	# check if session is started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['username'])) {
		# obtain the username
		if(!empty($_POST['username'])) {
			$username = $_POST['username'];
		} else {
			# illegal request
			header("Location: ".$_SERVER['REQUEST_URI']);
		}
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			# die("connection failed") mysql_error()
		} else {
			# initialize the output variable
			$out = array();
			
			# mysql querie to retrieve all projects
			$query = "SELECT semester, university, year, max_cgpa, cgpa FROM academic_btech where username = $username ORDER BY semester;";
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out,
					 	array(
							'data' => 'true',
						 	'sem' => $row[0],
							'uni' => $row[1],
							'year' => $row[2],
							'mm' => $row[3],
							'mo' => $row[4],
							'cgpa' => $row[4],
						)
					);
				}
			} else {
				# error in data retrieval
				array_push($out, array('data' => 'false'));
			}
			# output in jSON format
			echo json_encode($out);
		}
	} else
		header("Location: /");
?>