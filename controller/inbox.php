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
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Latest complied and minified JQuery -->
        <script src="../bootstrap/jquery-2.1.3.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="../style.css">
        
        <!-- link icon file to html page -->
        <link rel="shortcut icon" href="../images/logo.ico">
        
        <!-- script to submit the form on document ready -->
        <script>
			$(document).ready(function() {
				$('#dataForm').submit();
            });
		</script>
    
	</head>

	<body>
    
        <!-- background image -->
        <div class="body2"></div>
        
<?php
	
	$username = $_SESSION['username'];
	
	# obtain data from sql
	# initialize MySQL connection
	$servername="localhost";
	$dbname = "pap";
	$conn = mysqli_connect($servername , "root" , "" , $dbname);
	if(!$conn){
		#die("connection failed") mysql_error()
	}
	
	# initialize the output variables
	$companyId = array();
	$companyName = array();
	$message = array();
	$status = array();
	$date = array();
	
	# mysql query to retrieve inbox data for $username
	$query = "SELECT c.company_id, c.company_name, c.company_profile, se.applied, c.last_date
				FROM company c, stu_eligible se;
				WHERE c.company_id IN SELECT company_id FROM stu_eligible WHERE username = '$username'
				AND c.company_id = se.company_id;";
	
	if ($result=mysqli_query($conn,$query)) {
		while($rows=mysqli_fetch_row($result)) {
			$companyId.append($row[0]);
			$companyName.append($row[1]);
			$message.append($row[2]); 
			# convert status value to string
			$status.append(($row[3]==1)?"Applied":"Not Applied");
			# convert date in format and then attach to array [4 Aug]
			$date.append(date("d M", strtotime($row[4])));
		}
	}
	
	# coversion of data to string for transfer over post
	$companyId = implode("#-#", $companyId);
	$companyName = implode("#-#", $companyName);
	$message = implode("#-#", $message);
	$status = implode("#-#", $status);
	$date = implode("#-#", $date);
	
	# conversion of companyId by symmetric cipher
?>
	
    	<div>
        	<!-- transfer data over post -->
			<form id="dataForm" method="post" action="/">
            	<input type="hidden" name="companyId" value="<?php echo $companyId; ?>">
				<input type="hidden" name="companyName" value="<?php echo $companyName; ?>" />
                <input type="hidden" name="message" value="<?php echo $message; ?>" />
                <input type="hidden" name="status" value="<?php echo $status; ?>" />
                <input type="hidden" name="date" value="<?php echo $date; ?>" />
			</form>
            
            <!-- icon for loading -->
            <div style="margin: 100px auto; text-align: center;">
            	<h2>Loading</h2>
                <img src="../images/loading.gif" alt="Loading" height="30"/>
            </div>     
		</div>
	</body>
</html>

<?php
	} else {
		header("Location: /");
	}
?>