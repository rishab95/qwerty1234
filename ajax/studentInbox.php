<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='student' || $_SESSION['type']=='coordinator') {
			if(!empty($_SESSION['username'])) {
				# authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
					$username = $_SESSION['username'];
					$_POST['username'] = $username;
					ob_start();
					include_once("../controller/inbox.php");
					$out = ob_get_clean();
					$outArr = json_decode($out, true);
					$len = count($outArr);
					if($len) {
?>
<!-- table to display the mail -->
<table class='table table-hover'>
	<thead>
    	<tr>
        	<th>Company Name</th>
            <th>Message</th>
            <th>Applied?</th>
            <th>Last Date</th>
        </tr>
	</thead>
	
    <!-- display all the mail received -->
    <tbody>
    <?php
		foreach($outArr as $val) {
	?>
    	<tr onClick=\"document.location = \'/student/viewCompanyDetails?id=<?php echo $val['companyId']; ?>\';\">
        	<td><?php echo $val['companyName']; ?></td>
            <td><?php echo $val['message']; ?></td>
            <td><?php echo $val['status']; ?></td>
            <td><?php echo $val['date']; ?></td>
    <?php
		}
    ?>
		</tr>
	</tbody>
</table>
<?php
					} else {
?>
<center>No mail for you</center>
<?php
					}
				} else
					header("Location: /login");
			} else {
				# user trying to access other folders
				switch($_SESSION['type']) {
					# user is coordinator
					case 'company':
						header("Location: /company/");
						break;
					case 'admin':
						header("Location: /admin/");
						break;
					default: 
						; # someone trying to play with session variables
				}
			}
		} else {
			session_destroy();
			header("Location: /login");
		}
	} else {
		session_destroy();
		header("Location: /login");
	}
?>