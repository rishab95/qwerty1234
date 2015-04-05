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
				<table class="table table-hover">
                
                    <colgroup>
                    	<col></col>
                        <col></col>
                        <col></col>
                        <col></col>
                        <col></col>
                    </colgroup>
                    
                	<thead>
                    	<tr>
                        	<th colspan="4"></th>
                            <th>
                            	<span class="glyphicon glyphicon-time"></span>
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>

                            <tr onClick="document.location='/controller/viewCompanyDetails?id=';">
                                <td><input type="checkbox" class="checkbox" name="companyId" role="checkbox" /></td>
                                <td>Microsot India</td>
                                <td>Something related to whatever they have to say including their details and the packages offered</td>
                                <td>29 Mar</td>
                                <td>2 Apr</td>
                            </tr>

                            <tr onClick="document.location='/controller/viewCompanyDetails?id=';">
                                <td><input type="checkbox" class="checkbox" name="companyId" role="checkbox" /></td>
                                <td>Microsot India</td>
                                <td>Something related to whatever they have to say including their details and the packages offered</td>
                                <td>29 Mar</td>
                                <td>2 Apr</td>
                            </tr>
                            
                            <tr onClick="document.location='/controller/viewCompanyDetails?id=';">
                                <td><input type="checkbox" class="checkbox" name="companyId" role="checkbox" /></td>
                                <td>Microsot India</td>
                                <td>Something related to whatever they have to say including their details and the packages offered</td>
                                <td>29 Mar</td>
                                <td>2 Apr</td>
                            </tr>
                        
                    </tbody>
                </table>
			</div>
		</div>

        <script>
			$(document).ready(function() {
			    $('.table tr').click(function(event) {
			        // select value and forward to the mail mail page
			    });
			});
		</script>

	</body>
</html>
