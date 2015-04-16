<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['username'])) {
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
		include_once('head.php');
	?>

		<!-- background of the page -->
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying personal information -->
		<div class="container">
            <div class="col-md-6">
                <div class="well well-lg">
                    <h4>Personal Information</h4>
                    
                    <div class="divider"></div>
                    
                    <div class="row">
                        <!-- profile picture -->
                        <div class="col-md-4">
                            <img src="images/101203081.png" width="100%">
                        </div>
                            
                        <!-- full name -->
                        <div class="col-md-8 detailsData">
                            <div class="col-xs-5">
                                <label>Full Name</label>
                            </div>
                            <div class="col-xs-7">Rohit Saluja</div>
                        </div>
                            
                        <!-- date of birth -->
                        <div class="col-md-8 detailsData">
                            <div class="col-xs-5">
                                <label>Date of Birth</label>
                            </div>
                            <div class="col-xs-7">4th August, 1994</div>
                        </div>
                            
                        <!-- age -->
                        <div class="col-md-8 detailsData">
                            <div class="col-xs-5">
                                <label>Age</label>
                            </div>
                            <div class="col-xs-7">20</div>
                        </div>
                            
                        <!-- citizenship -->
                        <div class="col-md-8 detailsData">
                            <div class="col-xs-5">
                                <label>Citizenship</label>
                            </div>
                            <div class="col-xs-7">Indian</div>
                        </div>
                            
                        <!-- gender -->
                        <div class="col-md-8 detailsData">
                            <div class="col-xs-5">
                                <label>Gender</label>
                            </div>
                            <div class="col-xs-7">Male</div>
                        </div>
                        
                        <!-- currect address -->
                        <div class="col-md-12 detailsData">  
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>Corresponding Address</label>
                                </div>
                                <div class="col-xs-7">WD-207, Hostel J, Thapar University</div>
                            </div>
                            
                            <!-- cite, state, pin -->
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>City</label>: Patiala
                                </div>
                                <div class="col-xs-4">
                                    <label>State</label>: Punjab
                                </div>
                                <div class="col-xs-3">
                                    <label>Pin</label>: 147001
                                </div>
                            </div>
                        </div>
                        
                        <!-- telephone numbers -->
                        <div class="col-md-12 detailsData">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>Telephone Numbers</label>
                                </div>
                                <div class="col-xs-7">+91-8437824996</div>
                            </div>
                        </div>                        
                        
                        <!-- permanent address -->
                        <div class="col-md-12 detailsData">    
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>Permanent Address</label>
                                </div>
                                <div class="col-xs-7">C-275, Sector F, Jankipuram</div>
                            </div>
                            
                            <!-- city, state, pin -->
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>City</label>: Lucknow
                                </div>
                                <div class="col-xs-4">
                                    <label>State</label>: Uttar Pradesh
                                </div>
                                <div class="col-xs-3">
                                    <label>Pin</label>: 
                                </div>
                            </div>
                        </div>
                        
                        <!-- telephone numbers -->
                        <div class="col-md-12 detailsData">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>Telephone Numbers</label>
                                </div>
                                <div class="col-xs-7">+91-522-2730389</div>
                            </div>
                        </div>
                        
                        <!-- email Id -->
                        <div class="col-md-12 detailsData">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>E-mail ID</label>
                                </div>
                                <div class="col-xs-7">ruhi.saluja@gmail.com</div>
                            </div>
                        </div>
                        
                        <!-- father/guardian details -->
                        <div class="col-md-12 detailsData">            
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>Father's/Guardian's Name</label>
                                </div>
                                <div class="col-xs-7">Gp Capt Yogesh Saluja</div>
                            </div>
                                        
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>& Occupation</label>
                                </div>
                                <div class="col-xs-7">Defence Service</div>
                            </div>
                        </div>
                        
                        <!-- mother details -->  
                        <div class="col-md-12 detailsData">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>Mother's Name</label>
                                </div>
                                <div class="col-xs-7">Mitali Saluja</div>
                            </div>
                                        
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>& Occupation</label>
                                </div>
                                <div class="col-xs-7">Home Maker</div>
                            </div>            
                        </div>
                    
                        <!-- language details -->
                        <div class="col-md-12 detailsData">
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
			</div>
    		
    		<div class="col-md-6">
		    	<div class="well well-lg">
					<h4>Academic Records</h4>
                    
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
					<h4>Masters of Engineering (M.E/M.Tech/MCA/M.Sc.)</h4>
                    
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
            		    <div class="col-xs-12 form-group">
                			<input class="form-control" type="text" name="desc" placeholder="Description" />
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
					</form>        
				</div>
			</div>
    		
		    <div class="col-md-6">                
				<div class="well well-lg">
					<h4>Extra Curricular Activities</h4>
                        
					<div class="divider"></div>
                        
					<ol type="1">
						<li>General Secretary and Chapter Leader of OWASP Thapar Student Chapter</li>
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
		</div>
	</body>
</html>

<?php
	} else
		header("Location: /login");
?>