<?php
#	session_start();
	# check if user logged in
#	if( !empty($_SESSION['username']) ) {
		# check if data available to display
#		if( true /* condition */ ) {
?>

<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Company</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Latest complied and minified JQuery -->
        <script src="../bootstrap/jquery-2.1.3.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="../style.css">
            
	</head>

	<body>
    
    	<?php
			# include the header of the page
#			include_once('head.php');
		?>


        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        
        <?php
			# obtain data of for display
#			$roll = $_SESSION['username'];
#			$name = $_POST['name'];
#			$dob = $_POST['dob'];
#			$age = $_POST['age'];
#			$citizenship = $_POST['citizenship'];
#			$sex = $_POST['sex'];
#			$currAddr = $_POST['currAddr'];
#			$currCity = $_POST['currCity'];
#			$currState = $_POST['currState'];
#			$currPin = $_POST['currPin'];
#			$currTele = $_POST['currTele'];
#			$perAdrr = $_POST['perAddr'];
#			$perCity = $_POST['perCity'];
#			$perState = $_POST['perState'];
#			$perPin = $_POST['perPin'];
#			$perTele = $_POST['perTele'];
#			$email = $_POST['email'];
#			$fname = $_POST['fname'];
#			$foccu = $_POST['foccu'];
#			$mname = $_POST['mname'];
#			$moccu = $_POST['moccu'];
        ?>
        
        <div class="col-md-6">
        	<div class="well well-lg">
				<h4>Personal Information</h4>
                <div class="divider"></div>
                <div class="row">
                  	<!-- profile picture -->
                   	<div class="col-md-4">
                	    <img src="images/<?php #echo $roll; ?>.png" width="100%">
                    </div>
                        
					<!-- full name -->
					<div class="col-md-8 detailsData">
						<div class="col-xs-5">
							<label>Full Name</label>
						</div>
						<div class="col-xs-7"><?php #echo $name; ?></div>
					</div>
                        
					<!-- date of birth -->
					<div class="col-md-8 detailsData">
						<div class="col-xs-5">
                        	<label>Date of Birth</label>
                        </div>
                    	<div class="col-xs-7"><?php #echo $dob; ?></div>
                    </div>
                        
                    <!-- age -->
                    <div class="col-md-8 detailsData">
                    	<div class="col-xs-5">
                        	<label>Age</label>
                        </div>
                        <div class="col-xs-7"><?php #echo $age; ?></div>
                    </div>
                        
                    <!-- citizenship -->
                    <div class="col-md-8 detailsData">
                    	<div class="col-xs-5">
                        	<label>Citizenship</label>
                        </div>
                        <div class="col-xs-7"><?php #echo $citizenship; ?></div>
                    </div>
                        
                    <!-- gender -->
                    <div class="col-md-8 detailsData">
                    	<div class="col-xs-5">
                        	<label>Gender</label>
                        </div>
                        <div class="col-xs-7"><?php #echo $sex; ?></div>
                    </div>
        			
                    <!-- currect address -->
                    <div class="detailsData">  
                        <div class="row">
                            <div class="col-xs-5">
                                <label>Corresponding Address</label>
                            </div>
                            <div class="col-xs-7"><?php #echo $currAddr; ?></div>
                        </div>
                        
                        <!-- cite, state, pin -->
                        <div class="row">
                            <div class="col-xs-5">
                                <label>City</label>: <?php #echo $currCity; ?>
                            </div>
                            <div class="col-xs-4">
                                <label>State</label>: <?php #echo $currState; ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Pin</label>: <?php #echo $currPin; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- telephone numbers -->
                    <div class="detailsData">
                        <div class="row">
                            <div class="col-xs-5">
                                <label>Telephone Numbers</label>
                            </div>
                            <div class="col-xs-7"><?php #echo $currTele; ?></div>
                        </div>
                    </div>                        
                    
                    <!-- permanent address -->
                    <div class="detailsData">    
                        <div class="row">
                            <div class="col-xs-5">
                                <label>Permanent Address</label>
                            </div>
                            <div class="col-xs-7"><?php #echo $perAddr; ?></div>
                        </div>
                        
                        <!-- city, state, pin -->
                        <div class="row">
                            <div class="col-xs-5">
                                <label>City</label>: <?php #echo $perCity; ?>
                            </div>
                            <div class="col-xs-4">
                                <label>State</label>: <?php #echo $perState; ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Pin</label>: <?php #echo $perPin; ?>
                            </div>
                        </div>
                                
                    </div>
                    
                    <!-- telephone numbers -->
                    <div class="detailsData">
                        <div class="row">
                            <div class="col-xs-5">
                                <label>Telephone Numbers</label>
                            </div>
                            <div class="col-xs-7"><?php #echo $perTele; ?></div>
                        </div>
                    </div>
                    
                    <!-- email Id -->
                    <div class="detailsData">
                        <div class="row">
                            <div class="col-xs-5">
                                <label>E-mail ID</label>
                            </div>
                            <div class="col-xs-7"><?php #echo $email; ?></div>
                        </div>
                    </div>
                    
                    <!-- father/guardian details -->
                    <div class="detailsData">            
                        <div class="row">
                            <div class="col-xs-5">
                                <label>Father's/Guardian's Name</label>
                            </div>
                            <div class="col-xs-7"><?php #echo $fname; ?></div>
                        </div>
                                    
                        <div class="row">
                            <div class="col-xs-5">
                                <label>& Occupation</label>
                            </div>
                            <div class="col-xs-7"><?php #echo $foccu; ?></div>
                        </div>
                    </div>
                    
                    <!-- mother details -->  
                    <div class="detailsData">
	                    <div class="row">
    	                    <div class="col-xs-5">
        	                    <label>Mother's Name</label>
            	            </div>
                	        <div class="col-xs-7"><?php #echo $mname; ?></div>
                    	</div>
                                    
	                    <div class="row">
    	                    <div class="col-xs-5">
        	                    <label>& Occupation</label>
            	            </div>
                	        <div class="col-xs-7"><?php #echo $moccu; ?></div>
                    	</div>            
                	</div>
				</div>
                                
                <div class="row">
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
                                            
                            <tr>
                                <td>English</td>
                                <td>Yes</td>
                                <td>Yes</td>
                                <td>Yes</td>
                                <td>Yes</td>
                            </tr>
                                                
                            <tr>
                                <td>Hindi</td>
                                <td>Yes</td>
                                <td>Yes</td>
                                <td>Yes</td>
                                <td>Yes</td>
                            </tr>
                        <form method="post" action="/controller/addLanguage.php">
                            <tr>
                                <td colspan="4">
                                    <label>Add Language</label>
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-group" value="Submit">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input class="form-control" type="text" name="language" placeholder="language" />
                                </td>
                                <td>
                                    <input type="radio" name="understand" value="yes">Yes</input>
                                    <input type="radio" name="understand" value="no">No</input>
                                </td>
                                <td>
                                    <input type="radio" name="speak" value="yes">Yes</input>
                                    <input type="radio" name="speak" value="no">No</input>
                                </td>
                                <td>
                                    <input type="radio" name="read" value="yes">Yes</input>
                                    <input type="radio" name="read" value="no">No</input>
                                </td>
                                <td>
                                    <input type="radio" name="write" value="yes">Yes</input>
                                    <input type="radio" name="write" value="no">No</input>
                                </td>
                            </tr>
                        </form>
                                                
                        </tbody>
                                            
                    </table>
                </div>         
            </div>
	    </div>
    
    <div class="col-md-6">
    	<div class="well well-lg">
	       	<div>
				<h4>Academic Records</h4>
			</div>
                        
			<div class="divider"></div>
                        
            <table class="table table-bordered">
                        
				<thead>
					<tr>
						<th>Examination<br>Passed</th>
						<th>Univ./Board</th>
        	                        <th>Year of<br>Passing</th>
                                    <th>Maximum<br>Marks</th>
                                    <th>Marks<br>Obtained</th>
                                    <th>%age</th>
                                    <th>Division</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                            	<tr>
                                	<td>Class X</td>
                                    <td>CBSE</td>
                                    <td>2010</td>
                                    <td>60</td>
                                    <td>52.8</td>
                                    <td>88</td>
                                    <td>1st</td>
                                </tr>
                                
                                <tr>
                                	<td>Class XII</td>
                                    <td>CBSE</td>
                                    <td>2012</td>
                                    <td>440</td>
                                    <td>500</td>
                                    <td>88</td>
                                    <td>1st</td>
                                </tr>
                                
                                <tr>
                                	<td>Diploma</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                        	
                        </table>
                        
                    </div>
	</div>
                    
    <div class="col-md-6">
    	<div class="well well-lg">
			<h4>Bachelor of Engineering (B.E/B.Tech), Graduation:</h4>
            
            <div class="divider"></div>
            
            <table class="table table-bordered">
            	<thead>
                	<tr>
                    	<th>Examination<br>Passed</th>
						<th>Univ./Board</th>
        	            <th>Year of<br>Passing</th>
                        <th>Maximum<br>Marks/CGPA</th>
                        <th>Marks/CGPA<br>Obtained</th>
                        <th>%age/CGPA</th>
                        <th>Division</th>
                    </tr>
				</thead>
                            
                <tbody>
                	<tr>
                    	<td>1st Semester</td>
                        <td rowspan="8"></td>
                        <td>2013</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td></td>
					</tr>
                                
                    <tr>
                    	<td>2nd Semester</td>
                        <td>2013</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td></td>
					</tr>
                                
                    <tr>
                    	<td>3rd Semester</td>
                        <td>2014</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td></td>
                    </tr>
                                
                    <tr>
                    	<td>4th Semester</td>
                        <td>2014</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td></td>
					</tr>
                                
                    <tr>
                    	<td>5th Semester</td>
                        <td>2015</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td></td>
                    </tr>
                                
                    <tr>
                    	<td>6th Semester</td>
                        <td>2015</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td>7.73</td>
                        <td></td>
                    </tr>
                                
                    <tr>
                    	<td>7th Semester</td>
                        <td>2016</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                	<td>8th Semester</td>
                                    <td>2016</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                        	
                        </table>
                        
                    </div>
	</div>
    
    <div class="col-md-6">                
		<div class="well well-lg">
                    
                    	<div>
							<h4>Masters of Engineering (M.E/M.Tech/MCA/M.Sc.)</h4>
                        </div>
                        
                        <div class="divider"></div>
                        
                        <table class="table table-bordered">
                        
                        	<thead>
                            	<tr>
	                            	<th>Examination<br>Passed</th>
    	                            <th>Univ./Board</th>
        	                        <th>Year of<br>Passing</th>
                                    <th>Maximum<br>Marks/CGPA</th>
                                    <th>Marks/CGPA<br>Obtained</th>
                                    <th>%age/CGPA</th>
                                    <th>Division</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                            	<tr>
                                	<td>1st Semester</td>
                                    <td rowspan="6"></td>
                                    <td>2013</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                	<td>2nd Semester</td>
                                    <td>2013</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                	<td>3rd Semester</td>
                                    <td>2014</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                	<td>4th Semester</td>
                                    <td>2014</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                	<td>5th Semester</td>
                                    <td>2014</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                	<td>6th Semester</td>
                                    <td>2014</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td>7.73</td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                        	
                        </table>
                        
                    </div>
	</div>
          
    <div class="col-md-6">                
	    <div class="well well-lg">
		
			<h4>Academic Achievements</h4>
                        
			<div class="divider"></div>
			
            <div class="row">
                <ol type="1">
                    <li></li>
                </ol>
            </div>
            
            <div class="divider"></div>
            
            <form action="/controller/addAcademicAchievements.php" method="post">
                <div class="col-sm-9 form-group">
                    <label>Add Academic Achievements</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input class="btn btn-group" type="submit" value="Submit" />
                </div>
                <div class="col-xs-8 form-group">
                	<input class="form-control" type="text" name="desc" placeholder="Description" />
                </div>
                <div class="col-xs-4 form-group">
                	<input class="form-control" type="date" name="date" placeholder="Date" />
                </div>
			</form>
            
		</div>
	</div>
    
    <div class="col-md-6">                
		<div class="well well-lg">
        
			<h4>Summer Training/Projects Undertaken</h4>
                        
			<div class="divider"></div>
                        
			<ol type="1">
				<li>Advanced Java - NIIT Bhuj | From 3 June, 2013 to 21 July, 2013</li>
				<li>Certified Information Security Expert - Innobuzz | From 3 June, 2013 to 21 July, 2013</li>
			</ol>
            
            <div class="divider"></div>
            
            <form action="/controller/addProject.php" method="post">
                <div class="col-sm-9 form-group">
                    <label>Add Summer Training / Project Undertaken</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input class="btn btn-group" type="submit" value="Submit" />
                </div>
                <div class="col-xs-12 form-group">
                	<input class="form-control" type="text" name="desc" placeholder="Description" />
                </div>
                <div class="col-xs-6 form-group">
	                <input class="form-control" type="date" name="from" placeholder="from?">
                </div>
                <div class="col-xs-6 form-group">
    	            <input class="form-control" type="date" name="to" placeholder="to?">
                </div>
			</form>
                        
		</div>
	</div>
    
    <div class="col-md-6">                
		<div class="well well-lg">
        
			<h4>Extra Curricular Activities</h4>
                        
			<div class="divider"></div>
                        
			<ol type="1">
				<li>General Secretary and Chapter Leader of OWASP Thapar Student Chapter</li>
				<li>Publicity and Creative Coordinator of Microsoft Student Chapter - till Nov, 14</li>
				<li>Member of Organinzing team of SUR 6.0</li>
			</ol>
            
            <div class="divider"></div>
            
            <form action="/controller/addExtraActivities.php" method="post">
                <div class="col-sm-9 form-group">
                    <label>Add Extra Curricular Activities</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input class="btn btn-group" type="submit" value="Submit" />
                </div>
                <div class="col-xs-12 form-group">
                	<input class="form-control" type="text" name="desc" placeholder="Description" />
                </div>
                <div class="col-xs-6 form-group">
	                <input class="form-control" type="date" name="from" placeholder="from?">
                </div>
                <div class="col-xs-6 form-group">
    	            <input class="form-control" type="date" name="to" placeholder="to?">
                </div>
			</form>
                        
		</div>
	</div>
    
    <div class="col-lg-6">                
		<div class="well well-lg">
		
			<h4>Other Information</h4>
                        
			<div class="divider"></div>
                        
			<ol type="1">
               	<li></li>
			</ol>
            
            <div class="divider"></div>
            
            <form action="/controller/addOtherInfo.php" method="post">
                <div class="col-sm-9 form-group">
                    <label>Add Other Information</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input class="btn btn-group" type="submit" value="Submit" />
                </div>
                <div class="col-xs-12 form-group">
                	<input class="form-control" type="text" name="desc" placeholder="Description" />
                </div>
			</form>
                        
		</div>     
	</div>
    
	</body>
</html>

<?php
#		} else
#			header("Location: /controller/interestedList.php");
#	} else
#		header("Location: /");
?>