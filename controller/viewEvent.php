<?php
	if(!empty($_POST['username'])) {
		# check for type of operation
		if(!empty($_GET['t'])) {
			switch($_GET['t']) {
				case 'schedule':
					# return schedule operation
					$username = $_POST['username'];
					$query = "SELECT cd.company_name, s.event_descp, s.venue, s.date, s.time
							FROM stu_schedule s, company cd, stu_eligible se
							WHERE se.company_id = s.company_id AND se.applied=1 AND se.username = $username AND s.date>CURDATE() AND s.time>CURTIME()
							ORDER BY s.date, s.time;";
					break;
				case 'timeline':
					# return timeline operation
				default:
					# retrun timeline operation
					$query = "SELECT cd.company_name, s.event_descp, s.venue, s.date, s.time
							FROM stu_schedule s, company cd WHERE cd.company_id = s.company_id; AND s.date>CURDATE() AND s.time>CURTIME()
							ORDER BY s.date, s.time";
					break;
			}
		}
		
	
		# establish connection to MySQL
			$servername = "localhost";
			$dbusername = "root";
			$dbname = "pap";
	
		// Create connection
			$conn = new mysqli($servername, $dbusername, "", $dbname);
		// Check connection
		if ($conn->connect_error)
			; # die("Connection failed: " . $conn->connect_error);
		else {
			
			# initialize the output variables
			$out = array();
			
			if ($result = mysqli_query($conn, $query)){
				while($row = mysqli_fetch_row($result)) {
					array_push($out,
						array(
							'company' => $row[0],
							'eve' => $row[1],
							'venue' => $row[2],
							'date' => (date("d M", strtotime($row[3]))),
							'time' => (date("H:i", strtotime($row[4])))
							)
						);
				}
			}
			
			# ouput data in JSON format
			echo json_encode($out);
		}
	} else {
		session_destroy();
		header("Location: /");
	}
?>