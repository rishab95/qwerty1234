<?php
	ob_start();
	include_once("../controller/searchCoordinator.php");
	$input = json_decode(ob_get_clean(), true);
	if(count($input) > 0) {
?>
<table class="table table-condensed table-hover">
	<thead>
    	<tr>
        	<th>Name</th>
        </tr>
    </thead>
	
    <tbody>
<?php
		for($i=0 ; $i<count($input) ; $i++) {
?>
		<tr onClick="selectCoordinator('<?php echo $input[$i]['username']; ?>', '<?php echo $input[$i]['name']; ?>');">
        	<td><?php echo $input[$i]['name']; ?></td>
        </tr>
<?php
		}
?>
    </tbody>
</table>
<?php
	}
?>