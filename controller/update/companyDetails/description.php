<?php
	# initialize all variables
	$pass = true;
	$desc = "";
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
		
	# desc
	if(empty($_POST['desc'])) {
		$pass = false;
	} else {
		$desc = $_POST['desc'];
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
		$query = "UPDATE company SET description = '$desc' WHERE company_id = $id;";
		
		# execute the mysql queries
		if(mysqli_query($conn, $query) == true) {
			# new item updescd successfully
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
				"desc" => $desc
			)
		);
	}
?>