<?php
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

<?php
	# check for type of operation
	if(!empty($_GET['t'])) {
		switch($_GET['t']) {
			case 'schedule':
				# return schedule operation
				$link = "viewSchedule";
				$username = $_SESSION['username'];
				break;
			case 'timeline':
				# return timeline operation
				$link = "viewTimeline";
				break;
			default:
				# retrun timeline operation
				$link = "viewTimeline";
				break;
		}
	}
	

	# establish connection to MySQL
		$servername = "localhost";
		$username = "root";
		$dbname = "pap";

	// Create connection
		$conn = new mysqli($servername, $username, "", $dbname);
	// Check connection
	if ($conn->connect_error) {
    	# die("Connection failed: " . $conn->connect_error);
	} 
	
	$company=array();
	$event=array();
	$venue=array();
	$date=array();
	$time=array();
	$query = "SELECT cd.company_name, s.event_descp, s.venue, s.date, s.time
			FROM schedule s, company cd
			WHERE s.company_id IN SELECT company_id FROM stu_interested WHERE username = '$username'
			AND cd.company_id = s.company_id;";
			
	if ($result=mysqli_query($conn,$query)){
		while($rows=mysqli_fetch_row($result)) {
			$company = $row[0];
			$event = $row[1];
			$venue = $row[2];
			$date = $row[3];
			$time = $row[4];
		}
	}
	# convert data for sending
	$date = implode("#-#", $date);
	$company = implode("#-#", $company);
	$event = implode("#-#", $event);
	$venue = implode("#-#", $venue);
	$time = implode("#-#", $time);
?>
			<form method="post" action="/student/?p=<?php echo $link; ?>">
            	<input type="hidden" name="company" value="<?php echo $company; ?>" />
                <input type="hidden" name="event" value="<?php echo $event; ?>" />
                <input type="hidden" name="venue" value="<?php echo $venue; ?>" />
                <input type="hidden" name="date" value="<?php echo $date; ?>" />
                <input type="hidden" name="time" value="<?php echo $time; ?>" />
     		</form>
            
            <div style="margin: 100px auto; text-align: center;">
            	<h2>Loading</h2>
                <img src="../images/loading.gif" alt="Loading" height="30"/>
            </div>
            <style>
				$(document).ready(function() {
					$("#form").submit();
				});
            </style>
            
		</div>
	</body>
</html>

<?php
	} else {
		header("Location: /");
	}
?>