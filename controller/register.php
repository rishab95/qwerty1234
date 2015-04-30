<?php
	# initialize all variables
	$pass = true;
	$name = "";
	$nameError = "";
	$email = "";
	$emailError = "";
	$username = "";
	$usernameError = "";
	$password = "";
	$passwordError = "";
	$cpass = "";
	$cpassError = "";
	
	# perform validations and obtain data
	# Name
	if(!isset($_POST["Name"]) || empty($_POST["Name"])) {
		$pass = false;
		$nameError = "Name is required";
	} else {
		$name = $_POST['Name'];
		# check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z][ a-zA-z]*$/", $name)) {
			$pass = false;
			$nameError = "Only letters and white space allowed";
		} else
			$pass &= true;
	}
	
	# email
	if(!isset($_POST['email']) || empty($_POST["email"])) {
		$pass = false;
		$emailError = "Email is required";
	} else {
		$email = $_POST['email'];
		# check if e-mail address syntax is valid
		if (!preg_match('/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}$/', $email)) {
			$pass = false;
			$emailError = "Invalid email format, Example: name@service.dom";
		} else
			$pass &= true;
	}
		
	# validate username
	if (!isset($_POST['username']) && empty($_POST["username"])) {
		$pass = false;
		$usernameError = "Roll Number is required";
	} else {
		$username = $_POST['username'];
		# check name only contains letters and whitespace
		if (!preg_match("/^[0-9]{9}$/", $username)) {
			$pass &= false;
			$usernameError = "Roll Number is always numeric";
		} else
			$pass &= true;
	}
	
	# validate password
	if (empty($_POST["password"])) {
		$pass = false;
		$passwordError = "Password is required";
	} else {
		$password = $_POST['password'];
		$cpass = $_POST['cpassword'];
	}
		
	# check if all data is valid to input
	if($pass) {
		# password conversion
		$password = md5($password);
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
		# mysql queries to check for registration in the database table
		$query = "INSERT INTO auth(username, password, user_type, name, email) VALUES ($username, '$password', 'student', '$name', '$email');";
		
		if($conn->query($query)==true) {
			# registration successful
			echo json_encode(array("auth"=>"true"));
		} else {
			# registration unsuccessful
			# echo "Not Registered";
		}
	} else {
		# oupt the error in json format
		echo json_encode(
			array(
				"auth" => "false",
				"name" => $name,
				"nameError" => $nameError,
				"email" => $email,
				"emailError" => $emailError,
				"username" => $username,
				"usernameError" => $usernameError,
				"passwordError" => $passwordError,
				"cpasswordError" => $cpassError
			)
		);
	}
?>
