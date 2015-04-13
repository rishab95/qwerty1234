<?php
	# check if there is any query to search
	if(empty($_GET['q']))
		# redirect to the search page
		header('Location: /?search=');
	else
		# obtain the search query
		$q = $_GET['q'];
		
	# manipulate query to search in the database

	# establish connection to MySQL
	$servername = "localhost";
	$dbusername = "root";
	$dbname = "pap";

	// Create connection
		$conn = new mysqli($servername, $dbusername, "", $dbname);
	// Check connection
	if ($conn->connect_error) {
    	# die("Connection failed: " . $conn->connect_error);
	} else {		
		# initialize the data
		$out = array();
		
		# query to seach in the data base
		$query = "";
		
		# extract data from sql
		if ($result = mysqli_query($conn,$query)){
			while($row = mysqli_fetch_row($result)) {
				array_push($out,
					array(
						'roll' => $row[0],
						'name' => $row[1],
						'email' => $row[2],
						'branch' => $row[3]
					)
				);
			}
		}
		
		# ouput data in JSON format
		echo json_encode($out);
	}
?>