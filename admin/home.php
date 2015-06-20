<?php
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
        
        <!-- script to use JSON and ajax to view output -->
        <script>
			// ajax call to display the interested student list
			$.post("/controller/companyList.php", {}, function(data) {
				companyListDisplay(JSON.parse(data));
			});
			
			// function for html output
			function companyListDisplay(arr) {
				var html_out = "";
				if(arr.length>0) {
					var i;
					for(i=0; i<arr.length; i++)
						html_out += "<tr onClick=\"loadDetails("+arr[i].username+")\"><td>"+arr[i].name+"</td><td>"+arr[i].date+"</td></tr>";
				} else {
					html_out += "No company here yet";
				}
				$("#companyListDiv").html(html_out);
			}
			
			// function to load deatils of the selected student
			function loadDetails(username) {
				$.post("/admin/viewCompanyDetails.php",
					{ 'username': username },
				function(data) {
					$('#detailsContainer').html(data);
				});
			}
        
			// script to search in table load details using ajax
			function searchTable(inputVal, table) {
				table.find('tr').each(function(index, row) {
					var allCells = $(row).find('td');
					if(allCells.length > 0) {
						var found = false;
						allCells.each(function(index, td) {
							var regExp = new RegExp(inputVal, 'i');
							if(regExp.test($(td).text())) {
								found = true;
								return false;
							}
						});
						if(found == true)
							$(row).show();
						else
							$(row).hide();
					}
				});
			}
			
			// ajax call for populating the timeline
			$.get("/controller/viewEvent.php?t=timeline", function(data) {
				timelineDisplay(JSON.parse(data));
			});

			// function for html output
			function timelineDisplay(arr) {
				var html_out = "";
				if(arr.length>0) {
					var i;
					for(i=0; i<arr.length; i++) {
						html_out += "<tr><td>"+arr[i].company+"</td><td>"+arr[i].eve+"</td><td>"+arr[i].venue+"</td><td>"+arr[i].date+"</td><td>"+arr[i].time+"</td></tr>";
					}
				} else {
					html_out += "<div style='text-align: center;'>Nothing on the calendar</div>";
				}
				$("#timelineContainer").html(html_out);
			}
		</script>            
	</head>

	<body>
        
        <?php
        	include_once('head.php');
		?>
        
        <div class="body2"></div>
        
        <!-- main container for displaying the body content -->
		<div class="container">
        	<div class="row">
                <div class="col-lg-5">
                	<div class="well well-lg">
                    	<div class="form-group">
       			        	<div class="input-group">
                   				<input type="search" class="form-control" placeholder="Search" oninput="searchTable(this.value, $('#tblTimeline'))" />
	                            <span class="input-group-btn">
      			                	<button class="btn btn-group" type="submit">
                   		        		<span class="glyphicon glyphicon-search"></span>
                           			</button>
                       			</span>
                    		</div>
						</div>
                        
						<!-- table to display the timeline -->
						<table class='table table-striped' id="tblTimeline">
							<thead>
								<tr>
									<th>Company Name</th>
									<th>Event</th>
									<th>Venue</th>
									<th>Date</th>
									<th>Time</th>
								</tr>
							</thead>
                            
							<!-- display all the schedule -->
							<tbody id="timelineContainer">
                            	<tr>
                                	<td colspan="5">
                                    	<p>Loading <img src="../images/loading.gif" alt="Loading" height="18"/></p>
                                    </td>
								</tr>
                            </tbody>
                    	</table>
                    </div>
                </div>            	

            	<div class="col-lg-3">
	                <div class="well-lg well">
                       	<div class="form-group">
       			        	<div class="input-group">
                   				<input type="search" class="form-control" placeholder="Search" oninput="searchTable(this.value, $('#tblCompany'))" />
	                            <span class="input-group-btn">
      			                	<button class="btn btn-group" type="submit">
                   		        		<span class="glyphicon glyphicon-search"></span>
                           			</button>
                       			</span>
                    		</div>
						</div>
                    	
                    	<div>
                        	<!-- table to display the list of companies -->
							<table class='table table-hover table-striped' id="tblCompany">
								<thead>
									<tr>
										<th>Name</th>
										<th>Last Date</th>
									</tr>
								</thead>
								
								<tbody id="companyListDiv">
                                	<tr>
                                    	<td colspan="2">
											<p>Loading <img src="../images/loading.gif" alt="Loading" height="18"/></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
						</div>
	                </div>
                </div>
                
                <div class="col-lg-4">
                	<div class="well well-lg">
                    </div>
                </div>
			</div>
		</div>
	</body>
</html>
<?php
				} else {
					session_destroy();
					header("Location: /login");
				}
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
						; # someone trying to play with session variables
				}
			}
		} else {
			session_destroy();
			header("Location: /login");
		}
	} else {
		session_destroy();
		header("Location: /login");
	}
?>