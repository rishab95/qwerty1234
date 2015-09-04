<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='admin') {
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
		<title>PAP | Admin | Home</title>

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
			// script to search in table load details using ajax
			function searchTable(inputVal, table) {
				table.find('tr').each(function(index, row) {
					var allCells = $(row).find('td');
					if(allCells.length > 0) {
						var found = false;
						allCells.each(function(index, td) {
							var regExp = new RegExp(inputVal, 'i');
							if(regExp.test($(td).text())) {
								found = true;
								return false;
							}
						});
						if(found == true)
							$(row).show();
						else
							$(row).hide();
					}
				});
			}
			
			window.onload = function() {
				// load the timeline for all the companies coming to campus
				$("#timelineDiv").load("/ajax/adminSchedule");
				// load the inbox of the admin
				$("#inboxDiv").load("/ajax/adminInbox");
			}
		</script>            
	</head>

	<body>
        
        <?php
        	include_once('head.php');
		?>
        
        <div class="body2"></div>

		<!-- main body container -->
		<div class="container">
        	<div class="row">
                <!-- main container for mail to the admin from other sources -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<div class="row">
                            	<div class="col-sm-3">
                                	<h3>Inbox</h3>
                                </div>
                                
                                <div class="col-sm-9 pull-right" style="padding-top: 17.4px; margin-bottom: -10px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search" oninput="searchTable(this.value, $('#tblInbox'))" />
                                            <span class="input-group-addon">
	                                            <span class="glyphicon glyphicon-search"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
	                        </div>
                        </div>
                        
                        <div id="inboxDiv">
                            <div class="panel-body">
                                <label>Loading</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            
                <!-- main container for disppalying the timeline -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<div class="row">
                            	<div class="col-sm-3">
                                	<h3>Calander</h3>
                                </div>
                                
                                <div class="col-sm-9 pull-right" style="padding-top: 17.4px; margin-bottom: -10px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search" oninput="searchTable(this.value, $('#tblTimeline'))" />
                                            <span class="input-group-addon">
	                                            <span class="glyphicon glyphicon-search"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
	                        </div>
                        </div>
                        
                        <div id="timelineDiv">
                            <div class="panel-body">
                                <label>Loading</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
	</body>
</html>
<?php
				} else {
					session_destroy();
					header("Location: /login");
				}
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
					case 'student':
						header("Location: /student/");
						break;
					default: 
						; # someone trying to play with session variables
				}
			}
		} else {
			session_destroy();
			header("Location: /login");
		}
	} else {
		session_destroy();
		header("Location: /login");
	}
?>