<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	if(!empty($_SESSION['username'])) {
?>

<div class="well well-lg">
	<h4>Personal Information</h4>
    
    <div class="divider"></div>
	
	<div class="row">
    	<div class="col-md-4">
        	<img src="../images/logo.png" width="100%">
		</div>
        
        <div class="col-md-8 detailsData">
        	<div class="col-xs-5">
            	<label>Full Name</label>
			</div>
			<div class="col-xs-7">Rohit Saluja</div>
		</div>
		
		<div class="col-md-8 detailsData">
        	<div class="col-xs-5">
            	<label>Date of Birth</label>
			</div>
			<div class="col-xs-7">4-8-1994</div>
		</div>
        
        <div class="col-md-8 detailsData">
        	<div class="col-xs-5">
            	<label>Age</label>
            </div>
            <div class="col-xs-7">21</div>
		</div>
                            
        <div class="col-md-8 detailsData">
        	<div class="col-xs-5">
            	<label>Citizenship</label>
			</div>
        	<div class="col-xs-7">Indian</div>
		</div>
                            
		<div class="col-md-8 detailsData">
        	<div class="col-xs-5">
            	<label>Gender</label>
			</div>
			<div class="col-xs-7">Male</div>
		</div>
	
	    <div class="detailsData">
    		<div class="row">
        		<div class="col-xs-5">
            		<label>Corresponding Address</label>
                </div>
                <div class="col-xs-7">WD-207, Hostel J, Thapar University</div>
			</div>
                            
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
        
        <div class="detailsData">
        	<div class="row">
            	<div class="col-xs-5">
                	<label>Telephone Numbers</label>
                </div>
                <div class="col-xs-7">+91-8437824996</div>
            </div>
        </div>                        
        
        <div class="detailsData">
        	<div class="row">
            	<div class="col-xs-5">
                	<label>Permanent Address</label>
                </div>
                <div class="col-xs-7">C-275, Sector F, Jankipuram</div>
			</div>
                            
            <div class="row">
            	<div class="col-xs-5">
                	<label>City</label>: Lucknow
                </div>
                
                <div class="col-xs-4">
                	<label>State</label>: Uttar Pradesh
				</div>
                
                <div class="col-xs-3">
                	<label>Pin</label>: 52201
                </div>
            </div>
		</div>
        
        <div class="detailsData">
        	<div class="row">
            	<div class="col-xs-5">
                	<label>Telephone Numbers</label>
                </div>
                <div class="col-xs-7">+91-522-2730389</div>
			</div>
		</div>
                        
        <div class="detailsData">
        	<div class="row">
            	<div class="col-xs-5">
                	<label>E-mail ID</label>
                </div>
                <div class="col-xs-7">ruhi.saluja@gmail.com</div>
			</div>
		</div>
		
        <div class="detailsData">
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
                <div class="col-xs-7">Defence Services</div>
			</div>
		</div>
                        
        <div class="detailsData">
        	<div class="row">
            	<div class="col-xs-5">
                	<label>Mother's Name</label>
                </div>
                <div class="col-xs-7">Mrs. Mitali Saluja</div>
			</div>
                            
           	<div class="row">
                <div class="col-xs-5">
                	<label>& Occupation</label>
				</div>
                <div class="col-xs-7">Home Maker</div>
			</div>
		</div>
		
        <div class="row">
        	<table class="table table-responsive">
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
				</tbody>
			</table>
		</div>
	</div>
</div>

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
		</tbody>
	</table>
</div>
                    
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
		</tbody>
	</table>
</div>
              
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
                <td rowspan="4"></td>
                <td>2013</td>
                <td>7.73</td>
                <td>7.73</td>
                <td>7.73</td>
                <td></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="well well-lg">
	<h4>Academic Achievements</h4>
    
	<div class="divider"></div>
    
	<ol type="1">
		<li></li>
	</ol>
</div>

<div class="well well-lg">
	<h4>Summer Training/Projects Undertaken</h4>
	
	<div class="divider"></div>
	
    <ol type="1">
		<li>Advanced Java - NIIT Bhuj | From 3 June, 2013 to 21 July, 2013</li>
		<li>Certified Information Security Expert - Innobuzz | From 3 June, 2013 to 21 July, 2013</li>
	</ol>
</div>

<div class="well well-lg">
	<h4>Extra Curricular Activities</h4>
	
    <div class="divider"></div>
	
	<ol type="1">
		<li>General Secretary and Chapter Leader of OWASP Thapar Student Chapter</li>
	<ol>                
</div>

<div class="well well-lg">
	<h4>Other Information</h4>
	
    <div class="divider"></div>            
    
	<ol type="1">
		<li></li>
	</ol>          
</div>

<?php
	} else
		header("Location: /");
?>