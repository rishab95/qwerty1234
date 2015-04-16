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
			$query = "";
			
			# initialize the output variable
			$out = array();
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				while($row = mysqli_fetch_row($result)) {
					 array_push($out, array('description' => $row[0]));
				}
			}
			
			# output in jSON format
			echo json_encode($out);
		}
	} else
		header("Location: /");
?>
