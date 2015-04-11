<html>
	<head>

		<!-- meta characters to be inserted to increase searching -->
		<meta charset="utf-8">
		<title>PAP | Search</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Latest complied and minified JQuery -->
        <script src="bootstrap/jquery-2.1.3.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="style.css">
    
	</head>

	<body>
    
	    <?php
			# include the header for this interface file
        	include_once('head.php');
		?>

		<!-- background for the page -->
        <div class="body2"></div>
		
        <!-- main body container -->
        <div class="container">
        	<div class="well well-lg">
            	<!-- div to display the search results -->
            	<div id="searchResult"></div>
        	</div>
        </div>
        
		<script>
			// use ajax to populate the the search results
			$(document).ready(function() {
				$.get("searchResult.php?ajax=1&q=<?php echo $search ?>", function($response) {
					$('#searchResult').html($response);
				});
			});
		</script>
        
	</body>
</html>