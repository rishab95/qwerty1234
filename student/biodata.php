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

<html lang="en">

	<head>
		<title>Personal Details</title>
		
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
		
		<!-- link icon file to html page -->
        <link rel="shortcut icon" href="images/logo.ico">
        
        <!-- Custom common JQuery file -->
        <script src="../ess.js"></script>
	</head>
<body>
	        <?php
        	include_once('head.php');
			?>
		
	
	<div class="body1"></div>
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
		
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h5>Username</h5>
                                </div>
								
								<div class="panel-body">
									<div class="form-inline">
										<center>
											<div class="form-group">
												<input class="form-control" name="username" type="number" placeholder="Username"/>
											</div>
										</center>
									</div>
								</div>	
							</div>
						</div>
				
						<div class="col-md-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Year Of Pass</h5>
								</div>
											
									<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<input class="form-control" name="yearofpass" type="number" placeholder="Year of Pass"/>
												</div>
											</center>
										</div>
									</div>	
							</div>
						</div>
						
					
				
						
						<div class="col-md-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Branch</h5>
								</div>
											
									<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<input class="form-control" name="branch" type="string" placeholder="Branch"/>
												</div>
											</center>
										</div>
									</div>	
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Date Of Birth</h5>
								</div>
											
									<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<input class="form-control" name="DOB" type="date" placeholder="Dob (yyyy-mm-dd)"/>
												</div>
											</center>
										</div>
									</div>	
							</div>
						</div>
						
						
						
						
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Temporary Address</h5>
								</div>
											
									<div class="panel-body">
										<div class="form-group">
											<textarea class="form-control " name="Address" maxlength='100' rows='3' type="text" id="text" placeholder="Address" class="tadd"></textarea>
										</div>
									</div>	
							</div>
						</div>
						
						
						
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Permanent Address</h5>
								</div>
											
									<div class="panel-body">
										<div class="form-group">
											<textarea class="form-control " name="Address" maxlength='100' rows='3' type="text" id="text" placeholder="Address" class="tadd"/></textarea>
										</div>
									</div>	
							</div>
						</div>	
						
						<div class="col-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Pin</h5>
								</div>
								<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<textarea class="form-control " name="Address" maxlength='6' rows='1' type="text" id="text" placeholder="Address" class="tadd"/></textarea>
												</div>
											</center>
										</div>
								</div>	
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>City</h5>
								</div>
								<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<textarea class="form-control " name="Address" maxlength='6' rows='1' type="text" id="text" placeholder="Address" class="tadd"/></textarea>
												</div>
											</center>
										</div>
								</div>	
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>State</h5>
								</div>
								<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<textarea class="form-control " name="Address" maxlength='6' rows='1' type="text" id="text" placeholder="Address" class="tadd"/></textarea>
												</div>
											</center>
										</div>
								</div>	
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Pin</h5>
								</div>
								<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<textarea class="form-control " name="pin" maxlength='6' rows='1' type="text" id="text" placeholder="Pin" class="tadd"/></textarea>
												</div>
											</center>
										</div>
								</div>	
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>City</h5>
								</div>
								<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<textarea class="form-control " name="City" maxlength='6' rows='1' type="text" id="text" placeholder="City" class="tadd"/></textarea>
												</div>
											</center>
										</div>
								</div>	
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>State</h5>
								</div>
								<div class="panel-body">
										<div class="form-inline">
											<center>
												<div class="form-group">
													<textarea class="form-control " name="State" maxlength='6' rows='1' type="text" id="text" placeholder="State" class="tadd"/></textarea>
												</div>
											</center>
										</div>
								</div>	
							</div>
						</div>
						
						

						
					</div>
				</div>
			</div>
					
						
								
								
									
									
									<button type="button" class="btn btn-primary">Submit</button>
						
			
		</form>
</body>
</html>
