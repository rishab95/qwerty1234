<?php
	if(!empty($_GET['type']) && !empty($_POST['username'])) {
		# input data
		$type = $_GET['type'];
		$id = $_POST['username'];
		
		# establish connection to database
		$servername="localhost";
		$dbname="pap";
		$conn = mysqli_connect($servername, "root", "", $dbname);
		if (!$conn) {
				#die("Connection failed"); #mysqli_error()
		} else {
			# retrieve  data on basis of type
			switch($type) {
				case 'company':
					# query for retrieval
					$query = "SELECT event_id, date, venue, time, event_desc FROM timeline WHERE company_id=$id;";
					
					# initialize the output variable
					$out = array();
					
					# get the results
					if($result = $conn->query($query)) {
						while($row = mysqli_fetch_row($result)) {
							array_push($out,
								array(
									'eventId' => $row[0],
									'date' => date("d M, y", strtotime($row[1])),
									'venue' => $row[2],
									'time' => date("H:i", strtotime($row[3]))."h",
									'eve' => $row[4]
								)
							);
						}
					}
					break;
			}
			
			# output the results
			echo json_encode($out);
		}
	} else {
		session_destroy();
		header("Location: /");
	}
?>