<?php
	# is the user logged in?
	session_start();
	if(!empty($_SESSION['username'])) {
?>
<html>

	<head>

		<!-- meta characters to be inserted to increase searching -->
		<meta charset="utf-8">
		<title>PAP | Login</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Latest complied and minified JQuery -->
        <script src="bootstrap/jquery-2.1.3.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="../style.css">
        
        <!-- link icon file to html page -->
        <link rel="shortcut icon" href="../images/logo.ico">
    
	</head>

	<body>
    	
        <!-- background image -->
        <div class="body2"></div>
        
    	<div>
			<form method="post" action="/" id="error">

<?php
		$pass = True;
	
		# obtain form data
		$name = $_POST['Name'];
		$email = $_POST['email'];
		$userType = $_POST['userType'];
		$username = $_POST['username'];
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
				$passwordError = "Only numbers,characters allowed";
		}else {
				$pass = True;
			}
		}
			
		if($cpass != $password) {
				echo "<input type='hidden' name='password' value='error' />";
				$pass = False;
		}
		
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
			header("Location: /login=");
		} else {
			# registration unsuccessful
			# echo "Not Registered";
		}
?>

			</form>
            
            <div style="margin: 100px auto; text-align: center;">
            	<h2>Loading</h2>
                <img src="../images/loading.gif" alt="Loading" height="30"/>
            </div>
            
            <script>
				$(document).ready(function() {
					$("#form").submit();
				});
            </script>
            
		</div>
	</body>
</html>

<?php
	} else {
		header("Location: /");
	}
?>
