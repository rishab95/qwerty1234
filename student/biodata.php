<?php
	#check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	#authenticate the user to user page
	if(!empty($_SESSION['type'])){
		if($_SESSION['type']=='student'){
			if(!empty($_SESSION['username'])){
				#authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outarr = json_decode($out, true);
				if($outarr['auth'] == "true"){
					
				}
			}
		}
	}
?>

<!IDOCTYPE html>

<html>

	<head>
		<title>Add biodata</title>
		
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
	</head>
<body>
	        <?php
        	include_once('head.php');
			?>
		

	<div class="body2"></div>
        <div class = "container">	
			<form method = "post" action = "biodata.php">
			<div class = "panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12">
							<h3 id="name">Student Biodata Form</h3>
						</div>
					</div>
				</div>
		
			
				<div class = "form group">
				
									<label for = "name"><h5>Username</h5></label>
									<input type = "text" name = "Username" value= ""><br>
									<label for = "name"><h5>Year Of Pass</h5></label>
									<input type = "text" name = "Year Of Pass" value= ""><br>
									<label for = "name"><h5>Branch</h5></label>
									<input type = "text" name = "Branch" value= ""><br>
									<label for = "name"><h5>DOB</h5></label>
									<input type = "text" name = "DOB" value= ""><br>
									<label for = "name"><h5>Citizenship</h5></label>
									<input type = "text" name = "Citizenship" value= ""><br>
									<label for = "name"><h5>Gender</h5></label>
									<input type = "text" name = "Gender" value= ""><br>
									<label for = "name"><h5>Temporary Address</h5></label>
									<input type = "text" name = "Temporary Address" value= ""><br>
									<label for = "name"><h5>Temporary City</h5></label>
									<input type = "text" name = "Temporary City" value= ""><br>
									<label for = "name"><h5>Temporary State</h5></label>
									<input type = "text" name = "Temporary State" value= ""><br>
									<label for = "name"><h5>Temporary Pin</h5></label>
									<input type = "text" name = "Temporary Pin" value= ""><br>
									<label for = "name"><h5>Permanent Address</h5></label>
									<input type = "text" name = "Permanent Address" value= ""><br>
									<label for = "name"><h5>Permanent City</h5></label>
									<input type = "text" name = "Permanent City" value= ""><br>
									<label for = "name"><h5>Permanent State</h5></label>
									<input type = "text" name = "Permanent State" value= ""><br>
									<label for = "name"><h5>Permanent Pin</h5></label>
									<input type = "text" name = "Permanent Pin" value= ""><br>
									<label for = "name"><h5>Father's Name</h5></label>
									<input type = "text" name = "Father's Name" value= ""><br>
									<label for = "name"><h5>Father's Occupation</h5></label>
									<input type = "text" name = "Father's Occupation" value= ""><br>
									<label for = "name"><h5>Mother's Name</h5></label>
									<input type = "text" name = "Mother's Name" value= ""><br>
									<label for = "name"><h5>Mother's Occupation</h5></label>
									<input type = "text" name = "Mother's Occupation" value= ""><br>
									<button type="button" class="btn btn-primary">Submit</button>
						
				</div>
			</div>
		</div>
		</form>
</body>
</html>
