<?php
	# check if the page is legitimately open
	session_start();
	if(!empty($_SESSION['username'])) {
		# obtaining any get values that exist
		if(!empty($_GET)) {
			# display corresponding pages as requested
			if(!empty($_GET['p'])) {
				switch($_GET['p']) {
					case 'inbox':
						include_once('inbox.php');
						break;
					case 'viewTimeline':
						$page = 'timeline';
					case 'viewSchedule':
						if($page != 'timeline')
							$page = 'schedule';
						include_once('viewEvents.php'); 
						break;
					case 'viewCompanyDetails':
						include_once('viewCompanyDetails.php');
						break;
					case 'profile':
						include_once('profile.php');
						break;
					default:
						include_once('inbox.php');
						break;
				}
			} else
				include_once('inbox.php');
		} else
				include_once('inbox.php');
	} else
		header("Location: /");
?>