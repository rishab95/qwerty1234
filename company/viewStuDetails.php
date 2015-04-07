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
            
	</head>

	<body>
        
        <?php
			if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        		include_once('head.php');
			}
		?>
        
        <div class="body2"></div>
        
        <!-- space from header -->
        <div style="margin-top: 40px;"></div>
        
        <!-- main container for displaying mail -->
		<div class="container">
        
<!--        	<div class="row">
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
            </div>
            
-->            <div class="row">
            
            	<div class="col-md-6 col-sm-6">
                	<div class="card">
                    </div>
                </div>
                
            	<div class="col-md-6 col-sm-6">
                	<div class="card">
	                	<h4>Personal Information</h4>
                    </div>
                </div>
                
                <div class="clearfix text-hide"></div>
                
            	<div class="col-md-6 col-sm-6">
                	<div class="card">
	                	<h4>Academic Record</h4>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
            	<div class="col-md-6 col-sm-6">
                	<div class="card">
	                	<h4>B.E/B.Tech Graduation</h4>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-md-6 col-sm-6">
                	<div class="card">
	                	<h4>M.E/M.Tech Graduation</h4>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-md-6 col-sm-6">
                	<div class="card">
	                	<h4>Academic Achievements</h4>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-md-6 col-sm-6">
                	<div class="card">
	                	<h4>Projects/Training Undertaken</h4>
                    </div>
                </div>
                
            </div>
            
        </div>
                
        <script>
			// use ajax to populate the details well
			function loadDetails(roll) {
				var xmlhttp;
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById("detailsContainer").innerHTML = xmlhttp.responseText;
					}
				}
				
				xmlhttp.open("POST","/controller/studentDetails.php",false);
				xmlhttp.send(concat("companyId=",roll));
			}
			
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
						if(found == true)$(row).show();else $(row).hide();
					}
				});
			}
		</script>

	</body>
</html>

<?php
#		}
#	} else {
#		header("Location: /");
#	}
?>