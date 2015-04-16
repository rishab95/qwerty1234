<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in correctly
	if(!empty($_SESSION['username'])) {
		# obtain username
		$username = $_SESSION['username'];
		
		# establish connection to MySQL
			$servername = "localhost";
			$dbname = "pap";
	
		// Create connection
			$conn = new mysqli($servername, "root", "", $dbname);
		// Check connection
		if ($conn->connect_error) {
			# die("Connection failed: " . $conn->connect_error);
		} else {
			$query = "SELECT username, name, branch, cgpa FROM student
			WHERE username IN SELECT username FROM stu_eligible WHERE 'company_id'='$username' AND applied=1;";		
			$out = array();
			
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out, 
					 		array(
					 			'roll' => $row[0],
								'name' => $row[1],
								'branch' => $row[2],
								'cgpa' => $row[3]
					 			)
					 		);
				}
			}
			
			# ouput data in JSON format
			echo json_encode($out);
		}
	} else
		header("Location: /");
?>