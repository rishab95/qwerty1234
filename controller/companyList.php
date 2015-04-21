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
			# query to select  data from sql
			$query = "SELECT company_id, company_name, last_date FROM company WHERE last_date > curdate() ORDER BY last_date;";
			# initilize the output array for json
			$out = array();
			
			# execute the  query
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out, 
					 		array(
					 			'username' => $row[0],
								'name' => $row[1],
								'date' => $row[2]
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