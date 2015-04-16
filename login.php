<?php
	$page = "login";
	if(!empty($_GET['auth']) && $_GET['auth']=='false') {
		$attempt = True;
	} else {
		$attempt = False;
	}
	
	# check if user has sent credentials to log in
	if(!empty($_POST['username']) && !empty($_POST['password']))
		include_once("controller/login.php");
	else {
?>
<html>
	<head>

		<!-- meta characters to be inserted to increase searching -->
		<meta charset="utf-8">
		<title>PAP | Login</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="bootstrap/js/bootstrap.js"></script>
        
        <!-- Latest complied and minified JQuery -->
        <script src="bootstrap/jquery-2.1.3.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="style.css">
        
        <!-- link icon file to html page -->
        <link rel="shortcut icon" href="images/logo.ico">
        
        <!-- link to the effects JQuery file -->
        <script src="js/effects.js"></script>
	</head>

	<body>
    
	    <?php
			# include the header for this interface file
        	include_once('head.php');
		?>

		<!-- background for the page -->
        <div class="body1"></div>
		
        <!-- main body container -->
        <div class="container">
        	<div class="row">
				<div class="col-xs-4"></div>
                <div class="col-md-4 col-xs-4">
                   	<!-- login form -->
                   	<form action="/login" method="post" class="login">
                    	<!-- heading for the form -->
                   		<div class="form-group">
	                       	<h2>Log-in</h2>
	                    </div>                            
                    <?php 
						if ($attempt) {
					?>
                    		<!-- incorrect login message -->
	                        <p class='help-block' style='color: #880000'>
    	                      	<span class='glyphicon glyphicon-remove'></span>
        	                    User type or Username or Password incorrect.
            	            </p>
                    <?php
						}
					?>
                        <!-- input for username -->
						<div class="form-group <?php echo ($attempt) ?"has-error" : ""; ?>">
                        	<div class="input-group">
								<span class="input-group-addon">
                                	<span class="glyphicon glyphicon-user"></span>
                                </span>
								<input type="text" class="form-control" name="username" placeholder="Roll Number" value="" required />
							</div>
						</div>
                        
                        <!-- input for password -->
                        <div class="form-group <?php echo ($attempt) ?"has-error" : ""; ?>">
                        	<div class="input-group">
                        		<span class="input-group-addon">
	                            	<span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input class="form-control" type="password" placeholder="Password" name="password" value="" required />
							</div>
						</div>
                        
                        <!-- submit button -->
						<div class="form-group">
                        	<button type="submit" class="btn btn-group">Log in</button>
                        </div>
					</form>
				</div>
                
				<div class="col-xs-4"></div>
			</div>
		</div>
	</body>
</html>
<?php
	}
?>