<?php
	# initialize all variables
	$pass = True;
	$name = "";
	$nameError = "";
	$email = "";
	$emailError = "";
	$userType = "";
	$userTypeError = "";
	$username = "";
	$usernameError = "";
	$password = "";
	$passwordError = "";
	$cpass = "";
	$cpassError = "";
	
	# perform validations and obtain data
	# Name
	if(!isset($_POST["Name"]) && empty($_POST["Name"])) {
		$pass = False;
		$nameError = "Name is required";
	} else {
		$name = $_POST['Name'];
		# check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z][ a-zA-z]*$/", $name)) {
			$pass = False;
			$nameError = "Only letters and white space allowed";
		} else
			$pass &= True;
	}
	
	# email
	if(!isset($_POST['email']) && empty($_POST["email"])) {
		$pass = False;
		$emailError = "Email is required";
	} else {
		$email = $_POST['email'];
		# check if e-mail address syntax is valid
		if (!preg_match('/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}$/', $email)) {
			$pass = False;
			$emailError = "Invalid email format, Example: name@service.dom";
		} else
			$pass &= True;
	}
	
	# validate user type
	if(!isset($_POST['userType']) && empty($_POST['userType'])) {
		$pass = False;
		$userTypeError = "User type is required";
	} else {
		$userType = $_POST['userType'];
		# check if the value of user type is from list
		if(!preg_match('/student|coordinator/', $userType)) {
			$pass = False;
			$userTypeError = "Value not from the list";
		} else
			$pass &= True;
	}
	
	# validate username
	if (!isset($_POST['username']) && empty($_POST["username"])) {
		$pass = False;
		$usernameError = "Username is required";
	} else {
		$username = $_POST['username'];
		# check name only contains letters and whitespace
		if (!preg_match("/^[0..9]{9}$/",$name)) {
			$pass &= False;
			$usernameError = "Only numbers allowed";
		} else
			$pass &= True;
	}
	
	# validate password
	if (empty($_POST["password"])) {
		$pass = False;
		$passwordError = "Password is required";
	} else {
		$password = $_POST['password'];
		$cpass = $_POST['cpassword'];
		
		# perform validations
		if (empty($_POST["name"])) {
			$pass = False;
			$nameError = "Name is required";
		} else {
			#$name = test_input($name);
			// check name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z][ a-zA-z]*$/", $name)) {
				$pass=False;
				$nameError = "Only letters and white space allowed";
			} else {
				$pass = True;	
			}
		}
			
		if (empty($_POST["email"])) {
			$pass = False;
			$emailError = "Email is required";
			}
		else {
			#$email = test_input($email);
			// check if e-mail address syntax is valid or not
			if (!preg_match('/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}$/',$email)) {
				$pass=False;
				$emailError = "Invalid email format";
		}else {
				$pass = True;
			}
		}
		
		if (empty($_POST["username"])) {
			$pass = False;
			$usernameError = "Username is required";
			}
		else {
			#$username = test_input($username);
			// check name only contains letters and whitespace
			if (!preg_match("/^[0..9]{9}$/",$name)) {
				$pass=False;
				$usernameError = "Only numbers allowed";
		}else {
				$pass = True;}
		}
	
		if (empty($_POST["password"])) {
			$pass = False;
			$passwordError = "Password is required";
			}
		else {
			#$password = test_input($password);
			// check name only contains letters and whitespace
			if (!preg_match("/^(?=.*\d)[0-9A-Za-z!@#$%*]{6,}$/",$password)) {
				$pass=False;
				$passwordError = "Only numbers,characters allowed";
		}else {
				$pass = True;
			}
		}
			
		if($cpass != $password) {
			$pass = False;
			$cpassError = "Password and Confirm Password do not match";
		} else
			$pass &= True;
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
		$query = "INSERT INTO auth(username, password, user_type, name, email) VALUES ($username, '$password', '$userType', '$name', '$email');";
		
		if($conn->query($query)==True) {
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
				"name" => $nameError,
				"email" => $emailError,
				"userType" => $userTypeError,
				"username" => $usernameError,
				"password" => $passwordError,
				"cpassword" => $cpassError
			)
		);
	}
?>
