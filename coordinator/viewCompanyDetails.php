<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='coordinator') {
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
						header("Location: /coordinator/home");
					}
?>
<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Coordinator | Company Details</title>

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
				if(input.length!=0 && input[0].data=='true') {
					if(input[0].status == '1') {
						input[0].name += '*';
					}
					$("#name").html(input[0].name);
				} else {
					document.location="/coordinator/home";
				}
			}
			
			// function to disply the description of company
			function displayBody(input) {
				if(input[0].desc != null) {
					$("#companyDesc").html(input[0].desc);
				}
			}
			
			// function to disply the last date of company
			function displayLastDate(input) {
				if(input[0].lastDate != null) {
					$("#companyLastDate").val(input[0].lastDate);
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
			
			// function to edit the fields in the database
			function editEvent(id, ele) {
				var htmlIn = ele.html().trim();
				var htmlOut = "";
				var arr = htmlIn.split("</td>");
				htmlOut += "<td><input class='form-control' name='eve' title='Description of the event' value='"+arr[0].trim().slice(4)+"' /></td>";
				htmlOut += "<td><input class='form-control' name='d' title='Date of the event' value='"+arr[1].trim().slice(4)+"' /></td>";
				htmlOut += "<td><input class='form-control' name='t' title='Time of the event' value='"+arr[2].trim().slice(4)+"' /></td>";
				htmlOut += "<td><input class='form-control' name='v' title='Venue of the event' value='"+arr[3].trim().slice(4)+"' /></td>";
				htmlOut += "<td onclick='updateSchedule("+id+")' style='padding-top: 15px; cursor: pointer;'><span class='glyphicon glyphicon-arrow-up'></span></td>";
				ele.attr("onclick", "");
				ele.css('cursor', 'default');
				ele.html(htmlOut);
			}
			
			// function to update the schedule with event id
			function updateSchedule(eve_id) {
				var lin = "/controller/update/schedule?eve="+$("input[name='eve']").val()+"&d="+$("input[name='d']").val()+"&t="+$("input[name='t']").val()+"&v="+$("input[name='v']").val();
				$.post(lin, {id: eve_id}, function(data) {
					var input = JSON.parse(data);
					if(input.auth = 'true') {
						ref();
					}
				});
			}
			
			function ref() {
				$.post("/ajax/companySchedule?type=company", {username: id}, function(data1) { $("#companySchedule").html(data1);});
			}
			
			window.onload = function() {
				// ajax call to fetch head data
				var lin = "/controller/view/companyDetails?id="+id+"&p=head";
				$.post(lin, {username: username, type: 'coordinator'}, function(data) { displayHead(JSON.parse(data)); });
				lin = "/controller/view/companyDetails?id="+id+"&p=body";
				$.post(lin, {username: username, type: 'coordinator'}, function(data) { displayBody(JSON.parse(data)); });
				lin = "/controller/view/companyDetails?id="+id+"&p=lastDate";
				$.post(lin, {username: username, type: 'coordinator'}, function(data) { displayLastDate(JSON.parse(data)); });
				// ajax call to fetch schedule
				ref();
						
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
								ref();
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
			
			// function to update the ctc
			function updateCTC() {
				var ctc = $("input[name='ctc'").val();
				$.post("/controller/update/companyDetails/CTC",
					{v: ctc, id: id},
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
				var lin = "/controller/update/companyDetails?type=date&id="+id;
				$.post(lin,
					{date: date},
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
                                	<form method="get" action="/controller/updateCompanyDetails">
                                    	<div class="form-group">
                                        	<textarea class='form-control' name='description' maxlength='500' rows='6' placeholder='Description' title='Enter the description of company' id="companyDesc"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<center>
                                            	<button class="btn btn-primary" type="submit">Update Description</button>
                                            </center>
                                        </div>
                                    </form>
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
                                        	<button class="btn btn-default" onClick="ref();">
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
                                	<form method="get" action="/controller/updateCompanyDetails" class="form-inline">
                                    	<center>
                                        	<div class="form-group">
                                                <input class="form-control" name="last-date" type="date" placeholder="Last Date (yyyy/mm/dd)" title="Please choose the last date of submission" id="companyLastDate" />
                                               	<button class="btn btn-primary" type="submit" onClick="updateDate();">Update Date</button>
                                            </div>
                                        </center>
                                    </form>
                                </div>
                        	</div>
                    	</div>
                        
                    	<div class="col-md-4">
                        	<div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h3>CG Criteria</h3>
                                </div>
                                
                                <div class="panel-body">
                                	<form method="get" action="/controller/updateCompanyDetails" class="form-inline">
                                    	<center>
                                        	<div class="form-group">
                                                <input class="form-control" name="cg" type="text" placeholder="minimum CGPA criteria" id="companyCG" />
                                               	<button class="btn btn-primary" type="submit">Update CG Criteria</button>
                                            </div>
                                        </center>
                                    </form>
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
                                                <input class="form-control" name="ctc" type="text" placeholder="CTC" id="companyCTC" />
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