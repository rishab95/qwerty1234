<?php
	session_start();
	if(!empty($_SESSION['username'])) {
?>

<html>

	<head>

		<!-- meta characters to be inserted to increase searching -->
		<meta charset="utf-8">

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
	# obtain username
	$username = $_SESSION['username'];
	
	# establish connection to MySQL
		$servername = "localhost";
		$dbname = "pap";

	// Create connection
		$conn = new mysqli($servername, "root", "", $dbname);
	// Check connection
	if ($conn->connect_error) {
    	# die("Connection failed: " . $conn->connect_error);
	} else {
		$query = "SELECT username, name, branch, cgpa FROM student WHERE username IN SELECT username FROM stu_eligible WHERE
				'company_id'='$username' AND applied=1;";		
		$roll = array();
		$name = array();
		$branch = array();
		$cgpa = array();
		
		if ($result=mysqli_query($conn,$query)){
		while($rows=mysqli_fetch_row($result))
		 {
			$roll->append($row[0]);
			$name->append($row[1]);
			$branch->append($row[2]);
			$cgpa->append($row[3]);
			}
		}
		# convert data for sending
		$roll = implode("#-#", $roll);
		$name = implode("#-#", $name);
		$branch = implode("#-#", $branch);
		$cgpa = implode("#-#", $cgpa);
?>
			<form method="post" action="/company/?p=<?php echo $link; ?>">
            	<input type="hidden" name="roll" value="<?php echo $roll; ?>" />
                <input type="hidden" name="name" value="<?php echo $name; ?>" />
                <input type="hidden" name="branch" value="<?php echo $branch; ?>" />
                <input type="hidden" name="cgpa" value="<?php echo $cgpa; ?>" />
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
		}
	} else {
		header("Location: /");
	}
?>