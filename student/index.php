<?php
	# check if the page is legitimately open
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	$page = "";
	if(!empty($_SESSION['username'])) {
		# obtaining any get values that exist
		if(!empty($_GET)) {
			# display corresponding pages as requested
			if(!empty($_GET['p'])) {
				switch($_GET['p']) {
					case 'home':
						include_once('home.php');
						break;
					case 'viewTimeline':
						include_once('viewTimeline.php'); 
						break;
					case 'viewCompanyDetails':
						include_once('viewCompanyDetails.php');
						break;
					case 'profile':
						include_once('profile.php');
						break;
					default:
						include_once('home.php');
						break;
				}
			} else
				include_once('home.php');
		} else
				include_once('home.php');
	} else
		header("Location: /");
?>