<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='admin') {
			if(!empty($_SESSION['username'])) {
				$username = $_SESSION['username'];
				# authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
					# obtain the id
					if(!empty($_GET['id'])) {
						$id = $_GET['id'];
					} else {
						# illegal request
						header("Location: /admin/home");
					}
?>
<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Coordinator | Company Details</title>
        
        <!-- link the icon of the page -->
        <link rel="icon" href="/images/logo.ico">

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
        
        <!-- custom JQuery script -->
        <script>
			var username = <?php echo $username; ?>;
			var id = <?php echo $id; ?>;
			
			// function to display the head of company details
			function displayHead(input) {
				var name = "";
				if(input.length!=0 && input[0].data=='true') {
					if(input[0].status == '1') {
						name = "*";
					}
					name += input[0].name;
					$("#name").html(name);
				} else {
					document.location="/admin/home";
				}
			}
			
			// function to refresh CTC
			function refreshCTC() {
				$.get("/controller/view/ctc", {id:id}, function(data) { 
					data = JSON.parse(data);
					if(data[0].data == 'true') {
						$("#companyCTC").val(data[0].ctc);
					}
				});
			}
			
			// function to refesh cg criteria
			function refreshCG() {
				$.get("/controller/view/cg", {id:id}, function(data) { 
					data = JSON.parse(data);
					if(data[0].data == 'true') {
						$("#companyCG").val(data[0].cg);
					}
				});
			}
			
			// function to refresh the last date of company
			function refreshLastDate() {
				$.get("/controller/view/lastDate", {id:id}, function(data) {
					data = JSON.parse(data);
					if(data[0].data == 'true') {
						$("#companyLastDate").val(data[0].date);
					}
				});
			}
			
			// function to refresh description company
			function refreshDescription() {
				$.get("/controller/view/description", {id:id}, function(data) {
					data = JSON.parse(data);
					if(data[0].data == 'true') {
						$("#companyDesc").val(data[0].desc);
					}
				});
			}
			
			// function to disply the description of company
			function displayBody(input) {
				if(input[0].desc != null) {
					$("#companyDesc").html(input[0].desc);
				}
				if(input[0].package != null) {
					$("#companyCTC").html(input[0].package);
				}
				if(input[0].cg != null) {
					$("#companyCG").html(input[0].cg);
				}
			}
						
			// function to remove the field from the database
			function removeEvent(id, ele) {
				$.post("/controller/delete/event", {id: id}, function(data) {
					var input = JSON.parse(data);
					if(input.auth) {
						ele = ele.parent();
						ele.slideUp("slow", function() {
							ele.remove();
						});
						ref();
					}
				});
			}
			
			// function to update the schedule with event id
			function updateEvent(eve_id) {
				var lin = "/controller/update/schedule?eve="+$("input[name='eve']").val()+"&d="+$("input[name='d']").val()+"&t="+$("input[name='t']").val()+"&v="+$("input[name='v']").val();
				$.post(lin, {id: eve_id}, function(data) {
					var input = JSON.parse(data);
					if(input.auth = 'true') {
						refreshSchedule();
					}
				});
			}
			
			function refreshSchedule() {
				$.post("/ajax/adminCompanySchedule?type=company", {username: id}, function(data1) { $("#companySchedule").html(data1);});
			}
			
			window.onload = function() {
				// ajax call to fetch head data
				var lin = "/controller/view/companyDetails?id="+id+"&p=head";
				$.post(lin, {username: username, type: 'coordinator'}, function(data) { displayHead(JSON.parse(data)); });
				// ajax call to fetch schedule
				refreshSchedule();
				refreshCTC();
				refreshCG();
				refreshLastDate();
				refreshDescription();
						
				$("#addToScheduleBtn").click(function() {
					var eve = $("input[name='eve']").val();
					var d = $("input[name='d']").val();
					var v = $("input[name='v']").val();
					var t = $("input[name='t']").val();
						$.post("/controller/add/schedule",
							{id: id, eve: eve, d: d, v: v, t: t},
							function(data) {
								data = JSON.parse(data);
							if(data.auth == 'true') {
								// ajax call to fetch schedule
								refreshSchedule();
								$("input[name='eve']").val("");
								$("input[name='d']").val("");
								$("input[name='v']").val("");
								$("input[name='t']").val("");
							} else {
							// display the error
							}
						}
					);
				});
				
				$("form").submit(function() {
					$(this).append("<input type='hidden' name='id' value='"+id+"' />");
					return true;
				});
			}
			
			// function to update the description
			function updateDescription() {
				var desc = $("#companyDesc").val();
				$.post("/controller/update/companyDetails/description",
					{desc: desc, id: id},
					function(data, status) {
						if(status == "success") {
							data = JSON.parse(data);
							if(data.auth == 'true') {
								// display success message
							} else {
								// dislplay error message
							}
						} else {
							// display error message
						}
					}
				);
			}
			
			// function to update the ctc
			function updateCTC() {
				var ctc = $("input[name='ctc'").val();
				$.post("/controller/update/companyDetails/CTC",
					{ctc: ctc, id: id},
					function(data, status) {
						if(status == "success") {
							data = JSON.parse(data);
							if(data.auth == 'true') {
								// display success message
							} else {
								// dislplay error message
							}
						} else {
							// display error message
						}
					}
				);
			}
			
			// function to update the CG Criteria
			function updateCG() {
				var cg = $("input[name='cg'").val();
				$.post("/controller/update/companyDetails/CG",
					{cg: cg, id: id},
					function(data, status) {
						if(status == "success") {
							data = JSON.parse(data);
							if(data.auth == 'true') {
								// display success message
							} else {
								// dislplay error message
							}
						} else {
							// display error message
						}
					}
				);
			}
			
			function updateDate() {
				var lastDate = $("input[name='last-date']").val();
				$.post("/controller/update/companyDetails/lastDate",
					{date: lastDate, id: id},
					function(data, status) {
						if(status == "success") {
							data = JSON.parse(data);
							if(data.auth == 'true') {
								// display success message
							} else {
								// dislplay error message
							}
						} else {
							// display error message
						}
					}
				);
			}
        </script>
	</head>

	<body>
        
        <?php
        	include_once('head.php');
		?>
        
        <div class="body2"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        	<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
	                    <div class="col-md-12">
    	                    <h2 id="name"></h2>
        	            </div>
                    </div>
                </div>
                
                <div class="panel-body" id="companyDetailsDiv">
					<!-- design of the company profile -->
                    <div class="row">
                        <div class="col-md-6">
	                        <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h3>Description</h3>
                                </div>
                                
                                <div class="panel-body">
                                    <div class="form-group">
                                       	<textarea class='form-control' name='companyDesc' maxlength='500' rows='6' placeholder='Description' title='Enter the description of company' id="companyDesc"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                      	<center>
                                          	<button class="btn btn-primary" type="button" onClick="updateDescription();">Update Description</button>
                                        </center>
                                	</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
	                        <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<div class="row">
                                    	<div class="col-xs-11">
		                                	<h3>Schedule</h3>
                                        </div>
                                        <div class="col-xs-1 pull-right" style="padding-top: 20px;">
                                        	<button class="btn btn-default" onClick="refreshSchedule();">
			                                    <span class="glyphicon glyphicon-refresh"></span>
                                            </button>
	                                    </div>
                                    </div>
                                </div>
                                
                                <div id="companySchedule"></div>
                                
                                <div class="panel-footer">
                                	<center>
	                                	<h4>Add to Schedule</h4>
                                    </center>
                                    
                                   	<div class="row">
                                    	<div class="col-sm-6">
                                        	<div class="form-group">
                                            	<input type="text" class="form-control" name="eve" placeholder="Event Description" title="Enter event description" value="" />
                                            </div>
                                            
                                            <div class="form-group">
                                            	<input type="text" class="form-control" name="v" placeholder="Venue" title="Enter venue of event" value=""/>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        	<div class="form-group">
                                            	<input type="date" class="form-control" name="d" placeholder="Event Date (yyyy/mm/dd)" title="Enter event date" value="" />
                                            </div>
                                            
                                            <div class="form-group">
                                            	<input type="time" class="form-control" name="t" placeholder="Event Time (hh:mm)" title="Enter event time" value="" />
                                            </div>
                                        </div>
                                 	</div>
                                    
                                    <center>
                                    	<div class="form-group">
                                        	<button class="btn btn-primary" type="button" id="addToScheduleBtn">Add to schedule</button>
	                                    </div>
                                   	</center>
                                </div>
                            </div>
                        </div>
                	</div>
                    
                    <div class="divider"></div>
                    
                    <div class="row">
                    	<div class="col-md-4">
                        	<div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h3>Last Date of Submission</h3>
                                </div>
                                
                                <div class="panel-body">
                                	<div class="form-inline">
                                    	<center>
                                        	<div class="form-group">
                                                <input class="form-control" name="last-date" type="date" placeholder="Last Date (yyyy-mm-dd)" title="Please choose the last date of submission" id="companyLastDate" />
                                               	<button class="btn btn-primary" type="button" onClick="updateDate();">Update Date</button>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                        	</div>
                    	</div>
                        
                    	<div class="col-md-4">
                        	<div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h3>CG Criteria</h3>
                                </div>
                                
                                <div class="panel-body">
                                	<div class="form-inline">
                                    	<center>
                                        	<div class="form-group">
                                                <input class="form-control" name="cg" type="text" placeholder="minimum CGPA criteria" id="companyCG" />
                                               	<button class="btn btn-primary" type="button" onClick="updateCG();">Update CG Criteria</button>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                        	</div>
                    	</div>
                        
                    	<div class="col-md-4">
                        	<div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h3>CTC</h3>
                                </div>
                                
                                <div class="panel-body">
                                	<div class="form-inline">
                                        <center>
                                            <div class="form-group">
                                                <input class="form-control" name="ctc" type="text" placeholder="CTC" id="companyCTC" value=""/>
                                                <button class="btn btn-primary" type="button" name="ctcBtn" onClick="updateCTC();">Update CTC</button>
                                            </div>
                                        </center>
                                	</div>
                                </div>
                        	</div>
                    	</div>
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
					case 'student':
						header("Location: /student/");
						break;
					case 'coordinator':
						header("Location: /coordinator/");
						break;
					case 'company':
						header("Location: /company/");
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