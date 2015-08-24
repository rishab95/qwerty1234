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
		if (!preg_match("/^[0-9]{0,3}$/", $id)) {
			$pass = false;
		} else
			$pass &= true;
	}
		
	# ctc
	if(empty($_POST['ctc'])) {
		$pass = false;
		$ctcError = "CTC should not be empty";
	} else {
		$ctc = $_POST['ctc'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{5,7}$/", $ctc)) {
			$pass = false;
			$ctcError = "CTC should be a number, Example: 650000";
		} else
			$pass &= true;
	}
	
	# check if all data is valid to input
	if($pass) {
		# initialize MySQL connection
		include_once("../../sqlConnectionData.php");
		$conn = mysqli_connect($serverName , $sqlUsername , $sqlPassword , $dbName);
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
		# mysql queries to insert relavent data to the company to the database
		$query = "UPDATE company SET package = $ctc WHERE company_id = $id;";
		# execute the mysql queries
		if(mysqli_query($conn, $query) == true) {
			# new item updated successfully
			echo json_encode(array("auth" => "true"));
		} else {
			# updation unsuccessful
		}
	} else {
		# oupt the error in json format
		echo json_encode(
			array(
				"auth" => "false",
				"ctc" => $ctc,
				"ctcError" => $ctcError
			)
		);
	}
?>