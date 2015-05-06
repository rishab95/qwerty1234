<?php
	ob_start();
	include_once("../controller/view/academicRecords.php");
	$inStr = ob_get_clean();
	$input = json_decode($inStr, true);
?>
<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Academic Records</h4>
		</div>
		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Examination<br>Passed</th>
                    <th>Univ./Board</th>
                    <th>Year of<br>Passing</th>
                    <th>Maximum<br>Marks</th>
                    <th>Marks<br>Obtained</th>
                    <th>%age</th>
				</tr>
			</thead>
			<?php
            	if($input[0]['data'] == 'true') {
			?>
			<tbody>
              	<?php
					for($i=0; $i<count($input); $i++) {
				?>
                <tr>
                	<td><?php echo $input[$i]['name']; ?></td>
                	<td><?php echo $input[$i]['board']; ?></td>
                    <td><?php echo $input[$i]['year']; ?></td>
                    <td><?php echo $input[$i]['mm']; ?></td>
                    <td><?php echo $input[$i]['mo']; ?></td>
                    <td><?php echo $input[$i]['percent']; ?></td>
                </tr>
				<?php
					}
				?>
            </tbody>
			<?php
				}
			?>
		</table>
	</div>
</div>