<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	$username = $_SESSION['username'];
	# initialize all variables
	$acadAch = NULL;
	$proj = NULL;
	$extraCurr = NULL;
	$otherInfo = NULL;
	$id = NULL;
	$pass = true;
	
	# perform validations and obtain data
	if(isset($_POST["acadAch"]))
		$acadAch = $_POST['acadAch'];
	if(isset($_POST["proj"]))
		$proj = $_POST['proj'];
	if(isset($_POST["extraCurr"]))
		$extraCurr = $_POST['extraCurr'];
	if(isset($_POST["otherInfo"]))
		$otherInfo = $_POST['otherInfo'];
	if(!empty($_GET['id']))
		$id = $_GET['id'];
	else
		header("Location: /student/");
	
	
	# check if all data is valid to input
	$filePath = "../student/resume/$username"."Resume.xml";
	if(file_exists($filePath)) {
		# open the xml file
		$xmlDoc = new DOMDocument();
		$xmlDoc->formatOutput = true;
		$xmlDoc->load($filePath);
		$company = $xmlDoc->createElement('company', '');
		$companyName = $xmlDoc->createAttribute('id');
		$companyName->value = $id;
		$company->appendChild($companyName);
		if(isset($acadAch))
			foreach($acadAch as $item)
				$company->appendChild($xmlDoc->createElement('acadAch', $item));
		if(isset($proj))
			foreach($proj as $item)
				$company->appendChild($xmlDoc->createElement('proj', $item));
		if(isset($extraCurr))
			foreach($extraCurr as $item)
				$company->appendChild($xmlDoc->createElement('extraCurr', $item));
		if(isset($otherInfo))
			foreach($otherInfo as $item)
				$company->appendChild($xmlDoc->createElement('otherInfo', $item));
		$xmlDoc->appendChild($company);
		$xmlDoc->save($filePath);
		
		# initialize MySQL connection
		$servername="localhost";
		$dbname = "pap";
		$conn = mysqli_connect($servername , "root" , "" , $dbname);
		if(!$conn){
			#die("connection failed") mysql_error()
		}
		
		# mysql queries to update student status
		$query = "UPDATE stu_eligible SET applied=1 WHERE company_id=$id AND username=$username";
		
		if($conn->query($query)) {
			header("Location: /student/viewCompanyDetails?id=$id&apply=success");
		} else {
			# registration unsuccessful
		}
	} else {
		header("Location: /student/");
	}
?>