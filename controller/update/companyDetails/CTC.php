<?php
	# initialize all variables
	$pass = true;
	$ctc = "";
	$ctcError = "";
	$id = "";

	# perform validations and obtain data
	# id
	if(empty($_POST['id'])) {
		$pass = false;
	} else {
		$id = $_POST['id'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{0,3}$/", $eve)) {
			$pass = false;
		} else
			$pass &= true;
	}
		
	# ctc
	if(empty($_POST['v'])) {
		$pass = false;
	} else {
		$date = $_POST['v'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{4,7}$/", $date)) {
			$pass = false;
			$dateError = "CTC should be decimal value, Example: 600000";
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
		$query = "UPDATE company SET package = $ctc WHERE id = $id";

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
				"ctc" => $time,
				"ctcError" => $timeError
			)
		);
	}
?>