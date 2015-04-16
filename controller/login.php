<?php
	echo "here";
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		# password conversion
		$password = md5($password);
		
		# establish connection to database
		$servername="localhost";
		$dbname="pap";
		$conn = mysqli_connect($servername, "root", "", $dbname);
		if (!$conn) {
				#die("Connection failed"); #mysqli_error()
		} else {
			$auth = False;
			
			# initialize query
			$query = "select password from auth where username = $username;";
			$result = $conn->query($query);
			
			# check result
			if($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				if($row['password'] == $password) {
					$auth = True;
				} else
					# password does not match
					$auth = False;
			} else {
				$auth = False;
				if($result->num_rows < 1) {
					# password not found
				} else {
					# code injection has occured
				}
			}
					
			if($auth == True) {
				# create session and redirect to user's home page
				session_start();
				$_SESSION['username'] = $username;
				header('Location: /student/');
			} else if($auth == False) {
				# redirect to login interface
				header('Location: /login?auth=false');
			}
		}
	} else {
		# direct access attempted
		header('Location: /login');
	}
?>