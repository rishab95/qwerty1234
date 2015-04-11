<?php
#	if(!empty($_SESSION['username'])) {
#		if(!isset($_POST['company'])) {
#			header("Location: /controller/inbox.php");
#		} else {
			# retireve data from post
?>

<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | Company Details</title>

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
            
	</head>

	<body>
        
        <?php
        	include_once('head.php');
		?>
        
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        
        	<div class="row">
            	<div class="col-md-9">
                	<!-- Name of the company -->
                </div>
            	<div class="col-md-3">
                	<a href="resume/">
    	            	<button class="btn btn-group">Apply | View</button>
                    </a>
                </div>
            </div>
            
            <div class="row">
            </div>
            
		</div>

	</body>
</html>

<?php
#		}
#	} else {
#		header("Location: /");
#	}
?>