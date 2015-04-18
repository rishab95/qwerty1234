<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in correctly
	if(!empty($_SESSION['username'])) {
		# obtain the user
		$username = $_SESSION['username'];
		
		# obtain form data
		if(!empty($_POST['language']))
			$desc = $_POST['language'];
		else
			# form not filled correctly	
			echo "<input type='hidden' name='languageError' value='Please mention the name of the language'>";
		if(!empty($_POST['understand']))
			$desc = $_POST['understand'];
		else
			# form not filled correctly	
			echo "<input type='hidden' name='understandError' value='Do you understnad it?'>";
		if(!empty($_POST['speak']))
			$desc = $_POST['speak'];
		else
			# form not filled correctly	
			echo "<input type='hidden' name='speakError' value='Do know how to speak it?'>";
		if(!empty($_POST['read']))
			$desc = $_POST['read'];
		else
			# form not filled correctly	
			echo "<input type='hidden' name='readError' value='Can you read it?'>";
		if(!empty($_POST['write']))
			$desc = $_POST['write'];
		else
			# form not filled correctly	
			echo "<input type='hidden' name='writeError' value='Can you write it?'>";
		
		# perform validations
		
		# data conversion because of quotes and boolean data conversion
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			# die("connection failed") mysql_error()
		} else {			
			$query = "INSERT INTO student_language VALUES ($username, '$language', $understand, $read, $write, $speak);";
		
			if($conn->query($query)==True) {
				# data successfully entered
				header("Location: /student/?p=profile");
			} else {
				# data not entered
			}
		}
	} else {
		header("Location: /");
	}
?>