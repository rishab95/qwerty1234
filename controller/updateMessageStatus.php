<?php
	# initialize all variables
	$pass = true;
	$id = "";
	$table = "";
	
	# perform validations and obtain data
	# id
	if(!isset($_GET['id']) || empty($_GET['id']))
		$pass = false;
	else {
		$id = $_GET['id'];
		# check if id is numeric
		if(!preg_match("/^[0-9]{0,5}$/", $table))
			$pass = false;
		else
			$pass &= true;
	}
	
	# table
	if(!isset($_GET["t"]) || empty($_GET["t"]))
		$pass = false;
	else {
		$table = $_GET['t'];
		# check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z][ a-zA-z]*$/", $table))
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
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
		# mysql queries to check for registration in the database table
		$query = "UPDATE $table SET read_status=1 WHERE message_id=$id;";
		
		if($conn->query($query)==true) {
			# registration successful
			echo json_encode(array("auth"=>"true"));
		} else {
			# registration unsuccessful
			echo json_encode(array("auth"=>"false"));
		}
	} else
		# redirect to the coordinator home page
		header("Location: /coordinator/home");
?>
