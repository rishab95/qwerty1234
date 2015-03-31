<?php
	# obtain form data
	$servername="localhost";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$userType = $_POST['usertype'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$dbname="pap"
	$conn=mysql_connect($servername , "root" , "" , $dbname);
	if(!$conn){}
		#die("connection failed") mysql_error()

	$auth = False;
	
	# mysql queries to check for registration in the database table
	$query="INSERT INTO auth(username,password,user_type,name,email) 
		VALUES ($username,'$password','$userType','$name','$email');";
 
	$sql=mysql_query($query);

	if($conn->query($sql)==True)
		{echo "Registered Successfully";
			$auth=True;}
	else
		{echo "Not Registered";
			$auth=False;}
	# return $auth = True if authenticated
	
	if($auth == True) {
		# create session and redirect to user's home page
		session_start();
		$_SESSION['username'] = $username;
		header('Location: '.$username.'/');
	} else if($auth == False) {
		# redirect to login interface
		header('Location: /?auth=false');
	}
?>