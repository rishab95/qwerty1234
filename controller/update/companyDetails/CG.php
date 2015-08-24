<?php
	# initialize all variables
	$pass = true;
	$cg = "";
	$cgError = "";
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
		
	# cg
	if(empty($_POST['cg'])) {
		$pass = false;
		$cgError = "CG Criteria should not be empty";
	} else {
		$cg = $_POST['cg'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{0,2}.[0-9]{0,2}$/", $cg)) {
			$pass = false;
			$ctcError = "CG Criteria should be decimal value, Example: 6.5";
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
		$query = "UPDATE company SET cg_criteria = $cg WHERE company_id = $id;";
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
				"ctc" => $ctc,
				"ctcError" => $ctcError
			)
		);
	}
?>