<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	if(!empty($_SESSION['username'])) {			
?>
<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | Home</title>

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
			// ajax call for inbox
			$.post("/controller/inbox.php",
			{},
			function(data, status) {
				var arr = JSON.parse(data);
				inboxDisplay(arr);
			});

			// function for html output
			function inboxDisplay(arr) {
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
						html_out += "<tr onClick='document.location = \'/student/?p=viewCompanyDetails&id="+arr[i].companyId+";'>";
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
				$("#inboxDiv").html(html_out);
			}
			
			// ajax call for schedule
			$.get("/controller/viewEvent.php?t=schedule",
			function(data, status) {
				var arr= JSON.parse(data);
				scheduleDisplay(arr);
			});
			
			// function for html output
			function scheduleDisplay(arr) {
				var html_out = "";
				if(arr.length>0) {
					html_out += "<!-- table to display the mail -->";
					html_out += "<table class='table table-striped'>"+
							"<thead>"+
								"<tr>"+
									"<th>Company Name</th>"+
									"<th>Event</th>"+
									"<th>Venue</th>"+
									"<th>Date</th>"+
									"<th>Time</th>"+
								"</tr>"+
							"</thead>"+
								
							"<!-- display all the schedule -->"+
							"<tbody>";
					var i;
					for(i=0; i<arr.length; i++) {
						html_out += "<tr>";
						html_out += "<td>"+arr[i].company+"</td>";
						html_out += "<td>"+arr[i].eve+"</td>";
						html_out += "<td>"+arr[i].venue+"</td>";
						html_out += "<td>"+arr[i].date+"</td>";
						html_out += "<td>"+arr[i].time+"</td>";
						html_out += "</tr>";
					}
					html_out += "</tbody>"+
						"</table>";
				} else {
					html_out += "<div style='text-align: center;'>Nothing on your calendar</div>";
				}
				$("#scheduleDiv").html(html_out);
			}
		</script>
            
	</head>

	<body>
        
        <?php
			# include the header file for interface
        	include_once('head.php');
		?>
        
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>

		<!-- main body container -->
        <div class="container">        
        	<!-- main container for displaying mail -->
	        <div class="col-lg-6">
    	        <div class="heading">
                   	<h3>Inbox</h3>
   	    	    </div>
                
                <div class="well well-lg" id="inboxDiv">
                    <h2>Loading</h2>
                    <img src="../images/loading.gif" alt="Loading" height="30"/>
                </div>
            </div>
        
	        <!-- main container for displaying the schedule -->
    	    <div class="col-lg-6">
    	        <div class="heading">
                   	<h3>Schedule</h3>
   	    	    </div>
                
                <div class="well well-lg" id="scheduleDiv">
                    <h2>Loading</h2>
                    <img src="../images/loading.gif" alt="Loading" height="30"/>
                </div>
            </div>
		</div>
	</body>
</html>
<?php
	} else
		header("Location: /");
?>