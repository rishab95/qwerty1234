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
		<title>PAP | Administrator | Settings</title>

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
        
        <!-- script to use JQuery effects and ajax to view output -->
        <script>
			// initialize a variable to monitor nuber of click on Coordinator panel
			var countCooClick = 0;
			// function to initialize the coordinator panel
			function coordinator() {
				countCooClick++;
				if(countCooClick%2==1) {
					$("#coordinator").slideDown("slow");
					var lin = "/ajax/showCoordinator?q=";
					$.get(lin,
						function(data) {
							$("#cooList").append(data);
							$("#cooList").slideDown("slow");
						});
				} else {
					$("#coordinator").slideUp("slow", function() { $("#cooList").empty(); });
				}
			}
			
			// function to search for the coordinator in the database by the inputted name
			function searchCoordinator() {
				var input = $("#searchCoo").val();
				if(input == "") {
					$("#searchCooResults").slideUp("slow");
				} else {
					var lin = "/ajax/searchCoordinator?q="+input;
					$.get(lin,
						function(data) {
							$("#searchCooResults").html(data);
							$("#searchCooResults").slideDown("slow");
						});
				}
			}
			
			// function to add name and username in the list of assigned coordinators
			function selectCoordinator(username, name) {
				// activate a modal for confirmation
				
				// check if its the first coordinator assigned
				var content = $("#cooList").html();
				if(content == "") {
					$("#cooList").slideDown("slow");
				}
				
				// clear the table and the search input
				$("#searchCoo").val("");
				$("#searchCooResults").slideUp("slow");
				$("#searchCooResults").html("");
				
				// add the name of the selected coordinator in the list
				content = "<li class='list-group-item' onClick='deleteListItem($(this));' onMouseOver=\"this.style.cursor='pointer'\"><input type='hidden' name='coordinator[]' value='"+username+"'>"+name+"</li>";
				$("#cooList").append(content);
			}
			
			// function to delete the list item
			function deleteListItem(ele) {
				ele.slideToggle("slow", function() { ele.remove(); });
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
        	<!-- modal for the confirmation -->
			
        	<!-- main container for giving coordinator rights to students -->
	        <div class="col-lg-3">
            	<div class="panel panel-default" >
	    	        <div class="panel-heading" onClick="coordinator();" onMouseOver="this.style.cursor='pointer';">
                    	<center>
	    	               	<h4>Coordinator Rights</h4>
						</center>
   	    		    </div>
                	
                    <div id="coordinator">
                        <form action="" method="post">
	                        <div class="panel-body">
                                <!-- drop down for list of coordinators to assign coordinators -->
                                <div class="form-group">
                                	<div class="input-group">
                                    	<span class="input-group-addon">
                                        	<span class="glyphicon glyphicon-search"></span>
                                        </span>
										<input type="search" class="form-control" id="searchCoo" name="coordinatorSearch" placeholder="Search student" value="" title="Enter the name of the student" onKeyUp="searchCoordinator();" />
                                    </div>
                                </div>
                                
								<div id="searchCooResults"></div>
                                
                                <ul id="cooList" class="list-group"></ul>
                            </div>
                            <div class="panel-footer">
                            	<center>
	                                <!-- submit button -->
    	                            <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addCompanyModal" name="submit" value="Update" />
								</center>
	                        </div>
	                    </form>
					</div>
				</div>
            </div>
            
		  	<!-- main container for changing password -->
	        <div class="col-lg-3">
            	<div class="panel panel-default">
	    	        <div class="panel-heading" onClick="$('#password').slideToggle('slow');" onMouseOver="this.style.cursor='pointer';">
                    	<center>
	    	               	<h4>Change Password</h4>
						</center>
   	    		    </div>
                	
                    <form action="/controller/passwordUpdate" method="post">
                    	<div id="password">
                        	<div class="panel-body">
				                <center>
                                    <!-- input for current password -->
                                    <div class="form-group <?php //echo ($attempt) ?"has-error" : ""; ?>">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </span>
                                            <input type="password" class="form-control" name="currPass" placeholder="Current Password" value="" required />
                                        </div>
                                    </div>
                                    
                                    <!-- input for new password -->
                                    <div class="form-group <?php //echo ($attempt) ?"has-error" : ""; ?>">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </span>
                                            <input type="password" class="form-control" name="newPass" placeholder="New Password" value="" required />
                                        </div>
                                    </div>
                                    
                                    <!-- input for confirming new password -->
                                    <div class="form-group <?php //echo ($attempt) ?"has-error" : ""; ?>">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </span>
                                            <input type="password" class="form-control" name="newCPass" placeholder="Confirm Password" value="" required />
                                        </div>
                                    </div>
                                </center>
                        	</div>
                            
	                        <div class="panel-footer">
    	                    	<center>                            
        	                        <!-- submit button -->
            	                    <button type="submit" class="btn btn-primary">Change</button>
                	            </center>
                    	    </div>
						</div>
            	    </form>
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
					case 'student':
						header("Location: /student/");
						break;
					default: 
						; #someone trying to play with session variables
				}
			}
		} else
			header("Location: /login");
	} else
		header("Location: /login");
?>