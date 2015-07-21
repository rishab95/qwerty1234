<html>
	<head>
		<!-- meta characters to be inserted to increase searching -->
		<meta charset="utf-8">
		<title>PAP | About</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
        
        <!-- Latest complied and minified JQuery -->
        <script src="bootstrap/jquery-2.1.3.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="bootstrap/js/bootstrap.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="style.css">
        
        <!-- link icon file to html page -->
        <link rel="shortcut icon" href="images/logo.ico">
        
        <!-- Custom common JQuery file -->
        <script src="ess.js"></script>
	</head>

	<body>
        <!-- header division -->
        <header class="page-header">
            
            <!-- main navigation container -->
            <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
                <div class="container">
                    <div class="row">
                        <!-- branding implementation -->
                        <div class="col-sm-3">
                            <div class="navbar-header">
                                <a href="/about" class="navbar-brand">
                                    <img src="/images/foot_white.png" height="20"/>
                                </a>
                                
                                <button class="navbar-toggle" data-toggle="collapse" data-target="header-nav">
                                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                                </button>
                            </div>
                        </div>
                    
                    <!-- collapsable section of header -->
                    <div class="collapse navbar-collapse" id="header-nav">
                        <!-- list of all the options -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <!-- link for forwarding to next page -->
                                <a href="login">
                                    <button class="btn btn-toolbar navbar-btn pull-right" type="button" id="mainHeadToggleButton">
                                        <span class="glyphicon glyphicon-user"></span> Login
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
		<!-- background for the page -->
        <div class="body1"></div>
		
        <!-- main body container -->
        <div class="container">
        	<div class="row">
				<div class="col-md-4 col-sm-2 col-xs-1"></div>
                
                <div class="col-md-4 col-sm-8 col-xs-10">
                   	<!-- login form -->
                   	<form action="/login" method="post" class="login">
                    	<!-- heading for the form -->
                   		<div class="form-group">
	                       	<h2>Log-in</h2>
	                    </div>                            
                    <?php 
						if ($attempt) {
					?>
                            <p class="help-block" style="color: #800">
                                <span class="glyphicon glyphicon-remove"></span>
                                Username or password is incorrect.
                            </p>
                    <?php
						}
						if ($regSuc) {
					?>
							<!-- registration successfull -->
                            <p class="help-block" style="color: #060";>
                            	<span class="glyphicon glyphicon-ok"></span>
                                You have successfully registered.
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
								<input type="text" class="form-control" name="username" placeholder="Roll Number" value="" required maxlength="9" />
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
                        	<button type="submit" class="btn btn-primary">Log in</button>
                        </div>
					</form>
				</div>
                
				<div class="col-md-4 col-sm-2 col-xs-1"></div>
			</div>
		</div>
	</body>
</html>
