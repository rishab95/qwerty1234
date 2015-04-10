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
		if(!empty($_POST['language'])) {
			$desc = $_POST['language'];
		} else {
			# form not filled correctly	
			echo "<input type='hidden' name='languageError' value='Please mention the name of the language'>";
		}
		if(!empty($_POST['understand'])) {
			$desc = $_POST['understand'];
		} else {
			# form not filled correctly	
			echo "<input type='hidden' name='understandError' value='Do you understnad it?'>";
		}
		if(!empty($_POST['speak'])) {
			$desc = $_POST['speak'];
		} else {
			# form not filled correctly	
			echo "<input type='hidden' name='speakError' value='Do know how to speak it?'>";
		}
		if(!empty($_POST['read'])) {
			$desc = $_POST['read'];
		} else {
			# form not filled correctly	
			echo "<input type='hidden' name='readError' value='Can you read it?'>";
		}
		if(!empty($_POST['write'])) {
			$desc = $_POST['write'];
		} else {
			# form not filled correctly	
			echo "<input type='hidden' name='writeError' value='Can you write it?'>";
		}
		
		# perform validations
		
		# data conversion because of quotes
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
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
