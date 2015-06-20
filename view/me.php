<?php
	ob_start();
	include_once("../controller/view/me.php");
	$inStr = ob_get_clean();
	$input = json_decode($inStr, true);
   	if($input[0]['data'] == 'true') {
?>

<div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Bachelor of Engineering (B.E/B.Tech), Graduation:</h4>
		</div>

		<table class="table table-bordered">
			<thead>
				<tr>
                	<th>Examination<br>Passed</th>
                    <th>Univ./Board</th>
                    <th>Year of<br>Passing</th>
                    <th>Maximum<br>Marks/CGPA</th>
                    <th>Marks/CGPA<br>Obtained</th>
                    <th>%age/CGPA</th>
				</tr>
			</thead>
            
			<tbody>
              	<?php
					for($i=0; $i<count($input); $i++) {
						$intToString = $input[$i]['sem'];
				?>
                <tr>
                	<td><?php echo include('../controller/intToStr.php'); ?></td>
                	<td><?php echo $input[$i]['uni']; ?></td>
                    <td><?php echo $input[$i]['year']; ?></td>
                    <td><?php echo $input[$i]['mm']; ?></td>
                    <td><?php echo $input[$i]['mo']; ?></td>
                    <td><?php echo $input[$i]['cgpa']; ?></td>
                </tr>
				<?php
					}
				?>
            </tbody>
		</table>
	</div>
</div>
<?php
	}
?>