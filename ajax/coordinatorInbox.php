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
					include_once("../controller/inbox.php");
					$out = ob_get_clean();
					$outArr = json_decode($out, true);
					$len = count($outArr);
					if($len) {
?>
<!-- table to display the mail -->
<table class='table table-hover'>
	<colgroup>
		<col width="30">
    	<col width="80">
        <col>
        <col width="65">
    </colgroup>

	<thead>
    	<tr>
        	<th></th>
            <th>From</th>
            <th>Message</th>
        	<th>Date</th>
        </tr>
	</thead>
	
    <!-- display all the mail received -->
    <tbody>
    <?php
		foreach($outArr as $val) {
			# convert label into array
			$val['label'] = explode("+", $val['label']);
	?>
    	<tr onClick="<?php if($val['read']!='read') { ?>updateReadStatus(<?php echo $val['messageId']; ?>, $(this)); <?php } ?>showMessage(<?php echo $val['messageId']; ?>, $(this));" class="<?php echo ((in_array('u', $val['label']))?'danger':'')." ".$val['read'];?>">
    <?php
			if(in_array('n', $val['label'])) {
	?>
        	<td><span class="glyphicon glyphicon-plus"></span></td>
    <?php
			} else {
	?>
	        <td></td>
    <?php
			}
	?>
            <td><?php echo $val['from']; ?></td>
            <td><?php echo $val['message']; ?></td>
            <td><?php echo $val['date']; ?></td>
		</tr>
    <?php
		}
    ?>
	</tbody>
</table>
<?php
					} else {
?>
<div class="panel-body"><center>No mail for you</center></div>
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