<?php
	session_start();
	if(!empty($_SESSION['username'])) {
		# check if data to be displayed has been received
		if(isset($_POST['companyId']) && isset($_POST['companyName']) && isset($_POST['message']) && isset($_POST['status']) && isset($_POST['date'])){
			# retireve data from post
			$companyId = explode("#-#", $_POST['companyId']);
			$companyName = explode("#-#", $_POST['companyName']);
			$message = explode("#-#", $_POST['message']);
			$status = explode("#-#", $_POST['status']);
			$date = explode("#-#", $_POST['date']);
?>

<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
        
        <!-- title of the page -->
		<title>PAP | Student | Inbox</title>

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
			# include the header of the page
        	include_once('head.php');
		?>
        
        <!-- background of the page -->
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        	<div class="row">
            	<div class="well well-lg">
                	<!-- table to display the mail -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="3"></th>
                                <th>
                                    <span class="glyphicon glyphicon-time"></span>
                                </th>
                            </tr>
                        </thead>
                        
                        <!-- display all the mail received -->
                        <tbody>
                        <?php
							# loop to display all the data in post
							$c = count($companyId);
							if($c == 0) {
						?>
                        		<tr>
                                	<td colspan="4">No mail for you</td>
                                </tr>
						<?php
							} else {
								for($i=0 ; $i<$c ; $i++) {
                        ?>
                                    <tr onClick="document.location='/student/?p=viewCompanyDetails&id=<?php echo $companyId; ?>';">
                                        <td><?php echo $companyName; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><?php echo $date; ?></td>
                                    </tr>
                        <?php
								}
							}
                        ?>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
		} else
			header("Location: /controller/inbox.php");
	} else {
		header("Location: /");
	}
?>