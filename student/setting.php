<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='student') {
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
		<title>PAP | Student | Settings</title>

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