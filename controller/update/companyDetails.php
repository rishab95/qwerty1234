<?php
	# initialize all variables
	$pass = true;
	$date = "";
	$dateError = "";
	$type = "";
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
	
	# type
	if(empty($_GET['type'])) {
		$type = $_GET['type'];
	}
		
	# date
	if(empty($_POST["date"])) {
		$pass = false;
	} else {
		$date = $_POST['d'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{2} [A-Z]{1}[a-z]{2}, [0-9]{2}$/", $date)) {
			$pass = false;
			$dateError = "Example of correct format: 04 Feb, 16";
		} else {
			$pass &= true;
			# date conversion
			$date = date("Y-m-d", strtotime(str_replace(",", "", $date)));
		}
	}
	
	# check if all data is valid to input
	if($pass) {
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
		# mysql queries to insert relavent data to the company to the database
		switch($type) {
			case 'date':
				$query = "UPDATE timeline SET event_desc = '$eve', date = '$date', time = '$time', venue = '$venue' WHERE event_id = $id";
				break;
			
			case 'ctc':
				$query = "UPDATE company SET package = '$eve', date = '$date', time = '$time', venue = '$venue' WHERE event_id = $id";
		}
		
		# execute the mysql queries
		if(mysqli_query($conn, $query) == true) {
			# new item added successfully
			echo json_encode(array("auth" => "true"));
		} else {
			# registration unsuccessful
		}
	} else {
		# oupt the error in json format
		echo json_encode(
			array(
				"auth" => "false",
				"eve" => $eve,
				"eveError" => $eveError,
				"date" => $date,
				"dateError" => $dateError,
				"venue" => $venue,
				"venueError" => $venueError,
				"time" => $time,
				"timeError" => $timeError
			)
		);
	}
?>