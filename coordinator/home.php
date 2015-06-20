<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='coordinator') {
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
		<title>PAP | Coordinator | Home</title>

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
			var username = <?php echo $_SESSION['username']; ?>
			// ajax call for inbox
			$.post("/ajax/coordinatorInbox",
				{username: username, type: 'coordinator'},
				function(data) {
					$("#inboxDiv").html(data);
			});
			
			// ajax call for schedule
			$.post("/ajax/coordinatorSchedule?t=schedule",
				{username: username},
				function(data, status) {
					$("#scheduleDiv").html(data);
			});
			
			// ajax call for company list
			$.post("/ajax/companyList",
				{username: username, type: 'coordinator'},
				function(data) {
					$("#companyList").html(data);
			});
			
			// function to show the message of a new company
			function showMessage(id, ele) {
				// obtain message from table
				var b = ele.html();
				b = b.split("<td>");
				var msgHead = b[2].trim().slice(0, -5);
				var msgBody = b[3].trim().slice(0, -5);
				
				// activate modal with all information
				$("#inboxMessageModalHead").html(msgHead);
				$("#inboxMessageModalBody").html(msgBody);
				$("#inboxMessageModalTrigger").click();
			}
			
			// update the read status
			function updateReadStatus(id, ele) {
				var lin = "/controller/updateMessageStatus?id="+id+"&t=coordinator_msg";
				$.get(lin, function(data) {
					var input = JSON.parse(data);
					if(input['auth']=='false') {
						alert("Update Not working properly");
					} else {
						ele.removeClass('unread');
					}
				});
			}
		</script>
            
	</head>

	<body>
        
        <?php
			# include the header file for interface
        	include_once('head.php');
		?>
        
        <!-- background for the page -->
        <div class="body2"></div>

		<!-- main body container -->
        <div class="container">
	        <!-- modal for displaying the message -->
            <!-- button to triiger the modal -->
            <button type="button" style="display: none" data-toggle="modal" data-target="#inboxMessageModal" id="inboxMessageModalTrigger"></button>
            
            <!-- the modal -->
            <div id="inboxMessageModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
					    <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title" id="inboxMessageModalHead"></h4>
			        	</div>
                  		
				        <div class="modal-body">
				        	<p id="inboxMessageModalBody"></p>
					    </div>
    	                
				        <div class="modal-footer">
					        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
				        </div>
				    </div>
				</div>
			</div>
            
        	<!-- main container for displaying mail -->
	        <div class="col-lg-5">
            	<div class="panel panel-default">
	    	        <div class="panel-heading">
    	               	<h3>Inbox</h3>
   	    		    </div>
                
	                <div id="inboxDiv">
						<label>Loading</label>
        	            <div class="progress">
                          	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
	                    </div>
            	    </div>
				</div>
            </div>
        
	        <!-- main container for displaying the schedule -->
    	    <div class="col-lg-5">
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Schedule</h3>
                    </div>
                    
                    <div id="scheduleDiv">
						<label>Loading</label>
        	            <div class="progress">
                          	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
	                    </div>
            	    </div>
				</div>
            </div>
            
            <!-- main container for disppalying the list of companyies -->
            <div class="col-lg-2">
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	<h3>Companies</h3>
                    </div>
                    
                    <div id="companyList">
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
					case 'student':
						header("Location: /student/");
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