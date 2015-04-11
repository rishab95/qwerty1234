<?php
	# obtaining any get values that exist
	if(!empty($_GET)) {
		# display corresponding pages as requested
		if(!empty($_GET['p'])) {
			switch($_GET['p']) {
				case 'build':
					include_once('build.php');
					break;
				case 'view':
					include_once('view.php'); 
					break;
				default:
					include_once('build.php');
					break;
			}
		} else
			include_once('build.php');
	} else
		include_once('build.php');
?>
		
