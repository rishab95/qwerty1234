<?php
	# initialize all variables
	$pass = true;
	$eve = "";
	$eveError = "";
	$date = "";
	$dateError = "";
	$time = "";
	$timeError = "";
	$venue = "";
	$venueError = "";
	$id = "";

	# perform validations and obtain data
	# id
	if(empty($_POST["id"])) {
		$pass = false;
	} else {
		$id = $_POST['id'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{0,3}$/", $eve)) {
			$pass = false;
		} else
			$pass &= true;
	}
	
	# eve
	if(empty($_POST["eve"])) {
		$pass = false;
		$eveError = "Event Description is required";
	} else {
		$eve = $_POST['eve'];
		# check that it contains legitimate characters
		if (!preg_match("/^[a-zA-Z][ a-zA-z,.-_]*$/", $eve)) {
			$pass = false;
			$nameError = "Only letters and white space allowed";
		} else
			$pass &= true;
	}
	
	# date
	if(!isset($_POST["d"])) {
		$pass = "exit";
	} else {
		if(!empty($_POST['d'])) {
			$date = $_POST['d'];
			# check that it contains legitimate characters
			if (!preg_match("/^[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}$/", $date)) {
				$pass = false;
				$dateError = "Example of correct format: 2015/05/22";
			} else
				$pass &= true;
		} else
			$pass &= true;
	}
	
	# venue
	if(!isset($_POST["v"])) {
		$pass = "exit";
	} else {
		if(!empty($_POST['v'])) {
			$venue = $_POST['v'];
			# check that it contains legitimate characters
			if (!preg_match("/^[a-zA-Z][ a-zA-z-]*$/", $venue)) {
				$pass = false;
				$venueError = "Only letters, '-' and white space allowed";
			} else
				$pass &= true;
		} else
			$pass &= true;
	}
	
	
	# time
	if(!isset($_POST["t"])) {
		$pass = "exit";
	} else {
		if(!empty($_POST['t'])) {
			$time = $_POST['t'];
			# check that it contains legitimate characters
			if (!preg_match("/^[0-9]{1,2}:[0-9]{2}$/", $time)) {
				$pass = false;
				$timeError = "Example of correct format: 16:00";
			} else
				$pass &= true;
		} else
			$pass &= true;
	}
	
	# check if all data is valid to input
	switch($pass) {
		case true:
			# initialize MySQL connection
			$servername="localhost";
			$dbname = "pap";
			$conn = mysqli_connect($servername , "root" , "" , $dbname);
			if(!$conn){
				#die("connection failed") mysql_error()
			}
			
			# mysql queries to insert relavent data to the company to the database
			$queryf = "INSERT INTO timeline(company_id, event_desc";
			$queryl = ") VALUES ($id, '$eve'";
			if(!empty($date)) {
				$queryf .= ", date";
				$queryl .= ", '$date'";
			}
			if(!empty($time)) {
				$queryf .= ", time";
				$queryl .= ", '$time'";
			}
			if(!empty($venue)) {
				$queryf .= ", venue";
				$queryl .= ", '$venue'";
			}
			$query = $queryf.$queryl.");";
			
			# execute the mysql queries
			if(mysqli_query($conn, $query) == true) {
				# new item added successfully
				echo json_encode(array("auth" => "true"));
			} else {
				# registration unsuccessful
			}
			break;
			
		case false:
			# oupt the error in json format
			echo json_encode(
				array(
					"auth" => "false",
					"name" => $name,
					"nameError" => $nameError
				)
			);
			break;
		case 'exit':
			# someone is playing with the form data
	}
?>