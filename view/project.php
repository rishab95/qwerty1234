<?php
	ob_start();
	include_once("../controller/view/project.php");
	$inStr = ob_get_clean();
	$input = json_decode($inStr, true);
	$page = "";
	if(!empty($_GET['view']))
		$page = $_GET['view'];
?>

<div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Summer Training/Projects Undertaken</h4>
		</div>
		
   		<div class="panel-body">
			<?php
    	       	if($input[0]['data'] == 'true') {
					if($page == "resume") {
						for($i=0; $i<count($input); $i++) {
			?>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<input type="checkbox" value="<?php echo $username.$input[$i]['id']; ?>" name="proj[]" />
           	  		</span>
					<span class="form-control"><?php echo $input[$i]['desc']; ?></span>
            	</div>
            </div>
            <?php
						}
					} else {
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
					}
				} else {
			?>
            <p>No projects/trainings found</p>
            <?php
				}
            ?>
        </div>
        
        <?php
			if($page == 'profile') {
		?>
        <div class="panel-footer">
        	<div class="row">
            	<div class="col-xs-12">
		        	<form action="/controller/add/project" method="post" class="form-horizontal">
	                	<div class="input-group">
                        	<span class="input-group-addon">
                            	<span class="glyphicon glyphicon-pencil"></span>
                            </span>
	                    	<input class="form-control" type="text" name="desc" placeholder="Description" required/>
		                    <div class="input-group-btn">
		                    	<input class="pull-right btn btn-primary" type="submit" value="Add" />
                            </div>
	                    </div>
		            </form>
				</div>
			</div>
		</div>
        <?php
			}
		?>
	</div>
</div>