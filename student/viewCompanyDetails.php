<?php
#	if(session_status() == PHP_SESSION_NONE)
#		session_start();
#	if(!empty($_SESSION['username'])) {
?>

<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | Company Details</title>

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
        
        <script>
			// ajax call
			$.get("/controller/viewCompanyDetails.php?id=<?php echo $id; ?>",
				function(data) {
					display(JSON.parse(data));
				});
			
			// function for html output
			function display(arr) {
				var html_out = "";
				if(arr.length>0) {
					html_out += "<!-- table to display the mail -->";
					html_out += "<table class='table table-hover'>"+
							"<thead>"+
								"<tr>"+
									"<th>Company Name</th>"+
									"<th>Message</th>"+
									"<th>Applied?</th>"+
									"<th>Last Date</th>"+
								"</tr>"+
							"</thead>"+
								
							"<!-- display all the mail received -->"+
							"<tbody>";
					var i;
					for(i=0; i<arr.length; i++) {
						html_out += "<tr onClick='redirect("+arr[i].companyId+")';>";
						html_out += "<td>"+arr[i].companyName+"</td>";
						html_out += "<td>"+arr[i].message+"</td>";
						html_out += "<td>"+arr[i].status+"</td>";
						html_out += "<td>"+arr[i].date+"</td>";
						html_out += "</tr>";
					}
					html_out += "</tbody>"+
						"</table>";
				} else {
					html_out += "<div style='text-align: center;'>No mail for you</div>";
				}
				$("#companyDetailsDiv").html(html_out);
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
        	<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
	                    <div class="col-md-10">
    	                    <h2>Microsoft</h2>
        	            </div>
            	        <div class="col-md-2">
                        	<h2>
                            	<a href="resume/">
                    	        	<button class="btn btn-group">Apply | View</button>
                        		</a>
                            </h2>
						</div>
                    </div>
                </div>
                
                <div class="panel-body" id="companyDetailsDiv">
					<!-- design of the company profile -->
                    <div class="col-md-6">
                    	<div class="panel panel-default">
	                    	<div class="panel-heading">
		                    	<h4>Description</h4>
							</div>
                            <div class="panel-body">
	                            <p id="description">This is sample description for the company</p>
                            </div>
            	        </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="panel panel-default">
	                    	<div class="panel-heading">
		                    	<h4>Schedule</h4>
							</div>
                        	
		                    <table class="table table-striped">
    		                  	<thead>
        		                   	<tr>
            		                   	<th>Event</th>
                		                <th>Date</th>
                    		        </tr>
                        	    </thead>
	                        </table>
						</div>
                    </div>
                </div>
			</div>
		</div>
	</body>
</html>

<?php
#	} else
#		header("Location: /");
?>