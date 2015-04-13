<?php
	if (session_status() == PHP_SESSION_NONE)
	    session_start();
	if(!empty($_SESSION['username'])) {
		# obtain username
		$username = $_SESSION['username'];
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn)
			;# die("connection failed") mysql_error()
		else {
		
			# initialize the output variables
			$companyId = array();
			$companyName = array();
			$message = array();
			$status = array();
			$date = array();
			
			# mysql query to retrieve inbox data for $username
			$query = "SELECT c.company_id, c.company_name, c.company_profile, se.applied, c.last_date
						FROM company c, stu_eligible se;
						WHERE c.company_id IN SELECT company_id FROM stu_eligible WHERE username = '$username'
						AND c.company_id = se.company_id;";
			
			# obtain data from sql output
			$lim = 0;
			if ($result=mysqli_query($conn,$query)) {
				while($rows=mysqli_fetch_row($result)) {
					array_push($companyId, $row[0]);
					array_push($companyName, $row[1]);
					array_push($message, $row[2]);
					# convert status value to string
					array_push($status, ($row[3]==1)?"Applied":"Not Applied");
					# convert date in format and then attach to array [4 Aug]
					array_push($date, (date("d M", strtotime($row[4]))));
					$lim++;
				}
			}
			
			# ouput data in JSON format
			echo "'inbox':[";
			for($i=0 ; $i<$lim ; $i++) {
				echo "\n{'companyId':'$companyId[$i]', 'companyName':'$companyName[$i]', 'message':'$message[$i]', 'status':'$status[$i]', 'date':'$date[$i]'},";
			}
			echo "\b\n]";
		}
	} else {
		header("Location: /");
	}
?>