<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | <?php echo $page; ?></title>

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
        
		<div class="container">
        	<div class="row">

			</div>
		</div>
        

        <script>
			$(document).ready(function() {
			    $('.table tr').click(function(event) {
			        if (event.target.type !== 'radio') {
			            $(':radio', this).trigger('click');
	        		}
			    });
			});
		</script>

	</body>
</html>
