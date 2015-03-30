<?php
	$servername="localhost"
	$username = $_POST['username'];
	$password = $_POST['password'];
	$userType = $_POST['usertype'];
	$dbname="pap";
	$conn = mysql_connect($servername, $username, $password,$userType,$dbname);
	if (!$conn) {}
    		#die("Connection failed") #mysql_error()

		

	$auth = False;
	
	$query=mysql_query("select user_name from auth WHERE pass_word='$password' && user_type='$userType');
	$exists=mysql_num_rows($query);
	if($exists==1)
	{
		if($query==$username)
			{
				$auth=True;
			}
		else
			{
				$auth=False;
			}
	}
			
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