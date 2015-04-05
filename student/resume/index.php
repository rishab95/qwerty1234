<?php
	# obtaining any get values that exist
	$page = 'inbox';
	if(!empty($_GET)) {
		
		# display corresponding pages as requested
		if(!empty($_GET['resume'])) {
			switch($_GET['resume']) {
				case 'build':
					$page = 'build';
					include_once('build.php');
					break;
				case 'view':
					$page = 'view';
					include_once('view.php'); 
					break;
				default:
					$page = 'build';
					include_once('view.php');
					break;
			}
		} else {
			$page = 'build';
			include_once('build.php');
		}
	} else {
		$page = 'build';
		include_once('build.php');
	}
?>
		
