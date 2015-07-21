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
	if(empty($_GET["eve"])) {
		$pass = false;
		$eveError = "Event Description is required";
	} else {
		$eve = $_GET['eve'];
		# check that it contains legitimate characters
		if (!preg_match("/^[a-zA-Z][ a-zA-z,.-_]*$/", $eve)) {
			$pass = false;
			$nameError = "Only letters and white space allowed";
		} else
			$pass &= true;
	}
	
	# date
	if(!isset($_GET["d"])) {
		$pass = false;
	} else {
		if(!empty($_GET['d'])) {
			$date = $_GET['d'];
			# check that it contains legitimate characters
			if (!preg_match("/^[0-9]{2} [A-Z]{1}[a-z]{2}, [0-9]{2}$/", $date)) {
				$pass = false;
				$dateError = "Example of correct format: 04 Feb, 16";
			} else {
				$pass &= true;
				# date conversion
				$date = date("Y-m-d", strtotime(str_replace(",", "", $date)));
			}
		} else
			$pass &= true;
	}
	
	# venue
	if(!isset($_GET["v"])) {
		$pass = false;
	} else {
		if(!empty($_GET['v'])) {
			$venue = $_GET['v'];
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
	if(!isset($_GET["t"])) {
		$pass = false;
	} else {
		if(!empty($_GET['t'])) {
			$time = $_GET['t'];
			$time = str_replace("h", "", $time);
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
	if($pass) {
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
		# mysql queries to insert relavent data to the company to the database
		$query = "UPDATE timeline set event_desc = '$eve', date = '$date', time = '$time', venue = '$venue' WHERE event_id = $id";
		
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