<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in correctly
	if(!empty($_POST['username'])) {
		# obtain username and type
		$username = isset($_POST['username'])?$_POST['username']:"";
		$type = isset($_POST['type'])?$_POST['type']:"";
		
		# establish connection to MySQL
		$servername = "localhost";
		$dbname = "pap";
	
		// Create connection
		$conn = new mysqli($servername, "root", "", $dbname);
		// Check connection
		if ($conn->connect_error) {
			# die("Connection failed: ".$conn->connect_error);
		} else {
			# initilize the output array for json
			$out = array();

			if($type == 'coordinator') {
				# query to select  data from sql
				$query = "SELECT a.username, a.name FROM auth a, company_coordinator cc WHERE a.username = cc.company_id AND cc.roll_number = $username ORDER BY a.name;";
				
				# execute the  query
				if ($result = mysqli_query($conn,$query)) {
					while($row = mysqli_fetch_row($result)) {
						 array_push($out, 
								array(
									'companyId' => $row[0],
									'companyName' => $row[1]
									)
								);
					}
				}
			} else {
				# query to select  data from sql
				$query = "SELECT company_id, company_name, last_date FROM company WHERE last_date > curdate() ORDER BY last_date;";
				
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
			}
			
			# ouput data in JSON format
			echo json_encode($out);
		}
	} else
		header("Location: /");
?>