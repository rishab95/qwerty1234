<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	if(!empty($_SESSION['username'])) {
		ob_start();
		include_once("../controller/view/personalInfo.php");
		$inStr = ob_get_clean();
		$input = json_decode($inStr, true);
		if($input[0]['data'] == 'true') {
			$page = "";
			if(isset($_GET['view']))
				$page = $_GET['view'];
?>
<div>
	<div class='panel panel-default'>
        <div class='panel-heading'>
            <h4>Personal Information</h4>
        </div>
        
        <div class='panel-body'>
        	<div class="col-md-12">
                <div class='row detailsData'>
                    <!-- profile picture -->
                    <div class='col-sm-3'>
                        <img id='profilePic' src='/student/images/<?php echo $input[0]['username']; ?>.jpg' width='100%'>
                    </div>
                    
                    <div class="col-sm-9">
                        <!-- full name -->
                        <div class='row detailsData'>
                            <div class='col-xs-5'>
                                <label>Full Name</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['fullName']; ?></div>
                        </div>
                        
                        <!-- date of birth -->
                        <div class='row detailsData'>
                            <div class='col-xs-5'>
                                <label>Date of Birth</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['dob']; ?></div>
                        </div>
                        
                        <!-- age -->
                        <div class='row detailsData'>
                            <div class='col-xs-5'>
                                <label>Age</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['age']; ?></div>
                        </div>
                            
                        <!-- citizenship -->
                        <div class='row detailsData'>
                            <div class='col-xs-5'>
                                <label>Citizenship</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['citizenship']; ?></div>
                        </div>
                        
                        <!-- gender -->
                        <div class='row detailsData'>
                            <div class='col-xs-5'>
                                <label>Gender</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['gender']; ?></div>
                        </div>
                        
                        <!-- email Id -->
                        <div class='row '>
                            <div class='col-xs-5'>
                                <label>E-mail ID</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['email']; ?></div>
                        </div>
    
                    </div>
                </div>
            

                <!-- currect address -->
                <div class='row detailsData'>
                    <div class='row'>
                        <div class='col-xs-5'>
                            <label>Corresponding Address</label>
                        </div>
                        <div class='col-xs-7'><?php echo $input[0]['currAddr']?></div>
                    </div>
                    
                    <!-- cite, state, pin -->
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>City</label>: <?php echo $input[0]['currCity']; ?>
                            </div>
                            <div class='col-xs-4'>
                                <label>State</label>: <?php echo $input[0]['currState']; ?>
                            </div>
                            <div class='col-xs-3'>
                                <label>Pin</label>: <?php echo $input[0]['currPin']; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- telephone numbers -->
                    <div class='row detailsData'>
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>Telephone Numbers</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['currTele']; ?></div>
                        </div>
                    </div>                        
                        
                    <!-- permanent address -->
                    <div class='row detailsData'>
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>Permanent Address</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['perAddr']; ?></div>
                        </div>
                        
                        <!-- city, state, pin -->
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>City</label>: <?php echo $input[0]['perCity']; ?>
                            </div>
                            <div class='col-xs-4'>
                                <label>State</label>: <?php echo $input[0]['perState']; ?>
                            </div>
                            <div class='col-xs-3'>
                                <label>Pin</label>: <?php echo $input[0]['perPin']; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- telephone numbers -->
                    <div class='row detailsData'>
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>Telephone Numbers</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['perTele']; ?></div>
                        </div>
                    </div>
                                        
                    <!-- father/guardian details -->
                    <div class='row detailsData'>
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>Father's/Guardian's Name</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['fname']; ?></div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>& Occupation</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['foccu']; ?></div>
                        </div>
                    </div>
                    
                    <!-- mother details -->
                    <div class='row'>
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>Mother's Name</label>
                            </div>
                        <div class='col-xs-7'><?php echo $input[0]['mname']; ?></div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-xs-5'>
                            <label>& Occupation</label>
                        </div>
                        <div class='col-xs-7'><?php echo $input[0]['moccu']; ?></div>
                    </div>
                </div>
                <!-- language details -->
                <table class="table table-bordered">        	
    	        	<thead>
	                	<tr>
                    		<th>Language</th>
                    	    <th>Understand</th>
                	        <th>Speak</th>
            	            <th>Read</th>
        	                <th>Write</th>
						</tr>
					</thead>
                    
                    <tbody>
                    </tbody>
                </table>
			</div>
		</div>
        
        <?php
				if($page == 'profile') {
		?>
		<div class='panel-footer'>
			<h4>Language</h4>
            <form method='post' action='/controller/addLanguage.php'>
            	<div class="row">
	            	<div class="col-xs-12">
		            	<div class="form-group">
        	            	<div class="input-group">
            	            	<span class="input-group-addon">
                	            	<span class="glyphicon glyphicon-pencil"></span>
                    	        </span>
	    	            		<input class='form-control' type='text' name='language' placeholder='Language' required />
                            	<div class="input-group-btn">
									<input type='submit' class='pull-right btn btn-default' value='Submit'>                                
	                            </div>
		        	        </div>
        		        </div>
					</div>
                </div>
                <div class="row">
                	<div class="col-sm-3">
                    	<div class="form-group">
                        	<label>Understand</label>
                            <div class="input-group">
                            	<span class="input-group-addon">
		                            <input type='radio' name='understand' value='yes' />
                                </span>
                                <span class="form-control">Yes</span>
                            </div>
                            <div class="input-group">
                            	<span class="input-group-addon">
                                	<input type='radio' name='understand' value='no' />
                                </span>
                                <span class="form-control">No</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    	<div class="form-group">
                        	<label>Speak</label>
                            <div class="input-group">
                            	<span class="input-group-addon">
                                	<input type='radio' name='speak' value='yes' />
                                </span>
                                <span class="form-control">Yes</span>
                            </div>
                            <div class="input-group">
                            	<span class="input-group-addon">
                                	<input type='radio' name='speak' value='no' />
                                </span>
                                <span class="form-control">No</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Read</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type='radio' name='read' value='yes' />
                                </span>
                                <span class="form-control">Yes</span>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type='radio' name='read' value='no' />
                                </span>
                                <span class="form-control">No</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    	<div class="form-group">
	                        <label>Write</label>
                            <div class="input-group">
                            	<span class="input-group-addon">
                                	<input type='radio' name='write' value='yes' />
                                </span>
                                <span class="form-control">Yes</span>
                             </div>
                             <div class="input-group">
                             	<span class="input-group-addon">
                                	<input type='radio' name='write' value='no' />
                                </span>
                                <span class="form-control">No</span>
                            </div>
                        </div>
                    </div>
				</div>
			</form>
        </div>
        <?php
				}
		?>
    </div>
</div>
<?php
		}
	} else
		header("Location: /");
?>