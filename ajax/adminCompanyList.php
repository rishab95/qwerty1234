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
					$_POST['username'] = $_SESSION['username'];
					include_once("../controller/companyList.php");
					$out = ob_get_clean();
					$outArr = json_decode($out, true);
					$len = count($outArr);
					if($len) {
?>
<!-- table to display the mail -->
<table class='table table-hover table-condensed' id="tblCompanyList">
    <!-- display all the companies -->
    <tbody>
    <?php
		foreach($outArr as $val) {
	?>
    	<tr onClick="document.location = '/admin/viewCompanyDetails?id=<?php echo $val['companyId']; ?>'">
            <td><?php echo $val['companyName']; ?></td>
		</tr>
    <?php
		}
    ?>
	</tbody>
</table>
<?php
					} else {
?>
<div class="panel-body"><center>No companies in the system</center></div>
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
					case 'coordinator':
						header("Location: /coordinator/");
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