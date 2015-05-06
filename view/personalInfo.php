<?php
	ob_start();
	include_once("../controller/view/personalInfo.php");
	$inStr = ob_get_clean();
	$input = json_decode($inStr, true);
	if($input[0]['data'] == 'true') {
?>
<div class="col-lg-6">
	<div class='panel panel-default'>
        <div class='panel-heading'>
            <h4>Personal Information</h4>
        </div>
        
        <div class='panel-body'>
            <div class='row'>
                <!-- profile picture -->
                <div class='col-md-3'>
                    <img id='profilePic' src='images/<?php #echo $input[0]['picName']; ?>' width='100%'>
                </div>
                                    
                <!-- full name -->
                <div class='col-md-9 detailsData'>
                    <div class='col-xs-5'>
                        <label>Full Name</label>
                    </div>
                    <div class='col-xs-7'><?php echo $input[0]['fullName']; ?></div>
                </div>
                
                <!-- date of birth -->
                <div class='col-md-9 detailsData'>
                    <div class='col-xs-5'>
                        <label>Date of Birth</label>
                    </div>
                    <div class='col-xs-7'><?php echo $input[0]['dob']; ?></div>
                </div>
                
                <!-- age -->
                <div class='col-md-9 detailsData'>
                    <div class='col-xs-5'>
                        <label>Age</label>
                    </div>
                    <div class='col-xs-7'><?php echo $input[0]['age']; ?></div>
                </div>
                    
                <!-- citizenship -->
                <div class='col-md-9 detailsData'>
                    <div class='col-xs-5'>
                        <label>Citizenship</label>
                    </div>
                    <div class='col-xs-7'><?php echo $input[0]['citizenship']; ?></div>
                </div>
                
                <!-- gender -->
                <div class='col-md-9 detailsData'>
                    <div class='col-xs-5'>
                        <label>Gender</label>
                    </div>
                    <div class='col-xs-7'><?php echo $input[0]['gender']; ?></div>
                </div>
                
                <!-- currect address -->
                <div class='col-md-12 detailsData'>
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
                    <div class='col-md-12 detailsData'>
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>Telephone Numbers</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['currTele']; ?></div>
                        </div>
                    </div>                        
                        
                    <!-- permanent address -->
                    <div class='col-md-12 detailsData'>
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
                    <div class='col-md-12 detailsData'>
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>Telephone Numbers</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['perTele']; ?></div>
                        </div>
                    </div>
                    
                    <!-- email Id -->
                    <div class='col-md-12 detailsData'>
                        <div class='row'>
                            <div class='col-xs-5'>
                                <label>E-mail ID</label>
                            </div>
                            <div class='col-xs-7'><?php echo $input[0]['email']; ?></div>
                        </div>
                    </div>
                    
                    <!-- father/guardian details -->
                    <div class='col-md-12 detailsData'>
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
                    <div class='col-md-12 detailsData'>
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
                    <div class='col-md-12 detailsData'>
                        <table class='table table-bordered'>
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
                                <form method='post' action='/controller/addLanguage.php'>
                                <tr>
                                    <td colspan='4'>
                                        <label>Add Language</label>
                                    </td>
                                    <td>
                                        <input type='submit' class='btn btn-group' value='Submit'>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <input class='form-control' type='text' name='language' placeholder='language' />
                                    </td>
                                    <td>
                                        <input type='radio' name='understand' value='yes'>Yes</input>
                                        <input type='radio' name='understand' value='no'>No</input>
                                    </td>
                                    <td>
                                        <input type='radio' name='speak' value='yes'>Yes</input>
                                        <input type='radio' name='speak' value='no'>No</input>
                                    </td>
                                    <td>
                                        <input type='radio' name='read' value='yes'>Yes</input>
                                        <input type='radio' name='read' value='no'>No</input>
                                    </td>
                                    <td>
                                        <input type='radio' name='write' value='yes'>Yes</input>
                                        <input type='radio' name='write' value='no'>No</input>
                                    </td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	}
?>