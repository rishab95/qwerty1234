<?php
	if(!empty($_POST)) {
		
		$servername="localhost";
		
		# check is variables exist
		if(!empty($_POST['username']))
			$username = $_POST['username'];
		else
			header('Location: /');
		if(!empty($_POST['password']))
			$password = $_POST['password'];
		else
			header('Location: /');
		if(!empty($_POST['userType']))
			$userType = $_POST['userType'];
		else
			header('Location: /');
		
		# password conversion
		$password = md5($password);
		
		# establish connection to database
		$dbname="pap";
		$conn = mysqli_connect($servername, "root", "", $dbname);
		if (!$conn) {
				#die("Connection failed"); #mysqli_error()
		}

		$auth = False;
		
		# initialize query
		$query = "select password from auth where username='$username' && user_type='$userType';";
		$result = $conn->query($query);
		
		# check result
		if($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			if($row['password'] == $password) {
				$auth=True;
			} else
				$auth=False;
		} else {
			$auth = False;
			if($result->num_rows < 1) {
				# pass_word not found
			} else if($result->num_rows > 1) {
				# code injection has occured
			} else {
				#	
			}
		}
				
		if($auth == True) {
			# create session and redirect to user's home page
			session_start();
			$_SESSION['username'] = $username;
			header('Location: /student/');
		} else if($auth == False) {
			# redirect to login interface
			header('Location: /?auth=false');
		}
	} else {
		# direct access attempted
		header('Location: /');
	}
?>