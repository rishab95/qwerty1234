<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='admin') {
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
	<colgroup>
    	<col width="">
        <col width="112">
        <col width="86">
        <col width="130">
        <col width="30">
        <col width="30">
    </colgroup>
    
	<thead>
    	<tr>
            <th>Event</th>
            <th>Date</th>
            <th>Time</th>
            <th>Venue</th>
            <th></th>
            <th></th>
        </tr>
	</thead>
	
    <!-- display all the mail received -->
    <tbody>
    <?php
		foreach($outArr as $val) {
	?>
    	<tr>
            <td>
				<input type="text" title="Event description" value="<?php echo $val['eve']; ?>" class="form-control" />
            </td>
            <td>
				<input type="date" title="Date" value="<?php echo $val['date']; ?>" class="form-control" />
            </td>
            <td>
				<input type="time" title="Time" value="<?php echo $val['time']; ?>" class="form-control" />
            </td>
            <td>
				<input type="text" title="Venue" value="<?php echo $val['venue']; ?>" class="form-control" />
            </td>
            <td>
            	<button type="button" class="btn btn-default" onClick="updateEvent(<?php echo $val['eventId']; ?>);" style="padding: 8px 0px;">
	            	<span class="glyphicon glyphicon-arrow-up"></span>
                </button>
            </td>
            <td>
            	<button type="button" class="btn btn-default" onClick="removeEvent(<?php echo $val['eventId']; ?>, $(this));" style="padding: 8px 0px;">
	            	<span class="glyphicon glyphicon-remove"></span>
                </button>
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
				} else
					header("Location: /login");
			} else {
				# user trying to access other folders
				switch($_SESSION['type']) {
					case 'company':
						header("Location: /company/");
						break;
					case 'coordinator':
						header("Location: /coordinator/");
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