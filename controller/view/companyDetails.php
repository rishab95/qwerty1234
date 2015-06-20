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
		# obtain the username
		if(!empty($_POST['username'])) {
			$username = $_POST['username'];
		} else {
			# illegal request
		}
		# obtain the user type
		if(!empty($_POST['type'])) {
			$type = $_POST['type'];
		} else {
			$type = "";
		}
		# obtain the part of information required
		if(!empty($_GET['p'])) {
			$part = $_GET['p'];
		} else {
			$part = "";
		}
		# obtain the view type
		if(!empty($_GET['view'])) {
			$view = $_GET['view'];
		} else {
			$view = "";
		}
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			# die("connection failed") mysql_error()
		} else {
			# initialize the output variable
			$out = array();
			
			switch($part) {
				case 'head':
					if($type=='coordinator') {
						# mysql querie to retrieve the info for head for coordinator
						$query = "SELECT c.company_name, c.dream_status FROM company c, company_coordinator cc WHERE cc.company_id = $id AND cc.company_id = c.company_id AND cc.roll_number = $username LIMIT 1;";
						
						# retrieve data from sql
						if ($result = mysqli_query($conn,$query)) {
							if($row = mysqli_fetch_row($result)) {
								 array_push($out,
									array(
										'data' => 'true',
										'name' => $row[0],
										'status' => $row[1]
									)
								);
							} else
								array_push($OUT, array('data' => 'false'));
						} else
							array_push($out, array('data' => 'false'));
					} else {
						# mysql querie to retrieve the info for head for student
						$query = "SELECT c.company_name, c.dream_status FROM company WHERE company_id = $id LIMIT 1;";
					
						# retrieve data from sql
						if ($result = mysqli_query($conn,$query)) {
							if($row = mysqli_fetch_row($result)) {
								 array_push($out,
									array(
										'data' => 'true',
										'name' => $row[0],
										'status' => $row[1]
									)
								);
							} else 
								array_push($out, array('data' => 'false'));
						} else
							array_push($out, array('data' => 'false'));
					}
					break;
				case 'body':
					# mysql query to retrieve all the information
					$query = "SELECT package, cg_criteria, description FROM company WHERE company_id = $id LIMIT 1;";
					
					# retrieve data from sql
					if ($result = mysqli_query($conn,$query)) {
						if($row = mysqli_fetch_row($result)) {
							 array_push($out,
								array(
									'data' => 'true',
									'package' => $row[0],
									'cg' => $row[1],
									'desc' => $row[2]
								)
							);
						}
						if(empty($out))
							array_push($out, array('data' => 'false'));
					} else
						array_push($out, array('data' => 'false'));
					break;
				case 'lastDate':
					# mysql query to retrieve all the information
					$query = "SELECT last_date FROM company WHERE company_id = $id LIMIT 1;";
					# retrieve data from sql
					if ($result = mysqli_query($conn,$query)) {
						if($row = mysqli_fetch_row($result)) {
							if($row[0] != NULL)
								array_push($out,
									array(
										'data' => 'true',
										'lastDate' => date("d M, Y", strtotime($row[0]))
									)
								);
							else
								array_push($out,
									array(
										'data' => 'true',
										'lastDate' => $row[0]
									)
								);
						}
						if(empty($out))
							array_push($out, array('data' => 'false'));
					} else
						array_push($out, array('data' => 'false'));
					break;
			}
			
			# output in jSON format
			echo json_encode($out);
		}
	} else {
		session_destroy();
		header("Location: /");
	}
?>
