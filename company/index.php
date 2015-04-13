<?php
#	if(!empty($_SESSION['username'])) {
#		if(empty($_POST['roll']) && empty($_POST['name']) && empty($_POST['branch']) && empty($_POST['cgpa'])) {
#			header("Location: /controller/interestedList.php");
#		} else {
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
			var xmlhttp;
			if (window.XMLHttpRequest)
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			else
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp1.onreadystatechange = function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
					var arr1 = JSON.parse(xmlhttp.responseText);
					interestedStudentDisplay(arr1);
			}
			xmlhttp.open("POST", "/controller/interestedList.php", true);
			xmlhttp.send();	

			// function for html output
			function interestedStudentDisplay(arr) {
				var html_out = "";
				if(arr.length>0) {
					html_out += "<!-- table to display the mail -->";
					html_out += "<table class='table table-striped'>"+
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
								
							"<!-- display all the schedule -->"+
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
					html_out += "<div style='text-align: center;'>No on has applied</div>";
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
#		}
#	} else {
#		header("Location: /");
#	}
?>