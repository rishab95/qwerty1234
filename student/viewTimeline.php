<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	if(!empty($_SESSION['username'])) {			
?>
<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | <?php echo $page; ?></title>

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
			// ajax call
			var xmlhttp;
			if (window.XMLHttpRequest)
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			else
				// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
					var arr = JSON.parse(xmlhttp.responseText);
					display(arr);
			}
			xmlhttp.open("GET", "/controller/inbox.php", true);
			xmlhttp.send();	

			// function for html output
			function display(arr) {
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
					html_out += "<div style='text-align: center;'>Nothing on <?php echo ($page=="Timeline")?'the':'your';?> calendar</div>";
				}
				$("#eventDiv").html(html_out);
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
        
        <!-- main container for displaying mail -->
		<div class="container">
        	<div class="row">
            	<div class="well well-lg" id="eventDiv">
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