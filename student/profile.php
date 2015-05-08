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
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
?>

<!doctype html>

<html>
	<head>

		<meta charset="utf-8">
		<title>PAP | Student | Profile</title>

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
        
        <!-- script to populate the page -->
        <script>
			// ajax for retrieving data for personal info
			var user = <?php echo $_SESSION['username']; ?>;
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
			$.post("/view/academicAchievement?view=profile", {username: user}, function(data){
				$("#acadAch").html(data);
			});
			// ajax for retrieving data for project record
			$.post("/view/project?view=profile", {username: user}, function(data){
				$("#proj").html(data);
			});
			// ajax for retrieving data for extra curricular record
			$.post("/view/extraCurr?view=profile", {username: user}, function(data){
				$("#extraCurr").html(data);
			});
			// ajax for retrieving data for other information record
			$.post("/view/otherInfo?view=profile", {username: user}, function(data){
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
		</div>
	</body>
</html>

<?php
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