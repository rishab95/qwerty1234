<?php
	# initialize all error message variables
	$nameError = "";
	$emailError = "";
	$usernameError = "";
	$passwordError = "";
	$cpassError= "";
	# type of the page
	$page = "register";
	if(!empty($_POST)) {
		# obtain the result of the registeration service
		ob_start();
		include_once("controller/register.php");
		$inStr = ob_get_clean();
		# convert the output of registeration from json to assoc array
		$input = json_decode($inStr, true);
		echo $inStr;
		# validate if registration successfull
		if($input['auth']=='true')
			header("Location: /?regsuc=1");
		else {
			# get data in the error message variables
			$nameError = $input['nameError'];
			$name = $input['name'];
			$emailError = $input['emailError'];
			$email = $input['email'];
			$usernameError = $input['usernameError'];
			$username = $input['username'];
			$passwordError = $input['passwordError'];
			$cpassError = $input['cpasswordError'];
		}
	}
?>

<html>
	<head>

		<!-- meta characters to be inserted to increase searching -->
		<meta charset="utf-8">
		<title>PAP | Register</title>

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
        
        <!-- link icon file to html page -->
        <link rel="shortcut icon" href="images/logo.ico">
        
        <!-- custom java script for page -->
        <script>
			// initialize the page
			$(document).ready(function() {
				// auto focus on the name field
				$("input[name~='Name']").focus();
			});
						
		</script>
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
            	<!-- column for left space -->
				<div class="col-xs-4"></div>
                
                <!-- central column for form -->
                <div class="col-xs-4">
					<!-- login form -->
                    <form action="register" method="post" class="register form-horizontal">
                    	<!-- heading for form -->
                    	<div class="form-group">
							<h2>Register</h2>
						</div>
                        
                        <!-- input field for name -->
                        <div class="form-group <?php echo (!empty($nameError)) ?"has-error" : ""; ?>">
							<div class="input-group">
								<span class="input-group-addon">
                                	<span class="glyphicon glyphicon-user"></span>
								</span>
								<input type="text" class="form-control" name="Name" placeholder="Full name" value="<?php echo !empty($name)?$name:""; ?>" required />
							</div>
                            <?php
							 	if(!empty($nameError)) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $nameError; ?>
                                    </p>
							<?php	
								}
                             ?>
						</div>
                        
                        <!-- input field for email -->
                        <div class="form-group <?php echo (!empty($emailError)) ?"has-error" : ""; ?>">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
                                </span>
								<input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo !empty($email)?$email:""; ?>" required>
                            </div>
                            <?php
							 	if(!empty($emailError)) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $emailError; ?>
                                    </p>
							<?php	
								}
                             ?>
                        </div>
                        
                        <!-- input field for username -->
                        <div class="form-group <?php echo (!empty($usernameError)) ?"has-error" : ""; ?>">
					    	<div class="input-group">
								<span class="input-group-addon">
                                	<span class="glyphicon glyphicon-user"></span>
								</span>
								<input type="text" class="form-control" name="username" placeholder="Roll number" value="<?php echo !empty($username)?$username:""; ?>" required />
                            </div>
                            <?php
							 	if(!empty($usernameError)) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $usernameError; ?>
                                    </p>
							<?php	
								}
                             ?>
						</div>
						
                        <!-- input field for password -->
						<div class="form-group <?php echo (!empty($passwordError)) ?"has-error" : ""; ?>">
                        	<div class="input-group">
                        		<span class="input-group-addon">
		                        	<span class="glyphicon glyphicon-lock"></span>
								</span>
        	                    <input class="form-control" type="password" placeholder="Password" name="password" value="" required />
                            </div>
                            <?php
							 	if(!empty($passwordError)) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $passwordError; ?>
                                    </p>
							<?php	
								}
                             ?>
						</div>
                        
                        <!-- input field to confirm password -->
						<div class="form-group <?php echo (!empty($cpassError)) ?"has-error" : ""; ?>">
                        	<div class="input-group">
		                        <span class="input-group-addon">
	    	                        <span class="glyphicon glyphicon-lock"></span>
            	                </span>
                                <input class="form-control" type="password" placeholder="Confirm Password" name="cpassword" value="" required />
                            </div>
                            <?php
							 	if(!empty($cpassError)) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $cpassError; ?>
                                    </p>
							<?php	
								}
                             ?>
                        </div>
                        
                        <!-- submit form button -->
                        <div class="form-group">
                        	<button type="submit" class="btn btn-group">Register</button>
                        </div>    
					</form>
				</div>
                
                <!-- right margin -->
                <div class="col-xs-4"></div>
			</div>
        </div>
	</body>
</html>