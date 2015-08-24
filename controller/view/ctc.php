<?php
	# check if session is started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(isset($_POST) && isset($_GET)) {
		# obtain the id
		if(!empty($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			# illegal request
		}
		
		# initialize MySQL connection
		include_once("../sqlConnectionData.php");
		$conn = mysqli_connect($serverName , $sqlUsername , $sqlPassword , $dbName);
		if(!$conn){
			# die("connection failed") mysql_error()
		} else {
			# initialize the output variable
			$out = array();
			# mysql query to retrieve the ctc for the company
			$query = "SELECT package FROM company WHERE company_id = $id LIMIT 1;";
			
			# retrieve data from sql
			if ($result = mysqli_query($conn,$query)) {
				if($row = mysqli_fetch_row($result)) {
					 array_push($out,
						array(
							'data' => 'true',
							'ctc' => $row[0]
						)
					);
				} else
					array_push($OUT, array('data' => 'false'));
			} else
				array_push($out, array('data' => 'false'));
			
			# output in jSON format
			echo json_encode($out);
		}
	} else {
		session_destroy();
		header("Location: /");
	}
?>
