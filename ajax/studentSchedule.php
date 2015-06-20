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
					ob_start();
					$_POST['username'] = $username;
					include_once("../controller/viewEvent.php");
					$out = ob_get_clean();
					$outArr = json_decode($out, true);
					$len = count($outArr);
					if($len) {
?>
<!-- table to display the schedule -->
<table class='table table-hover'>
	<thead>
    	<tr>
            <th>Company Name</th>
            <th>Event</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
	</thead>
	
    <!-- display all the mail received -->
    <tbody>
    <?php
		foreach($outArr as $val) {
	?>
    	<tr>
        	<td><?php echo $val['company']; ?></td>
            <td><?php echo $val['eve']; ?></td>
            <td><?php echo $val['venue']; ?></td>
            <td><?php echo $val['date']; ?></td>
            <td><?php echo $val['time']; ?></td>
		</tr>
    <?php
		}
    ?>
	</tbody>
</table>
<?php
					} else {
?>
<center>Nothing on <?php echo (isset($_GET['t']) && $_GET['t']=='schedule') ? 'your' : 'the'; ?> calender</center>
<?php
					}
				} else
					header("Location: /login");
			} else {
				# user trying to access other folders
				switch($_SESSION['type']) {
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
		} else
			header("Location: /login");
	} else
		header("Location: /login");
?>