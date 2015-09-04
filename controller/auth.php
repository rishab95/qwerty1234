<?php
	# obtain data afrom session
	$username = $_SESSION['username'];
	$type = $_SESSION['type'];
	
	# establish connection to database
	$servername="localhost";
	$dbname="pap";
	$conn = mysqli_connect($servername, "root", "", $dbname);
	if (!$conn) {
			#die("Connection failed"); #mysqli_error()
	} else {
		# default for auth
		$auth = False;
		
		# initialize query
		$query = "select user_type from auth where username = $username LIMIT 1;";
		$result = $conn->query($query);
		
		# check result
		if($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			if($row['user_type'] == $type) {
				# username and type match
				$auth = True;
			} else
				# username and type do not match
				$auth = False;
		} else {
			$auth = False;
			# code injection has occured
		}
		# oupt the authentication status	
		$out = array(
			"auth" => $auth,
		);
		echo json_encode($out);
	}
?>