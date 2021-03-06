<?php
	# define what page it is
	$page = "search";
	
	# define the query for search
	isset($_GET['q']) ? $q=$_GET['q']:header("Location: /search?q=");
?>

<html>
	<head>

		<!-- meta characters to be inserted to increase searching -->
		<meta charset="utf-8">
        
        <!-- title of the page -->
		<title>PAP | Search</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Latest complied and minified JQuery -->
        <script src="bootstrap/jquery-2.1.3.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="style.css">
    	
        <!-- essential js file line -->
        <script src="ess.js"></script>
        
        <script>
			// foucs on the search input field
			$(document).ready(function() {
				$("#searchInput").focus();
            });
			// call function to populate the data in the search table
			window.onload = function() {
				Search();
			}
						
			// function for html output
			function searchDisplay(arr) {
				var html_out = "";
				if(arr.length>0) {
					var i;
					for(i=0; i<arr.length; i++) {
						html_out += "<tr>";
						html_out += "<td>"+arr[i].roll+"</td>";
						html_out += "<td>"+arr[i].name+"</td>";
						html_out += "<td>"+arr[i].email+"</td>";
						html_out += "</tr>";
					}
				} else {
					html_out += "<tr><td colspan='3'>No results Found</td></td>";
				}
				$("#searchResult").html(html_out);
			}
		</script>
	</head>

	<body>
    
	    <?php
			# include the header for this interface file
        	include_once('head.php');
		?>

		<!-- background for the page -->
        <div class="body2"></div>
		
        <!-- main body container -->
        <div class="container">
          	<div class="col-lg-8">
	           	<div class="well well-lg">
                    <!-- table to display the search results -->
					<table class='table table-striped'>
						<thead>
							<tr>
								<th>Roll Number</th>
		        	            <th>Name</th>
		                    	<th>E-mail</th>
							</tr>
						</thead>
                        
                        <tbody id="searchResult">
                    	</tbody>
					</table>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	<h4>Users also searched</h4>
                    </div>
                    <div class="panel-body">
                    	<ul>
                        	<li>Java</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>