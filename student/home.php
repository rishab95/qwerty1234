<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='student' || $_SESSION['type']=='coordinator') {
			if(!empty($_SESSION['username'])) {
				# authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
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
			var username = <?php echo $_SESSION['username']; ?>
			// ajax call for inbox
			$.post("/ajax/studentInbox.php",
				{username: username},
				function(data) {
					$("#inboxDiv").html(data);
			});
			
			// ajax call for schedule
			$.post("/ajax/studentSchedule?t=schedule",
				{username: username},
				function(data, status) {
					$("#scheduleDiv").html(data);
			});
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
        <div class="container">        
        	<!-- main container for displaying mail -->
	        <div class="col-lg-6">
            	<div class="panel panel-default">
	    	        <div class="panel-heading">
    	               	<h3>Inbox</h3>
   	    		    </div>
                
	                <div class="panel-body" id="inboxDiv">
						<label>Loading</label>
        	            <div class="progress">
                          	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
	                    </div>
            	    </div>
				</div>
            </div>
        
	        <!-- main container for displaying the schedule -->
    	    <div class="col-lg-6">
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Schedule</h3>
                    </div>
                    
                    <div class="panel-body" id="scheduleDiv">
						<label>Loading</label>
        	            <div class="progress">
                          	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
	                    </div>
            	    </div>
				</div>
            </div>
		</div>
	</body>
</html>
<?php
				} else
					header("Location: /login");
			} else {
				# user trying to access other folders
				switch($_SESSION['type']) {
					# user is coordinator
					case 'company':
						header("Location: /company/");
						break;
					case 'admin':
						header("Location: /admin/");
						break;
					default: 
						; # someone trying to play with session variables
				}
			}
		} else
			header("Location: /login");
	} else
		header("Location: /login");
?>