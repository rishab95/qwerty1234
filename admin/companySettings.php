<?php
	# initialize variables
	$addCompanyPass = "";
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='admin') {
			if(!empty($_SESSION['username'])) {
				# authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
					# initialize all error message variables
					$nameError = "";
					$emailError = "";
					if(isset($_POST)) {
						if(isset($_POST['submit']) && $_POST['submit']=='Add Company') {
							# obtain the result of the registeration service
							ob_start();
							include_once("../controller/add/company.php");
							$inStr = ob_get_clean();
							# convert the output of registeration from json to assoc array
							$input = json_decode($inStr, true);
							echo $inStr;
							# validate if registration successfull
							$addCompanyPass = $input['auth'];
							if($addCompanyPass=='true') {
								$message = "The company has been added to the system. ".$input['username']." and ".$input['password']." are the username and password respectively.";
							} else {
								# get data in the error message variables
								$nameError = $input['nameError'];
								$name = $input['name'];
								$emailError = $input['emailError'];
								$email = $input['email'];
								$cooUsername = $input['coordinator'];
							}
						}
					}
?>
<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP > Admin > Company Settings</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        
        <!-- Latest complied and minified JQuery -->
        <script src="../bootstrap/jquery-2.1.3.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="../style.css">
        
        <!-- Custom common JQuery file -->
        <script src="../ess.js"></script>
        
        <!-- script to use JQuery effects and ajax to view output -->
        <script>
			// operation on page initialization
			$(document).ready(function(e) {
		<?php
			if($addCompanyPass == "") {
			} else {
				if($addCompanyPass=='true') {
		?>
				$("#addCompanyModalSuccessButton").click();
		<?php
				} else {
		?>
				$("#addCompany").slideDown("slow");
		<?php
				}
			} 
		?>
				// load the list of companies in the system
				$("#companyListDiv").load("/ajax/adminCompanyList?sort=az");
            });
			
			// function to search for the coordinator in the database by the inputted name
			function searchCoordinator() {
				var input = $("#searchCoo").val();
				if(input == "") {
					$("#searchCooResults").slideUp("slow");
				} else {
					var lin = "/ajax/searchCoordinator?q="+input;
					$.get(lin, 
						function(data) {
							$("#searchCooResults").html(data);
							$("#searchCooResults").slideDown("slow");
						});
				}
			}
			
			// function to add name and username in the list of assigned coordinators
			function selectCoordinator(username, name) {
				// activate a modal for confirmation
				
				// check if its the first coordinator assigned
				var content = $("#cooList").html();
				if(content == "") {
					$("#cooList").slideDown("slow");
				}
				
				// clear the table and the search input
				$("#searchCoo").val("");
				$("#searchCooResults").slideUp("slow");
				$("#searchCooResults").html("");
				
				// add the name of the selected coordinator in the list
				content = "<li class='list-group-item' onClick='deleteListItem($(this));' onMouseOver=\"this.style.cursor='pointer'\"><input type='hidden' name='coordinator[]' value='"+username+"'>"+name+"</li>";
				$("#cooList").append(content);
			}
			
			// function to delete the list item
			function deleteListItem(ele) {
				ele.slideToggle("slow", function() { ele.remove(); });
			}
			
			// function to confirm the add company option
			function confirmAddCompany() {
				return true;
			}
		</script>
            
	</head>

	<body>
        
        <?php
			# include the header file for interface
        	include_once('head.php');
		?>
        
        <!-- background for the page -->
        <div class="body2"></div>

		<!-- main body container -->
        <div class="container">        
        	<!-- modal for the confirmation of adding company -->
            <div id="addCompanyModal" class="modal fade" role="dialog">
            	<div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        	<h4 class="modal-title">Confirmation for adding company</h4>
                        </div>
                        <div class="modal-body" id="modal-body-addCompany">
                        	<p>The details you have added about the company canot be changed there after please confirm?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
                            <button type-"button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                    </div>            
				</div>
            </div>
            
            <!-- modal for the confirmation of adding company -->
            <div id="addCompanyModalSuccess" class="modal fade" role="dialog">
            	<!-- modal activation button -->
                <button  data-toggle="modal" data-target="#addCompanyModalSuccess" id="addCompanyModalSuccessButton" type="button" style="visibility: hiddin;"></button>
            	<div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content success">
                        <div class="modal-header">
                        	<h4 class="modal-title">Success</h4>
                        </div>
                        <div class="modal-body" id="modal-body-addCompany">
                        	<p><?php echo $message; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type-"button" class="btn btn-info" data-dismiss="modal">Ok</button>
                        </div>
                    </div>            
				</div>
            </div>

            
            <!-- modal for confirmation of the selected coordinator -->
		</div>
        
        <div class="col-sm-4 col-md-3 col-lg-2">
           	<div class="side-bar side-bar-left side-bar-inverse">
            	<!-- main container for disppalying the list of companyies -->
                <div class="panel panel-transparent panel-inverse">
	                <div class="panel-heading">
                    	<div class="form-group" style="margin-bottom: 0px;">
                            <div class="input-group">
                                <input type="search" class="head-input-inverse form-control" placeholder="Search" oninput="searchTable(this.value, $('#tblCompanyList'))" />
                                <span class="input-group-btn">
                                    <button class="btn btn-toolbar" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
               		</div>
                                
                                <div id="companyListDiv">
                                    <div class="panel-body">
                                        <label>Loading</label>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
            	</div>
            </div>
            
            <div class="col-sm-8 col-md-9 col-lg-10">
            
			<!-- container to display add company option -->
	        <div class="col-lg-3">
            	<div class="panel panel-default">
	    	        <div class="panel-heading" onClick="$('#addCompany').slideToggle('slow');" onMouseOver="this.style.cursor='pointer';">
                    	<center>
	    	               	<h4>Add Company</h4>
						</center>
   	    		    </div>
                	
                    <div id="addCompany">
                        <form action="/admin/companySettings" method="post" onSubmit="confirmAddCompany();">
	                        <div class="setting-panel panel-body">
                                <!-- input for company name -->
                                <div class="form-group <?php echo !empty($nameError)?"has-error":""; ?>">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="text" class="form-control" name="name" placeholder="Company name" value="<?php echo isset($name)?$name:""; ?>" title="Enter the company name" title="Enter the company name" required />
                                    </div>
                                </div>
                                
                                <!-- input for company email -->
                                <div class="form-group <?php echo !empty($emailError)?"has-error":""; ?>">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="email" class="form-control" name="email" placeholder="E-mail ID" value="<?php echo isset($name)?$email:""; ?>" title="Enter the company email id" required />
                                    </div>
                                </div>
                                
                                <!-- drop down for list of coordinators to assign coordinators -->
                                <div class="form-group">
                                	<div class="input-group">
                                    	<span class="input-group-addon">
                                        	<span class="glyphicon glyphicon-search"></span>
                                        </span>
										<input type="search" class="form-control" id="searchCoo" name="coordinatorSearch" placeholder="Search student" value="" title="Enter the name of the student" onKeyUp="searchCoordinator();" />
                                    </div>
                                </div>
                                
								<div id="searchCooResults"></div>
                                
                                <ul id="cooList" class="list-group"></ul>
                            </div>
                            <div class="panel-footer">
                            	<center>
	                                <!-- submit button -->
    	                            <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addCompanyModal" name="submit" value="Add Company" />
								</center>
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
					case 'student':
						header("Location: /student/");
						break;
					default: 
						; #someone trying to play with session variables
				}
			}
		} else
			header("Location: /login");
	} else
		header("Location: /login");
?>