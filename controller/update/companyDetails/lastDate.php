<?php
	# initialize all variables
	$pass = true;
	$lastDate = "";
	$lastDateError = "";
	$id = "";

	# perform validations and obtain data
	# id
	if(empty($_POST['id'])) {
		$pass = false;
	} else {
		$id = $_POST['id'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{0,3}$/", $id)) {
			$pass = false;
		} else
			$pass &= true;
	}
		
	# lastDate
	if(empty($_POST['date'])) {
		$pass = false;
		$lastDateError = "Date should not be empty";
	} else {
		$lastDate = $_POST['date'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{4}-(0[0-9]|1[0-2]|[0-9])-([0-2][0-9]|3[0-1]|[0-9])$/", $lastDate)) {
			$pass = false;
			$lastDateError = "Incorrect format of the date";
		} else
			$pass &= true;
	}
	
	# convert date to sql format
	$lastDate = str_replace('-', '//', $lastDate);
	
	# check if all data is valid to input
	if($pass) {
		# initialize MySQL connection
		include_once("../../sqlConnectionData.php");
		$conn = mysqli_connect($serverName , $sqlUsername , $sqlPassword , $dbName);
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
		# mysql queries to insert relavent data to the company to the database
		$query = "UPDATE company SET last_date = '$lastDate' WHERE company_id = $id;";
		
		# execute the mysql queries
		if(mysqli_query($conn, $query) == true) {
			# new item updated successfully
			echo json_encode(array("auth" => "true"));
		} else {
			# updation unsuccessful
			echo json_encode(array("auth" => "false"));
		}
	} else {
		# oupt the error in json format
		echo json_encode(
			array(
				"auth" => "false",
				"lastDate" => $lastDate,
				"lastDateError" => $lastDateError
			)
		);
	}
?>