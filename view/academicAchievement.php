<?php
	ob_start();
	include_once("../controller/view/academicAchievements.php");
	$inStr = ob_get_clean();
	$input = json_decode($inStr, true);
?>

<div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Academic Achievements</h4>
		</div>
		
   		<div class="panel-body">
			<?php
    	       	if($input[0]['data'] == 'true') {
			?>
        	<ol type='1'>
              	<?php
					for($i=0; $i<count($input); $i++) {
				?>
               	<li><?php echo $input[$i]['desc']; ?></li>
                <?php
					}
				?>
			</ol>
            <?php
				} else {
			?>
            <p>No achievements found</p>
            <?php
				}
            ?>
        </div>
        
        <?php
			if(isset($_GET['view']) && $_GET['view'] == 'profile') {
		?>
        <div class="panel-footer">
        	<form action="/controller/add/academicAchievements.php" method="post" class="form-horizontal">
            	<div class="form-group">
                	<div class="col-xs-10">
                    	<input class="form-control" type="text" name="desc" placeholder="Description" required/>
                    </div>
                    <div class="col-xs-2">
                    	<input class="pull-right btn btn-group" type="submit" value="Add" />
                    </div>
                </div>
            </form>
		</div>
        <?php
			}
		?>
	</div>
</div>