<?php
	# type of the page
	$page = "register";
?>

<html>
	<head>

		<!-- meta characters to be inserted to increase searching -->
		<meta charset="utf-8">
		<title>PAP | Login</title>

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
                    <form action="controller/register.php" method="post" class="register form-horizontal">
                    	<!-- heading for form -->
                    	<div class="form-group">
							<h2>Register</h2>
						</div>
                        
                        <!-- input field for name -->
                        <div class="form-group <?php echo (isset($_POST['name'])) ?"has-error" : ""; ?>">
							<div class="input-group">
								<span class="input-group-addon">
                                	<span class="glyphicon glyphicon-user"></span>
								</span>
								<input type="text" class="form-control" name="Name" placeholder="Full name" value="" required />
                            <?php
							 	if(isset($_POST['name'])) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $_POST['name']; ?>
                                    </p>
							<?php	
								}
                             ?>
							</div>
						</div>
                        
                        <!-- input field for email -->
                        <div class="form-group <?php echo (isset($_POST['email'])) ?"has-error" : ""; ?>">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
                                </span>
								<input type="email" class="form-control" name="email" placeholder="E-mail" value="" required>
                            <?php
							 	if(isset($_POST['email'])) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $_POST['email']; ?>
                                    </p>
							<?php	
								}
                             ?>
                            </div>
                        </div>
                        
                        <!-- input field for user type -->
                        <div class="form-group <?php echo (isset($_POST['usertype'])) ?"has-error" : ""; ?>">
							<div class="input-group">
                            	<span class="input-group-addon">
                                	<span class="glyphicon glyphicon-pencil"></span>
								</span>
							    <select name="userType" class="form-control">
									<option value="student">Student</option>
									<option value="coordinator">Coordinator</option>
        	                        <option value="company">Company</option>
            	                    <option value="admin">Admin</option>
                	            </select>
                            <?php
							 	if(isset($_POST['usertype'])) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $_POST['usertype']; ?>
                                    </p>
							<?php	
								}
                             ?>
                            </div>
                        </div>
                        
                        <!-- input field for username -->
                        <div class="form-group <?php echo (!empty($_POST['username'])) ?"has-error" : ""; ?>">
					    	<div class="input-group">
								<span class="input-group-addon">
                                	<span class="glyphicon glyphicon-user"></span>
								</span>
								<input type="text" class="form-control" name="username" placeholder="Roll number" value="" required />
                            <?php
							 	if(isset($_POST['username'])) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $_POST['name']; ?>
                                    </p>
							<?php	
								}
                             ?>
							</div>
						</div>
						
                        <!-- input field for password -->
						<div class="form-group <?php echo (!empty($_POST['password']) && ($_POST['password']=='error')) ?"has-error" : ""; ?>">
                        <div class="input-group">
                        	<span class="input-group-addon">
	                        	<span class="glyphicon glyphicon-lock"></span>
							</span>
                            <input class="form-control" type="password" placeholder="Password" name="password" value="" required />
                            <?php
							 	if(isset($_POST['password'])) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $_POST['password']; ?>
                                    </p>
							<?php	
								}
                             ?>
                            </div>
						</div>
                        
                        <!-- input field to confirm password -->
						<div class="form-group <?php echo (!empty($_POST['cpassword'])) ?"has-error" : ""; ?>">
                        	<div class="input-group">
		                        <span class="input-group-addon">
	    	                        <span class="glyphicon glyphicon-lock"></span>
            	                </span>
                                <input class="form-control" type="password" placeholder="Confirm Password" name="cpassword" value="" required />
                            <?php
							 	if(isset($_POST['name'])) {
							?>
                                    <p class='help-block' style='color: #880000'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                        <?php echo $_POST['cpassword']; ?>
                                    </p>
							<?php	
								}
                             ?>
                           	</div>
                        </div>
                        
                        <!-- submit form button -->
                        <div class="form-group">
                        	<button type="submit" class="btn btn-group">Log in</button>
                        </div>    
					</form>
				</div>
                
                <!-- right margin -->
                <div class="col-xs-4"></div>
			</div>
        </div>
	</body>
</html>