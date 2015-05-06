<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='student') {
			if(!empty($_SESSION['username'])) {
				# authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
?>

<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | Profile</title>

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
        
        <!-- script to populate the page -->
        <script>
			// ajax for retrieving data for personal info
			var user = <?php echo $_SESSION['username']; ?>;
			$.post("/view/personalInfo", {username: user}, function(data) {
				$("#personalInfo").html(data);
			});
			// ajax for retrieving data for academic records
			$.post("/controller/view/academicRecords", {username: user}, function(data){
				academicRecordDisplay(JSON.parse(data));
			});
			// ajax for retrieving data for be record
			$.post("/controller/view/be", {username: user}, function(data){
				beDisplay(JSON.parse(data));
			});
			// ajax for retrieving data for me record
			$.post("/controller/view/me", {username: user}, function(data){
				meDisplay(JSON.parse(data));
			});
			// ajax for retrieving data for academic achievement record
			$.post("/controller/view/academicAchievements", {username: user}, function(data){
				acadAchDisplay(JSON.parse(data));
			});
			// ajax for retrieving data for project record
			$.post("/controller/view/project", {username: user}, function(data){
				projDisplay(JSON.parse(data));
			});
			// ajax for retrieving data for extra curricular record
			$.post("/controller/view/extraActivities", {username: user}, function(data){
				extraCurrDisplay(JSON.parse(data));
			});
			// ajax for retrieving data for other information record
			$.post("/controller/view/otherInfo", {username: user}, function(data){
				otherInfoDisplay(JSON.parse(data));
			});
			
			// function for html output for academic record
			function academicRecordDisplay(input) {
				var out = "", i;
				for(i=0 ; i<input.length ; i++)
					out += "<tr><td>"+input[i].name+"</td><td>"+input[i].board+"</td><td>"+input[i].year+"</td><td>"+input[i].mm+"</td><td>"+input[i].mo+"</td><td>"+input[i].percent+"</td><td>"+input[i].divi+"</td></tr>";
				$("#academicRecord").html(out);
			}
			
			// function for html output for be record
			function beDisplay(input) {
				var out = "", i;
				for(i=0 ; i<input.length ; i++)
					out += "<tr><td>"+input[i].sem+"</td><td>"+input[i].uni+"</td><td>"+input[i].year+"</td><td>"+input[i].mm+"</td><td>"+input[i].mo+"</td><td>"+input[i].percent+"</td><td>"+input[i].divi+"</td></tr>";
				$("#be").html(out);
			}
			
			// function for html output for me record
			function meDisplay(input) {
				var out = "", i;
				if(input.length = 0) {
					$("#meContainer").css("visibility", "hidden");
				} else {
					for(i=0 ; i<input.length ; i++)
						out += "<tr><td>"+input[i].sem+"</td><td>"+input[i].uni+"</td><td>"+input[i].year+"</td><td>"+input[i].mm+"</td><td>"+input[i].mo+"</td><td>"+input[i].percent+"</td><td>"+input[i].divi+"</td></tr>";
				$("#me").html(out);
				}
			}

			// function for html output for academic achievement record
			function acadAchDisplay(input) {
				var out = "<ol type='1'>", i;
				if(input.length > 0)
					for(i=0 ; i<input.length ; i++)
						out += "<li>"+input.desc+"</li>";
				else
					out += "Nothing Found";
				out += "</ol>";
				$("#acadAch").html(out);
			}
			
			// function for html output for project record
			function projDisplay(input) {
				var out = "<ol type='1'>", i;
				if(input.length > 0)
					for(i=0 ; i<input.length ; i++)
						out += "<li>"+input.desc+"</li>";
				else
					out += "nohting found";
				out += "</ol>";
				$("#proj").html(out);
			}
			
			// function for html output for extra curricular record
			function extraCurrDisplay(input) {
				var out = "<ol type='1'>", i;
				if(input.length > 0)
					for(i=0 ; i<input.length ; i++)
						out += "<li>"+input.desc+"</li>";
				else
					out += "Nothing found";
				out += "</ol>";
				$("#extraCurr").html(out);
			}
			
			// function for html output for other information record
			function otherInfoDisplay(input) {
				var out = "<ol type='1'>", i;
				if(input.length > 0) {
					for(i=0 ; i<input.length ; i++)
						out += "<li>"+input.desc+"</li>";
				} else {
					out += "Nothing found";
				}
				out += "</ol>";
				$("#otherInfo").html(out);
			}
		</script>
            
	</head>

	<body>
   	<?php
		# include the header of the page
		include_once('head.php');
	?>
		<!-- background of the page -->
        <div class="body2"></div>
        
        <!-- main container for displaying personal information -->
		<div class="container">
        	<!-- division for display of personal information -->
    		<div id="personalInfo">
            </div>
            
    		<div class="col-md-6" id="acadAchContainer">
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
                            
                        <tbody id="academicRecord"></tbody>
					</table>
				</div>
			</div>
                    
		    <div class="col-md-6">
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
                            
        		        <tbody id="be"></tbody>
					</table>
				</div>
			</div>
    
		    <div class="col-md-6">                
				<div class="panel panel-default">
                	<div class="panel-heading">
						<h4>Masters of Engineering (M.E/M.Tech/MCA/M.Sc.)</h4>
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
                            
                        <tbody id="me"></tbody>
					</table>    
				</div>
			</div>
          
    		<div class="col-md-6">                
               	<div class="panel panel-default">
                   	<div class="panel-heading">
	                    <h4>Academic Achievements</h4>
                    </div>
                       
               		<div class="panel-body">
                        <div class="row" id="acadAch"></div>
                    </div>
               		
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
				</div>
			</div>
    		
		    <div class="col-md-6">                
				<div class="panel panel-default">
                	<div class="panel-heading">
						<h4>Summer Training/Projects Undertaken</h4>
					</div>
                        
					<div class="panel-body">
	                    <div class="row" id="proj"></div>
                    </div>
            
        		    <div class="panel-footer">
			            <form action="/controller/add/project.php" method="post" class="form-horizontal">
                        	<div class="form-group">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="desc" placeholder="Description" required />
                                </div>
                                <div class="col-xs-2">
                                    <input class=" pull-right btn btn-group" type="submit" value="Add" />
                                </div>
							</div>
						</form>
					</div>
				</div>
			</div>
    		
		    <div class="col-md-6">                
				<div class="panel panel-default">
                	<div class="panel-heading">
						<h4>Extra Curricular Activities</h4>
                    </div>
                        
					<div class="panel-body">
	                    <div class="row" id="extraCurr"></div>
                    </div>
		            
		            <div class="panel-footer">
	        		    <form action="/controller/add/ extraActivities.php" method="post" class="form-horizontal">
                        	<div class="form-group">
				                <div class="col-xs-10">
				                	<input class="form-control" type="text" name="desc" placeholder="Description" required />
				                </div>
		    		            <div class="col-xs-2">
                                	<input class="pull-right btn btn-group" type="submit" value="Add" />
                                </div>
                        	</div>
						</form>
					</div>
				</div>
			</div>
    		
		    <div class="col-md-6">
				<div class="panel panel-default">
                	<div class="panel-heading">
						<h4>Other Information</h4>
					</div>
                    
                    <div class="panel-body">
	                    <div class="row" id="otherInfo"></div>
                    </div>
            
		            <div class="panel-footer">
			            <form action="/controller/add/otherInfo.php" method="post" class="form-horizontal">
                        	<div class="form-group">
	        			        <div class="col-xs-10">
			    	            	<input class="form-control" type="text" name="desc" placeholder="Description" required />
        				        </div>
	    	    		        <div class="col-sm-2">
			            	        <input class="pull-right btn btn-group" type="submit" value="Add" />
			                	</div>
							</div>
						</form>
					</div>
				</div>     
			</div>
		</div>
	</body>
</html>

<?php
				} else
					header("Location: /login");
			} else {
				# user trying to access other folders
				switch($_SESSION['type']) {
					# user is coordinator
					case 'coordinator':
						header("Location: /coordinator/");
						break;
					case 'company':
						header("Location: /company/");
						break;
					case 'admin':
						header("Location: /admin/");
						break;
					default: 
						; # someone trying to play with session variables
				}
			}
		} else
			header("Location: /login");
	} else
		header("Location: /login");
?>