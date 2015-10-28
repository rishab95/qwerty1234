<?php
	#check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	#authenticate the user to user page
	if(!empty($_SESSION['type'])){
		if($_SESSION['type']=='student'){
			if(!empty($_SESSION['username'])){
				#authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outarr = json_decode($out, true);
				if($outarr['auth'] == "true"){
					
				}
			}
		}
	}


?>

<!IDOCTYPE html>

<html long = "en">
<head>
		<meta charset = "utf-8">
		<meta http-equiv= "X-UA-Compatible" content= "IE=edge,chrome=1">
		
		
		<title> Biodata Form </title>
</head>


<html>
	<head>
		<title>Add biodata</title>
	</head>
<body>
	<h2>student biodata from</h2>
		<form method = "post" action = "biodata.php">
			<div>
				<label for = "name">Username</label>
				<input type = "text" name = "Username" value= "">
				<label for = "name">Year Of Pass</label>
				<input type = "text" name = "Year Of Pass" value= "">
				<label for = "name">Branch</label>
				<input type = "text" name = "Branch" value= "">
				<label for = "name">DOB</label>
				<input type = "text" name = "DOB" value= "">
				<label for = "name">Citizenship</label>
				<input type = "text" name = "Citizenship" value= "">
				<label for = "name">Gender</label>
				<input type = "text" name = "Gender" value= "">
				<label for = "name">Temporary Address</label>
				<input type = "text" name = "Temporary Address" value= "">
				<label for = "name">Temporary City</label>
				<input type = "text" name = "Temporary City" value= "">
				<label for = "name">Temporary State</label>
				<input type = "text" name = "Temporary State" value= "">
				<label for = "name">Temporary Pin</label>
				<input type = "text" name = "Temporary Pin" value= "">
				<label for = "name">Permanent Address</label>
				<input type = "text" name = "Permanent Address" value= "">
				<label for = "name">Permanent City</label>
				<input type = "text" name = "Permanent City" value= "">
				<label for = "name">Permanent State</label>
				<input type = "text" name = "Permanent State" value= "">
				<label for = "name">Permanent Pin</label>
				<input type = "text" name = "Permanent Pin" value= "">
				<label for = "name">Father's Name</label>
				<input type = "text" name = "Father's Name" value= "">
				<label for = "name">Father's Occupation</label>
				<input type = "text" name = "Father's Occupation" value= "">
			    <label for = "name">Mother's Name</label>
				<input type = "text" name = "Mother's Name" value= "">
				<label for = "name">Mother's Occupation</label>
				<input type = "text" name = "Mother's Occupation" value= "">
				
			</div>
		</form>
</body>
</html>
