<?php
	# initialize all variables
	$pass = true;
	$id = "";
	
	# perform validations and obtain data
	# id
	if(empty($_POST['id']))
		$pass = false;
	else {
		$id = $_POST['id'];
		# check if id is numeric
		if(!preg_match("/^[0-9]{0,6}$/", $id))
			$pass = false;
		else
			$pass &= true;
	}
	
	# check if all data is valid to input
	if($pass) {
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if($conn) {
			# mysql queries to check for registration in the database table
			$query = "DELETE FROM timeline WHERE event_id = $id;";
			
			if($conn->query($query)==true)
				# registration successful
				echo json_encode(array("auth"=>"true"));
			else
				# registration unsuccessful
				echo json_encode(array("auth"=>"false"));
		} else {
			# connection not established
		}
	} else {
		# redirect to the coordinator home page
		session_destroy();
		header("Location: /coordinator/home");
	}
?>
