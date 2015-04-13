<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	if(!empty($_SESSION['username'])) {
?>

<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
        
        <!-- title of the page -->
		<title>PAP | Student | Inbox</title>

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
        
        <!-- script to use JSON to view output -->
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
			xmlhttp.open("POST", "/controller/inbox.php", true);
			xmlhttp.send();	

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
					html_out += "<tr><td></td><td colspan='2'>No mail for you</td><td></td></tr>";
				}
				$("#inboxDiv").html(html_out);
			}
			
			function redirect(id) {
				document.location = "/student/?p=viewCompanyDetails&id="+id;
			}
		</script>
            
	</head>

	<body>
        
        <?php
			# include the header of the page
        	include_once('head.php');
		?>
        
        <!-- background of the page -->
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        	<div class="row">
            	<div class="well well-lg" id="inboxDiv">
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