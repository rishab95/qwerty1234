<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['username'])) {
?>
<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | Timeline</title>

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
        
        <!-- script to use JSON and ajax to view output -->
        <script>
			// ajax call
			$.get("schedule?t=timeline", function(data) {
				$("#eventDiv").html(data);
			});
		</script>
            
	</head>

	<body>
        
        <?php
			# include the header file for interface
        	include_once('head.php');
		?>
        
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        	<div class="row">
            	<div class="col-md-3"></div>
            	<div class="col-md-6">
	            	<div class="well well-lg" id="eventDiv">
						<label>Loading</label>
        	            <div class="progress">
                          	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>

  					</div>
                </div>
                <div class="col-md-3"></div>
			</div>
		</div>
	</body>
</html>
<?php
	} else
		header("Location: /login");
?>