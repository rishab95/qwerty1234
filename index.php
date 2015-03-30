<?php
	# obtaining any get values that exist
	$page = 'login';
	$attempt = False;
	if(!empty($_GET)) {
		
		# obtaining the page type
		if(isset($_GET['search'])) {
			$page = 'search';
			if(!empty($_GET['search'])){
				$search = $_GET['search'];	
			}
		} else {
			$page = 'login';
		}
		
		if(isset($_GET['register'])) {
			if(!empty($_GET['register']) && $_GET['register']=='1')
				$page = 'register';
		}

		# obtaining if authentication has been attemted or not
		if(!empty($_GET['auth']) && $_GET['auth']=='false') {
			$attempt = True;
			$page = 'login';
		} else {
			$attempt = False;
		}
				
	}

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
		default:
			include_once('login.php');
			break;
	}
?>
		
