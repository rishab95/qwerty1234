<?php
	# obtain data from get
	$q = "";
	if(isset($_GET['q'])) {
		if(empty($_GET['q']))
			$q = "%";
		else
			$q = $_GET['q'];
	}
	
	#convert query from search for search in MySQL
	str_replace(" ", "%", $q);
	$q = "%$q%";
	
	# establish connection to database
	$servername="localhost";
	$dbname="pap";
	$conn = mysqli_connect($servername, "root", "", $dbname);
	if (!$conn) {
			#die("Connection failed"); #mysqli_error()
	} else {
		# initialize query
		$query = "SELECT username, name FROM auth WHERE user_type='coordinator' AND name like '$q' LIMIT 5;";
		$result = $conn->query($query);
		
		# initialize the output variable
		$out = array();
		
		# get the results
		if($result->num_rows > 0) {
			while($row = mysqli_fetch_row($result)) {
				array_push($out,
					array(
						'username' => $row[0],
						'name' => $row[1]
					)
				);
			}
		}
		
		# output the search results
		echo json_encode($out);
	}
?>