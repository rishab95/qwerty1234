<?php
	ob_start();
	include_once("../controller/searchCoordinator.php");
	$input = json_decode(ob_get_clean(), true);
	if(count($input) > 0) {
		for($i=0 ; $i<count($input) ; $i++) {
?>
		<li class='list-group-item' onClick='deleteListItem($(this));' onMouseOver="this.style.cursor='pointer'"><input type='hidden' name='coordinator[]' value='<?php echo $input[$i]['username']; ?>'><?php echo $input[$i]['name']; ?></li>
<?php
		}
	}
?>