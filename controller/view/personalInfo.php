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
//			header("Location: ".$_SERVER['REQUEST_URI']);
		}
		$username = '101203081';
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			# die("connection failed") mysql_error()
		} else {
			# mysql query to retrive the personal details of the given username
			$query = "SELECT s.username,s.name,s.dob,TIMESTAMPDIFF(year,s.dob,CURDATE()) AS age, s.citizenship, s.gender, s.temp_address, s.temp_city, s.temp_state, s.temp_pin, s.permanent_address, s.permanent_city, s.permanent_state, s.permanent_pin, tel.phone_num, tel.permanent_number, s.email, s.father_name, s.father_occupation, s.mother_name, s.mother_occupation FROM student s, student_telephone tel WHERE s.username=$username AND tel.username=s.username;";
			
			# query for language
			
			# initialize the output variable
			$out = array();
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out,
					 	array(
							'data' => 'true',
							'username' => $row[0],
							'fullName' => $row[1],
							'dob' => date("F d, Y", strtotime($row[2])),
							'age' => $row[3],
							'citizenship' => $row[4],
							'gender' => ($row[5]=='M'?'Male':'Female'),
							'currAddr' => $row[6],
							'currCity' => $row[7],
							'currState' => $row[8],
							'currPin' => $row[9],
							'perAddr' => $row[10],
							'perCity' => $row[11],
							'perState' => $row[12],
							'perPin' => $row[13],
							'currTele' => $row[14],
							'perTele' => $row[15],
							'email' => $row[16],
							'fname' => $row[17],
							'foccu' => $row[18],
							'mname' => $row[19],
							'moccu' => $row[20]
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
