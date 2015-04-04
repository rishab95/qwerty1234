<?php
	# obtaining any get values that exist
	$page = 'inbox';
	if(!empty($_GET)) {
		
		# display corresponding pages as requested
		if(!empty($_GET['p'])) {
			switch($_GET['p']) {
				case 'inbox':
					include_once('inbox.php');
					break;
				case 'schedule':
					include_once('schedule.php'); 
					break;
				case 'timeline':
					include_once('timeline.php');
					break;
				case 'profile':
					include_once('profile.php');
					break;
				default:
					include_once('inbox.php');
					break;
			}
		} else {
			include_once('inbox.php');
		}
	} else {
			include_once('inbox.php');
	}
?>
		
