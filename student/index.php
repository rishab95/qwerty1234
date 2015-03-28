<?php
	# obtaining any get values that exist
	$page = 'inbox';
	if(!empty($_GET)) {
		
		# obtaining the page type
		if(!empty($_GET['p']) && $_GET['p'] == 'inbox') {
			$page = 'inbox';
		} else {
			$page = 'inbox';
		}
				
	}

	# display the corresponding page
	switch($page) {
		case 'inbox':
			include_once('inbox.php');
			break;
		default:
			include_once('inbox.php');
			break;
	}
?>
		
