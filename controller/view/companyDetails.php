<?php
	# check if session is started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['username'])) {
		# obtain the id
		if(!empty($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			# illegal request
			header("Location: ".$_SERVER['REQUEST_URI']);
		}
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
			# initialize the output variable
			$out = array();
			
			# mysql querie to retrieve all projects
			$query = "SELECT c.company_id, c.company_name, c.dream_status, se.applied FROM company c, stu_eligible se where c.company_id = $id and se.username = $username and se.company_id = c.company_id limit 1;";
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out,
					 	array(
							'data' => 'true',
							'id' => $row[0],
							'name' => $row[1],
							'status' => $row[2],
							'applied' => $row[3]
						)
					);
				}
				if(empty($out))
					array_push($out, array('data' => 'false'));
			} else
				array_push($out, array('data' => 'false'));
			
			# output in jSON format
			echo json_encode($out);
		}
	} else
		header("Location: /");
?>
