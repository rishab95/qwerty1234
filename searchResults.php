<?php
	# check if there is a query for search
	if(empty($_GET['q']))
		header("Location: /?search=");
	else
		$q = $_GET['q'];
	
	# check if the incoming post data is correct
	if( empty($_POST['search']) || $_POST['search']!=1 || !isset($_POST['roll']) || !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['branch']))
		# controller for search results has not been called
		header("Location: /controller/search.php?q=$q");
	else {
		# check for search results
		$empty = false;
		$roll = $name = $email = $branch = "";
		if(empty($_POST['roll']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['branch'])) {
			$empty = true;	
		} else {
			# obtain data for search results after conversion
			$roll = explode("#-#", $_POST['roll']);
			$name = explode("#-#", $_POST['name']);
			$email = explode("#-#", $_POST['email']);
			$branch = explode("#-#", $_POST['branch']);
		}
		
		# check if the request is ajax
		if(empty($_GET['ajax'])) {
?>

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
            	<div id="searchResult">
<?php
		}
?>
                	<table class="table table-striped">
	                	<thead>
		                	<tr>
			                	<th>Roll Number</th>
	        	                <th>Name</th>
	                            <th>E-mail</th>
	            	            <th>Branch</th>
	                	    </tr>
	                    </thead>
	                    
	                    <tbody>
<?php
		$c = count($roll);
		for($i=0; $i<$c ; $i++) {
?>                        	
	                        <tr>
	                            <td><?php echo $roll[$i] ?></td>
	                            <td><?php echo $name[$i] ?></td>
	                            <td><?php echo $email[$i] ?></td>
	                            <td><?php echo $branch[$i] ?></td>
	                        </tr>
<?php
		}
?>
	                    </tbody>
	                </table>
<?php
		if(empty($_GET['ajax'])) {
?>
                </div>
        	</div>
        </div>
	</body>
</html>

<?php
		}
	}
?>