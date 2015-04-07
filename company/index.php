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
                    
                    	<div>
							<h4>Personal Information</h4>
                        </div>
                        
                        <div class="divider"></div>
                        
                        <div class="col-md-6">
                            <table class="table table-responsive">
                            
                                <tr>
                                    <td>
                                        <label>Full Name</label>
                                    </td>
                                    <td>Rohit Saluja</td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <label>Date of Birth</label>
                                    </td>
                                    <td>4-8-1994</td>
                                </tr>
                                
                                <tr>
                                    <td><label>Age</label></td>
                                    <td>21</td>
                                </tr>
                                
                                <tr>
                                    <td><label>Citizenship</label></td>
                                    <td>Indian</td>
                                </tr>
                                
                                <tr>
                                    <td><label>Gender</label></td>
                                    <td>Male</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2"><label>Correspondence Address</label></td>
                                </tr>
                                
                                
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                        	<img src="../images/logo.png" width="100%">
                        </div>
                        
                    </div>
                    
                    <div class="well well-lg">
                    	<div>
							<h4>Academic Records</h4>
                        </div>
                        <div class="divider"></div>
                        <div>
                        </div>
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
                    
                    	<?php
                        	# obtain data from post with conversion
#							$rolls = explode("#-#", $_POST['roll']);
#							$names = explode("#-#" , $_POST['name']);
#							$branchs = explode("#-#", $_POST['branch']);
#							$cgpas = explode("#-#", $_POST['cgpa']);
						?>
                    
                        <table class="table table-hover" id="tblData">
                        
                        	<colgroup>
                            	<col width="10">
                            </colgroup>
                        
                            <thead>
                                <tr>
                                	<th></th>
                                    <th>Roll Number</th>
                                    <th>Full Name</th>
                                    <th>Branch</th>
                                    <th>CGPA</th>
                                </tr>
                            </thead>
                            
                            <!-- display all the interested students -->
                            <tbody>
                            
                       	    <?php
								# populating the table
#								foreach($names as $name) {
                            ?>
							
                                    <tr onClick="loadDetails('101203081');">
                                    	<td><span class="glyphicon glyphicon-chevron-left"></span></td>
                                        <td>101203053</td>
                                        <td>Preet Bandhan Kaur</td>
                                        <td>EIC</td>
                                        <td>6.98</td>
                                    </tr>
                                    
                             <?php
#								}
							 ?>
                                    
                                    <tr onClick="loadDetails('101203081');">
                                    	<td><span class="glyphicon glyphicon-chevron-left"></span></td>
                                        <td>101203081</td>
                                        <td>Rohit Saluja</td>
                                        <td>COE</td>
                                        <td>6.98</td>
                                    </tr>

                                    <tr onClick="loadDetails('101203081');">
                                    	<td><span class="glyphicon glyphicon-chevron-left"></span></td>
                                        <td>101203075</td>
                                        <td>Prisha Gupta</td>
                                        <td>COE</td>
                                        <td>7.0</td>
                                    </tr>
                                
                            </tbody>
                        </table>
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