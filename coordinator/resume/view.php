<?php
	# check if session already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# check if user logged in
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='student') {
			if(!empty($_SESSION['username'])) {
				# authenticate user
				ob_start();
				include_once("../../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
					if(empty($_GET['id']))
						header("Location: /student/");
					else {
						$id = $_GET['id'];
?>

<!doctype html>
<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | Profile</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.min.css">
        
        <!-- Latest complied and minified JQuery -->
        <script src="../../bootstrap/jquery-2.1.3.min.js"></script>
        
   		<!-- Latest compiled and minified JavaScript -->
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
    
	    <!-- Custom made CSS file -->
    	<link rel="stylesheet" href="../../style.css">
        
        <!-- script to populate the page -->
        <script>
			// ajax for retrieving data for personal info
			var user = <?php echo $_SESSION['username']; ?>;
			var id = <?php echo $id; ?>;
			$.post("/view/personalInfo", {username: user}, function(data) {
				$("#personalInfo").html(data);
			});
			// ajax for retrieving data for academic records
			$.post("/view/academicRecord", {username: user}, function(data){
				$("#academicRecord").html(data);
			});
			// ajax for retrieving data for be record
			$.post("/view/be", {username: user}, function(data){
				$("#be").html(data);
			});
			// ajax for retrieving data for me record
			$.post("/view/me", {username: user}, function(data){
				$("#me").html(data);
			});
			// ajax for retrieving data for academic achievement record
			$.post("/view/academicAchievement", {username: user, id: id}, function(data){
				$("#acadAch").html(data);
			});
			// ajax for retrieving data for project record
			$.post("/view/project", {username: user, id: id}, function(data){
				$("#proj").html(data);
			});
			// ajax for retrieving data for extra curricular record
			$.post("/view/extraCurr", {username: user, id: id}, function(data){
				$("#extraCurr").html(data);
			});
			// ajax for retrieving data for other information record
			$.post("/view/otherInfo?", {username: user, id: id}, function(data){
				$("#otherInfo").html(data);
			});
		</script>
            
	</head>

	<body>
   	<?php
		# include the header of the page
		include_once('head.php');
	?>
		<!-- background of the page -->
        <div class="body2"></div>
        
        <!-- main container for displaying personal information -->
		<div class="container">
        	<form action="/controller/buildResume?id=<?php echo $id; ?>" method="post">
                <!-- division for display of personal information -->
                <a name="personalInfo"></a>
                <div class="col-lg-6">
                    <div id="personalInfo"></div>
                </div>
                
                <!-- division for display of academic record -->
                <a name="academicRecod"></a>
                <div class="col-lg-6">
                    <div id="academicRecord"></div>
                </div>
    
                <!-- division for display of be record -->
                <a name="be"></a>
                <div class="col-lg-6">
                    <div id="be"></div>
                </div>
                
                <!-- division for display of me record -->
                <a name="me"></a>
                <div class="col-lg-6">
                    <div id="me"></div>
                </div>
                
                <!-- division for display of academic achievements -->
                <a name="acadAch"></a>
                <div class="col-lg-6">
                    <div id="acadAch"></div>
                </div>
    
                <!-- division for display of projects and trainings -->
                <a name="proj"></a>
                <div class="col-lg-6">                
                    <div id="proj"></div>
                </div>
                
                <!-- division for display of extra curricular activities -->
                <a name="extraCurr"></a>
                <div class="col-lg-6">
                    <div id="extraCurr"></div>
                </div>
                
                <!-- division for display of other information -->
                <a name="otherInfo"></a>
                <div class="col-lg-6">
                    <div id="otherInfo"></div>
                </div>
                
                <div class="col-xs-12">
                <div id="myModal" class="modal fade">
		        	<div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <p>Do you want to apply with the above selected resume?</p>
                                <p class="text-warning"><small>Please review because once applied, resume can not be changed.</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onClick="$('form').submit();">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
			</form>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <a href="#myModal" class="btn btn-default form-control" data-toggle="modal">Apply</a>
                    </div>
                </div>
			</div>
		</div>
	</body>
</html>

<?php
					}
				} else
					header("Location: /login");
			} else {
				# user trying to access other folders
				switch($_SESSION['type']) {
					# user is coordinator
					case 'coordinator':
						header("Location: /coordinator/");
						break;
					case 'company':
						header("Location: /company/");
						break;
					case 'admin':
						header("Location: /admin/");
						break;
					default: 
						; # someone trying to play with session variables
				}
			}
		} else
			header("Location: /login");
	} else
		header("Location: /login");
?>