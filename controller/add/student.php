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
		$tempcity = $_POST['tempcity'];
		if (!preg_match("/^[A-Z]{3,}*$/", $tempcity)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}	
		
	#tempstate
	if(empty($_POST["tempstate"])) {
		$pass = false;
		$tempstateError = "Temporary State is Required";
	} else {
		$tempstate = $_POST['tempstate'];
		if (!preg_match("/^[a-zA-Z]{3,}*$/", $tempstate)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}	
		
		
		
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
	}
	    
		
	#permadd
	if(empty($_POST["permadd"])) {
		$pass = false;
		$permaddError = " Address is Required";
	} else {
		$permadd = $_POST['permadd'];
		if (!preg_match("/^[a-zA-Z][ a-zA-z,.-_/:]*$/", $permadd))  {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	
	
	
	#permcity
	if(empty($_POST["permcity"])) {
		$pass = false;
		$permcityError = "Permanent City is Required";
	} else {
		$permcity = $_POST['permcity'];
		if (!preg_match("/^[A-Z]{3,}*$/", $permcity) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	
	
	
	#permstate
	if(empty($_POST["permstate"])) {
		$pass = false;
		$permstateError = "state is Required";
	} else {
		$permstate = $_POST['permstate'];
		if (!preg_match("/^[a-zA-Z]{3,}*$/", $permstate)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}	
	
	#permpin
	if(empty($_POST["ppin"])) {
		$pass = false;
		$permpinError = "Pin is Required";
	} else {
		$permpin = $_POST['tpin'];
		if (!preg_match("/^[0-9{6}*$/", $permpin)) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	   
	
	
	#dadname
	if(empty($_POST["dadname"])) {
		$pass = false;
		$dadnameError = " Name is Required";
	} else {
		$dadname = $_POST['dadname'];
		if (!preg_match("/^[A-Z]{3,}*$/", $dadname) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	#dadoccup
	if(empty($_POST["permcity"])) {
		$pass = false;
		$dadoccup = "Occupoation is Required";
	} else {
		$dadoccup= $_POST['dadoccup'];
		if (!preg_match("/^[A-Z]{3,}*$/", $dadoccup) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	
	
	#momname
	if(empty($_POST["permcity"])) {
		$pass = false;
		$momnameError = "Name is Required";
	} else {
		$momname = $_POST['momname'];
		if (!preg_match("/^[A-Z]{3,}*$/", $momname) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	#momoccup
	if(empty($_POST["momoccup"])) {
		$pass = false;
		$momoccupError = "Occupation is Required";
	} else {
		$momoccup = $_POST['momoccup'];
		if (!preg_match("/^[A-Z]{3,}*$/", $momoccup) {
		# check that it contains legitimate characters
			$pass = false;
		} else
			$pass &= true;
	}
	
	
	#initalize mysql queries 
	if($pass){
		#mysql connection
		$servername = "localhost";
		$dbname = "pap";
		$conn = mysql_connect($servername, "root", "", $dbname);
		if(!conn){
			die("connection failed" . mysql_error());
			
		}
		
		#please write the sql query here
		$query = "INSERT INTO student()VALUES();";
		
		
		
		if(mysqli_query($conn, $query) == true) {
			# new item added successfully
			echo json_encode(array("auth" => "true"));
		} else {
			# registration unsuccessful
		}
		
	} else {
		echo json_encode(
			array(

			)
		);
		
	}

?>
