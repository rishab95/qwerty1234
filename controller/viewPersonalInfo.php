<?php
	# check if session is started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['username'])) {
		# obtain the username
		if(!empty($_GET['t'])) {
			if($_GET['t']=="post") {
				if(!empty($_POST['username']))
					$username = $_POST['username'];
				else
					; # illegal request
			} else if($_GET['t']=='session')
				$username = $_POST['username'];
		} else {
			# illegal request
		}
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			# die("connection failed") mysql_error()
		} else {
			# mysql query to retrive the personal details of the given username
			$query = "SELECT s.username,s.name,s.dob,DATEDIFF(hour,s.dob,GETDATE())/8766 AS                        			                        s.age,s.citizenship,s.gender,s.temp_address,s.temp_city,
			            s.temp_state,s.temp_pin,s.permanent_address,s.permanent_city,permanent_state,
						s.permanent_pin,tel.phone_num,s.email,s.father_name,s.father_occupation,s.mother_name,
						s.mother_ocupation FROM student s, student_telephone tel WHERE s.username=$username 
						AND tel.username=$username;";
			
			# initialize the output variable
			$out = array();
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out,
					 	array(
							'username' => $row[0],
							'fullName' => $row[1],
							'dob' => $row[2],
							'age' => $row[3],
							'citizenship' => $row[4],
							'gender' => $row[5],
							'temp_address' => $row[6],
							'temp_city' => $row[7],
							'temp_state' => $row[8],
							'temp_pin' => $row[9],
							'permanent_address' => $row[10],
							'permanent_city' => $row[11],
							'permanent_state' => $row[12],
							'permanent_pin' => $row[13],
							'phone_num' => $row[14],
							'email' => $row[15],
							'father_name' => $row[16],
							'father_occupation' => $row[17],
							'mother_name' => $row[18],
							'mother_occupation' => $row[19]
						)
					);
				}
			}
			
			# output in jSON format
			echo json_encode($out);
		}
	} else
		header("Location: /");
?>
