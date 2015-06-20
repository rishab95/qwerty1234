<?php
	header("Location: /coordinator/home");
?>
<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | Home</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        
        <!-- Latest complied and minified JQuery -->
        <script src="../bootstrap/jquery-2.1.3.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="../style.css">
        
        <!-- Custom common JQuery file -->
        <script src="../ess.js"></script>
        
        <!-- script to use JSON and ajax to view output -->
        <script>
			// load the required the page on the body
			$.get("/student/home.php", function(data){ $("#mainContainer").html(data); });
			$("#mainContainer").load("/student/profile.php	");
		</script>
            
	</head>

	<body>
        <?php
			# include the header file for interface
        	include_once('head.php');
		?>
        
        <!-- background for the page -->
        <div class="body2"></div>

		<!-- main body container -->
        <div class="container" id="mainContainer"></div>
	</body>
</html>