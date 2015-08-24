<?php
	if(isset($_POST['username'])) {
		# obtain username
		$username = $_POST['username'];
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn)
			; # die("connection failed") mysql_error()
		else {
		
			# initialize the output variables
			$out = array();
			
			# mysql query to retrieve inbox data for $username
			if($_POST['type']=='coordinator') {
				$query = "SELECT cm.message_id, a.name, cm.message, cm.date, cm.label, cm.read_status FROM coordinator_msg cm, auth a WHERE receiver=$username AND a.username=cm.sender ORDER BY cm.date DESC;";
				
				# obtain data from sql output
				if ($result=mysqli_query($conn,$query)) {
					$data = array();
					while($row = mysqli_fetch_row($result)) {
						array_push($out,
							array(
								'messageId' => $row[0],
								'from' => $row[1],
								'message' => $row[2],
								'date' => (date("d M", strtotime($row[4]))),
								'label' => $row[4],
								'read' => ($row[5]==1)?'read':'unread'
								)
							);
					}
				}
			} else {
				$query = "SELECT c.company_id, c.company_name, c.company_profile, se.applied, c.last_date FROM company c, stu_eligible se WHERE se.username = $username AND c.company_id = se.company_id;";
				
				# obtain data from sql output
				if ($result=mysqli_query($conn,$query)) {
					$data = array();
					while($row = mysqli_fetch_row($result)) {\
						array_push($out,
							array(
								'companyId' => $row[0],
								'companyName' => $row[1],
								'message' => $row[2],
								'status' => ($row[3]==1)?'Applied':'Not Applied',
								'date' => (date("d M", strtotime($row[4])))
								)
							);
					}
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