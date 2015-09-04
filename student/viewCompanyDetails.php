<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='student') {
			if(!empty($_SESSION['username'])) {
				$username = $_SESSION['username'];
				# authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
					# obtain the id
					if(!empty($_GET['id'])) {
						$id = $_GET['id'];
					} else {
						# illegal request
						header("Location: ".$_SERVER['REQUEST_URI']);
					}
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
        
        <!-- Latest complied and minified JQuery -->
        <script src="../bootstrap/jquery-2.1.3.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="../style.css">
        
        <!-- custom JQuery script for aja calls -->
        <script>
			// ajax call to fetch json data
			$.post("/controller/view/companyDetails?id=<?php echo $id; ?>",
				{username: <?php echo $username; ?>},
				function(data) {
					display(JSON.parse(data));
			});
			
			function display(input) {
				if(input.length>0 && input[0].data=='true') {
					if(input[0].status == '1') {
						input[0].name += '*';
					}
					$("#name").html(input[0].name);
					if(input[0].applied == '0') {
						$("#link").attr('href', 'resume/build?id='+input[0].id);
						$("#linkName").html("Apply");
					} else if(input[0].applied == '1') {
						$("#link").attr('href', 'resume/view');
						$("#linkName").html("View");
					}
				} else {
					document.location("/student/");
				}
			}
        </script>
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
        	<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
	                    <div class="col-md-11">
    	                    <h2 id="name"></h2>
        	            </div>
            	        <div class="col-md-1">
                        	<h2>
                            	<a id="link">
                    	        	<button class="btn btn-primary" id="linkName"></button>
                        		</a>
                            </h2>
						</div>
                    </div>
                </div>
                
                <div class="panel-body" id="companyDetailsDiv">
					<!-- design of the company profile -->
                    <div class="col-md-6">
                    	<div class="panel panel-default">
	                    	<div class="panel-heading">
		                    	<h4>Description</h4>
							</div>
                            <div class="panel-body">
	                            <p id="description">This is sample description for the company</p>
                            </div>
            	        </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="panel panel-default">
	                    	<div class="panel-heading">
		                    	<h4>Schedule</h4>
							</div>
                        	
		                    <table class="table table-striped">
    		                  	<thead>
        		                   	<tr>
            		                   	<th>Event</th>
                		                <th>Date</th>
                    		        </tr>
                        	    </thead>
	                        </table>
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
					case 'coordinator':
						header("Location: /coordinator/");
						break;
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