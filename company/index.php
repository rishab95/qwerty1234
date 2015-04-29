<?php
/*	#check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	#check if user logged in correctly
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type'] == 'company') {
				if(!empty($_SESSION['username'])) {
					ob_start();
					include_once("/controller/login.php");
					$out = ob_get_clean();
					ob_end_clean();*/
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
			$.post("/controller/interestedList.php", {}, function(data) {
				interestedStudentDisplay(JSON.parse(data));
			});
			
			// function for html output
			function interestedStudentDisplay(arr) {
				var html_out = "";
				if(arr.length>0) {
					html_out += "<!-- table to display the list of interested students -->"+
						"<table class='table table-striped table-hover'>"+
					        "<colgroup>"+
								"<col width='10'>"+
                            "</colgroup>"+
							"<thead>"+
								"<tr>"+
									"<th></th>"+
									"<th>Roll Number</th>"+
									"<th>Name</th>"+
									"<th>Branch</th>"+
									"<th>CGPA</th>"+
								"</tr>"+
							"</thead>"+
							
							"<tbody>";
					var i;
					for(i=0; i<arr.length; i++) {
						html_out += "<tr onClick=\"loadDetails("+arr[i].roll+")\">";
						html_out += "<td><span class='glyphicon glyphicon-chevron-left'></span></td>";
						html_out += "<td>"+arr[i].roll+"</td>";
						html_out += "<td>"+arr[i].name+"</td>";
						html_out += "<td>"+arr[i].branch+"</td>";
						html_out += "<td>"+arr[i].cgpa+"</td>";
						html_out += "</tr>";
					}
					html_out += "</tbody>"+
						"</table>";
				} else {
					html_out += "<div style='text-align: center;'>No one has applied yet</div>";
				}
				$("#interestedStudentListDiv").html(html_out);
			}
			
			// function to load deatils of the selected student
			function loadDetails(roll) {
				$.post("/company/viewStuDetails.php", {
					'roll': roll,
				}, function($response) {
					$('#detailsContainer').html($response);
				});
			}
        
			// script to search in table load details using ajax
			$(document).ready(function() {
				$('#search').keyup(function() {
					searchTable($(this).val());
				});
			});

			function searchTable(inputVal) {
				var table = $('#tblData');
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
		</script>

            
	</head>

	<body>
        
        <?php
        	include_once('head.php');
		?>
        
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        	<div class="row">

                <div class="col-lg-6" id="detailsContainer">
                	<div class="well well-lg">
                    	Please click on student for details
                    </div>
                </div>            	

            	<div class="col-lg-6">
	                <div class="well-lg well">
                       	<div class="form-group">
       			        	<div class="input-group">
                   				<input type="search" class="form-control" placeholder="Search" id="search" />
	                            <span class="input-group-btn">
      			                	<button class="btn btn-group" type="submit">
                   		        		<span class="glyphicon glyphicon-search"></span>
                           			</button>
                       			</span>
                    		</div>
						</div>
                    
                    	<div id="interestedStudentListDiv">
							<h2>Loading</h2>
		           		    <img src="../images/loading.gif" alt="Loading" height="30"/>
						</div>
	                </div>
                </div>
                
			</div>
		</div>
	</body>
</html>

<?php
/*			} else
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
				case 'admin':
					header("Location: /admin/");
					break;
				default: 
					; # someone trying to play with session variables
			}
		}
	} else
		header("Location: /controller/logout");*/
?>