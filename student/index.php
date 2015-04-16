<?php
	# check if the page is legitimately open
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	if(!empty($_SESSION['username']))
		header("Location: /student/home");
	else
		header("Location: /");
?>