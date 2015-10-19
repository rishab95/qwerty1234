<?php
	#initialize all variables
	$pass = true;
	$username = "";
	$usernameError = "";
	$yearofpass = "";
	$yearofpassError = "";
	$branch = "";
	$branchError = "";
	$dob = "";
	$dobError = "";
	$citizenship = "";
	$citizenshipError = "";
	$gender = "";
	$genderError = "";
	$tempadd = "";
	$tempaddError = "";
	$tempcity = "";
	$tempcityError = "";
	$tempstate = "";
	$tempstateError = "";
	$temppin = "";
	$temppinError = "";
	$permadd = "";
	$permaddError = "";
	$permcity = "";
	$permcityError = "";
	$permstate = "";
	$permstateError = "";
	$permpin = "";
	$permpinError =  "";
	$dadname = "";
	$dadnameError = "";
	$dadoccup = "";
	$dadoccupError = "";
	$momname = "";
	$momnameError = "";
	$momoccup = "";
	$momoccupError = "";

	
	#username
	#yearofpass
	if(empty($_POST["yearofpass"])) {
		$pass = false;
		$yearofpassError = "Year of pass is required";
	} else {
		$yearofpass	= $_POST['yearofpass'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{4}$/", $yearofpass)) {
			$pass = false;
		} else
			$pass &= true;
	}
	
	
	#branch
	if(empty($_POST["branch"])) {
		$pass = false;
		$branchError = "Branch is Required";
	} else {
		$branch = $_POST['branch'];
		if (!preg_match("/^[a-zA-Z]{5}*$/", $branch)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	
	#dob
	if(empty($_POST["dob"])) {
		$pass = false;
		$dobError = "DOB is required!";
	} else {
		$dob = $_POST['dob'];
		# check that it contains legitimate characters
		if (!preg_match("/^[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}$/", $dob)) {
			$pass = false;
		} else
			$pass &= true;
	}
	
	#citizenship
	if(empty($_POST["citizenship"])) {
		$pass = false;
		$citizenshipError = "Citizenship is Required";
	} else {
		$citizenship = $_POST['citizenship'];
		if (!preg_match("/^[a-zA-Z]{5,10}*$/", $citizenship)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	#gender
	if(empty($_POST["gender"])) {
		$pass = false;
		$genderError = "Gender is Required";
	} else {
		$gender = $_POST['gender'];
		if (!preg_match("/^[A-Z]{1}*$/", $gender)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	#tempadd
		if(empty($_POST["tempadd"])) {
		$pass = false;
		$tempaddError = "Temporary Address is Required";
	} else {
		$tempadd = $_POST['tempadd'];
		if (!preg_match("/^[a-zA-Z][ a-zA-z,.-_/:]*$/", $tempadd))  {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	#tempcity
	if(empty($_POST["tempcity"])) {
		$pass = false;
		$tempcityError = "Temporary City is Required";
	} else {
		$tempcity = $_POST['gender'];
		if (!preg_match("/^[A-Z]{3,}*$/", $tempcity)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
		
		
	#tempstate
	if(empty($_POST["tempstate"])) {
		$pass = false;
		$tempstateError = "Temporary State is Required";
	} else {
		$tempstate = $_POST['gender'];
		if (!preg_match("/^[a-zA-Z]{3,}*$/", $tempstate)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	#temppin
	if(empty($_POST["tpin"])) {
		$pass = false;
		$temppinError = "Pin is Required";
	} else {
		$temppin = $_POST['tpin'];
		if (!preg_match("/^[0-9{6}*$/", $temppin)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	#permadd
	#permcity
	#permstate
	#permpin
	#dadname
	#dadoccup
	#momname
	#momoccup

?>
