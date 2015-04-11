<?php
	# obtaining any get values that exist
	$page = 'login';
	$attempt = False;
	if(!empty($_GET)) {
		# obtaining the page type
		if(isset($_GET['search'])) {
			$page = 'search';
			$search = $_GET['search'];	
			goto bottom;
		}
		
		if(isset($_GET['register']) && !empty($_GET['register'])) {
			$page = 'register';
			goto bottom;	
		}

		# obtaining if authentication has been attemted or not
		if(!empty($_GET['auth']) && $_GET['auth']=='false') {
			$attempt = True;
		} else {
			$attempt = False;
		}
	}

	bottom:
	# display the corresponding page
	switch($page) {
		case 'login':
			include_once('login.php');
			break;
		case "search":
			include_once('search.php');
			break;
		case "register":
			include_once('register.php');
			break;
		default:
			include_once('login.php');
			break;
	}
?>