<!doctype html>

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
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="../style.css">
    
	</head>

	<body>
        
        <?php
        	include_once('head.php');
		?>
        
		<div class="container">
        	<div class="row">
				<div class="dropdown">
                
                	<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                    	<span class="glyphicon glyphicon-asterisk"></span>
                    </button>
                    
                    <ul class="dropdown-menu">
	                    <li>
                        	<a href="">
	                        	<span class="glyphicon glyphicon-list-alt"></span>
                            </a>
                        </li>
                        <li>
	                        <span class="divider"></span>
                        </li>
                    	<li>
                        	<a href="">
	                        	<span class="glyphicon glyphicon-log-out"></span>
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
		</div>        
	</body>
</html>
