<?php
	$q = empty($_GET['q'])?"":$_GET['q'];
?>

<html>
	<head>
        <!-- script to use JSON and ajax to view output -->
        <script>
			// ajax call for search results
			$.get("/controller/search.php?q=<?php echo $q; ?>", function(data, success) {
				searchDisplay(JSON.parse(data));
			});
			
			// function for html output
			function searchDisplay(arr) {
				var html_out = "";
				if(arr.length>0) {
					html_out += "<!-- table to display the search results -->"+
						"<table class='table table-striped'>"+
							"<thead>"+
								"<tr>"+
									"<th>Roll Number</th>"+
		        	                "<th>Name</th>"+
		                            "<th>E-mail</th>"+
	    	        	            "<th>Branch</th>"+
								"</tr>"+
							"</thead>"+
								
							"<!-- display all the mail received -->"+
							"<tbody>";
					var i;
					for(i=0; i<arr.length; i++) {
						html_out += "<tr>";
						html_out += "<td>"+arr[i].roll+"</td>";
						html_out += "<td>"+arr[i].name+"</td>";
						html_out += "<td>"+arr[i].email+"</td>";
						html_out += "<td>"+arr[i].cgpa+"</td>";
						html_out += "</tr>";
					}
					html_out += "</tbody>"+
						"</table>";
				} else {
					html_out += "<div style='text-align: center;'>No results Found</div>";
				}
				$("#searchDiv").html(html_out);
			}
		</script>
	</head>

	<body>
        <!-- main body container -->
        <div class="container">
        	<div class="well well-lg">
            	<!-- div to display the search results -->
            	<div id="searchDiv">
                </div>
        	</div>
        </div>
	</body>
</html>