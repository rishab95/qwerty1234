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
			$query = "SELECT class, board, year, max_marks, marks FROM academic where username = $username;";
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out,
					 	array(
							'data' => 'true',
						 	'name' => $row[0],
							'board' => $row[1],
							'year' => $row[2],
							'mm' => $row[3],
							'mo' => $row[4],
							'percent' => $row[4]*100/$row[3],
						)		
					);
				}
				if(empty($out))
					array_push($out, array('data' => 'false'));
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
