<?php
	session_start();
	if(!empty($_SESSION['username'])) {
					
		# process data before display
		if(!empty($_POST)) {
			if(isset($_POST['company']) && isset($_POST['event']) && isset($_POST['venue']) && isset($_POST['date']) && isset($_POST['time']) ) {
				$company = explode("#-#", $_POST['company']);
				$event = explode("#-#", $_POST['event']);
				$venue = explode("#-#", $_POST['venue']);
				$date = explode("#-#", $_POST['date']);
				$time = explode("#-#", $_POST['time']);
?>
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
			# include the header file for interface
        	include_once('head.php');
		?>
        
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        	<div class="row">
				<table class="table table-striped">
                  
                	<thead>
                    	<tr>
                            <th>Company Name</th>
                            <th>Event</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    
                    <tbody>
				<?php
					foreach (($company as $c) && ($venue as $v) && ($event as $e) && ($date as $d) && ($time as $t)) {
                ?>
                            <tr>
                                <td><?php echo $c; ?></td>
                                <td><?php echo $e; ?></td>
                                <td><?php echo $v; ?></td>
                                <td><?php echo $d; ?></td>
                                <td><?php echo $t; ?></td>
                            </tr>
				<?php
					}
                ?>
                    </tbody>
                </table>
			</div>
		</div>

        <script>
			$(document).ready(function() {
			    $('.table tr').click(function(event) {
			        // select value and forward to the mail mail page
			    });
			});
		</script>

	</body>
</html>
<?php
			} else {
				# use of REST client	
			}
		} else {
			# unauthorized access
			header("Location: /controller/viewEvent.php?t="+$page);
		}
	} else {
		header("Location: /");
	}
?>