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
	$cooUsername = array();

	# perform validations and obtain data
	# name
	if(!isset($_POST["name"]) || empty($_POST["name"])) {
		$pass = false;
		$nameError = "Name is required";
	} else {
		$name = $_POST['name'];
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
	
	# list of coordinators
	if(!isset($_POST['coordinator'])) {
		$pass = false;
	} else {
		$cooUsername = array_unique($_POST['coordinator']);
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

		# generate username for the company
		$username = rand(100, 999);
		# modify username if it exists
		$repeat = false;
		do {
			$query = "SELECT username FROM auth WHERE user_type='company' and username=$username LIMIT 1;";
			if($result = mysqli_query($conn, $query)) {
				if($result->num_rows > 0) {
					$username++;
					$repeat = true;
				} else
					$repeat = false;
			}
		}while($repeat);
		# generate password for the company
		$password = strtolower($name).$username;
		$showPassword = $password;
		
		# password conversion
		$password = md5($password);
		
		# mysql queries to insert relavent data to the company to the database
		$query = "INSERT INTO auth(username, password, user_type, name, email) VALUES ($username, '$password', 'company', '$name', '$email'); INSERT INTO company(company_id, company_name) VALUE($username, '$name');";
		foreach($cooUsername as $user) {
			$query = $query." INSERT INTO company_coordinator(company_id, roll_number) VALUES ($username, $user); INSERT INTO coordinator_msg(receiver, message, date, label) VALUES ($user, '$name is the new company coming to the campus. Please collect the details of the same from me and update the company details.', '".date("Y/m/d")."', 'n');";
		}
		
		# execute the mysql queries
		if($conn->multi_query($query) == true) {
			# registration successful
			echo json_encode(
				array(
					"auth" => "true",
					"username" => $username,
					"password" => $showPassword
				)
			);
		} else {
			# registration unsuccessful
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
				"coordinator" => $cooUsername
			)
		);
	}
?>