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
		# obtain the user
		$username = $_SESSION['username'];
		
		# obtain form data
		if(!empty($_POST['desc'])) {
			$desc = $_POST['desc'];
		} else {
			# form not filled correctly	
			echo "<input type='hidden' name='descError' value='Description can not be empty'>";
		}
		if(!empty($_POST['from'])) {
			$desc = $_POST['from'];
		} else {
			# form not filled correctly	
			echo "<input type='hidden' name='fromError' value='From can not be empty'>";
		}
		if(!empty($_POST['to'])) {
			$desc = $_POST['to'];
		} else {
			# form not filled correctly	
			echo "<input type='hidden' name='toError' value='To can not be empty'>";
		}
		
		# perform validations
		if (empty($_POST["desc"])) {
			# invalid data
		}
		# validate date
		
		# data conversion because of quotes in description
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
		# mysql queries to check for registration in the database table
		# $query = "";
	
		if($conn->query($query)==True) {
			# data successfully entered
			header("Location: /student/?p=profile");
		} else {
			# data not entered
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
