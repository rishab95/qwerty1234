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

<?php
	# check for type of operation
	if(empty($_GET['q']))
		# redirect to the search page
		header('Location: /?search=');
	else
		# obtain the search query
		$q = $_GET['q'];
		
	# manipulate query to search in the database

	# establish connection to MySQL
		$servername = "localhost";
		$dbusername = "root";
		$dbname = "pap";

	// Create connection
		$conn = new mysqli($servername, $dbusername, "", $dbname);
	// Check connection
	if ($conn->connect_error) {
    	# die("Connection failed: " . $conn->connect_error);
	} 
	
	# initialize the data
	$company = array();
	$event = array();
	$venue = array();
	$date = array();
	$time=array();
	
	# query to seach in the data base
	$query = "";
			
	if ($result=mysqli_query($conn,$query)){
		while($rows=mysqli_fetch_row($result)) {
			$roll.append($row[0]);
			$name.append($row[1]);
			$email.append($row[2]);
			$branch.append($row[3]);
		}
	}
	# convert data for sending
	$roll = implode("#-#", $roll);
	$name = implode("#-#", $name);
	$email = implode("#-#", $email);
	$branch = implode("#-#", $branch);
?>
			<form method="post" action="/student/?p=<?php echo $link; ?>">
            	<input type="hidden" name="roll" value="<?php echo $company; ?>" />
                <input type="hidden" name="name" value="<?php echo $event; ?>" />
                <input type="hidden" name="email" value="<?php echo $venue; ?>" />
                <input type="hidden" name="branch" value="<?php echo $date; ?>" />
     		</form>
            
            <!-- display that the page is loading -->
            <div style="margin: 100px auto; text-align: center;">
            	<h2>Loading</h2>
                <img src="../images/loading.gif" alt="Loading" height="30"/>
            </div>
            
            <!-- script to submit form as soon as it is created -->
            <script>
				$(document).ready(function() {
					$("#form").submit();
				});
            </script>
            
		</div>
	</body>
</html>