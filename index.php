<!doctype html>

<?php
	# obtain any get values that exit
	if(!empty($_GET)) {
		if($_GET['auth']) {
			$attempt = True;
		} else {
			# incorect value being sent to the page	
		}
	} else {
		$attempt = False;
	}
?>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Login</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        <!-- Latest complied and minified JQuery -->
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="style.css">
    
	</head>

	<body style="background-image: url('images/bg3.bmp');">
        
        <?php
        	include_once('head.php');
		?>
        
		<div class="container">
        	<div class="row">
				<div class="col-xs-4"></div>
                	<div class="col-md-4 col-xs-4">
                    	<form action="loginController.php" method="post" class="login">
                       		<div class="form-group">
	                           	<h2>Log-in</h2>
	                        </div>
                            <div class="form-group <?php echo ($attempt) ? 'has-error' : ''; ?>">
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
                                </div>
                            </div>
                            <div class="clearfix hidden-xs"></div>
                            <div class="form-group <?php echo ($attempt) ? 'has-error' : '' ; ?>">
                            	<div class="input-group">
									<span class="input-group-addon">
                                    	<span class="glyphicon glyphicon-user"></span>
                                    </span>
									<input type="text" class="form-control" name="username" placeholder="Username?" value="" required>
								</div>
                            </div>
                            <div class="clearfix hidden-xs"></div>
                            <div class="form-group <?php echo ($attempt) ? 'has-error' : '' ; ?>">
                            	<div class="input-group">
                                	<span class="input-group-addon">
	                                    <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Password?" name="password" value="" required />
                            	</div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-group">Log in</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-4"></div>
            	</div>
        	</div>
        </div>
        
	</body>
</html>
