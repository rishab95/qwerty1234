<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='coordinator') {
			if(!empty($_SESSION['username'])) {
				# authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
					ob_start();
					include_once("../controller/timeline.php");
					$out = ob_get_clean();
					$outArr = json_decode($out, true);
					$len = count($outArr);
					if($len) {
?>
<!-- table to display the schedule -->
<table class='table table-hover'>
	<thead>
    	<col width="">
        <col width="83">
        <col width="61">
        <col width="100">
        <col width="32">
        
    	<tr>
            <th>Event</th>
            <th>Date</th>
            <th>Time</th>
            <th>Venue</th>
            <th></th>
        </tr>
	</thead>
	
    <!-- display all the mail received -->
    <tbody>
    <?php
		foreach($outArr as $val) {
	?>
    	<tr onClick="editEvent(<?php echo $val['eventId']; ?>)">
            <td><?php echo $val['eve']; ?></td>
            <td><?php echo $val['date']; ?></td>
            <td><?php echo $val['time']; ?></td>
            <td><?php echo $val['venue']; ?></td>
            <td onClick="removeEvent(<?php echo $val['eventId']; ?>);">
            	<span class="glyphicon glyphicon-remove"></span>
            </td>
		</tr>
    <?php
		}
    ?>
	</tbody>
</table>
<?php
					} else {
?>
<div class="panel-body"><center>No events declared</center></div>
<?php
					}
?>
<script>
	function removeEvent(id) {
		$.get("/controller/removeEvent
	}
</script>
<?php
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