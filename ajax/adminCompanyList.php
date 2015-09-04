<?php
	# check if session is already started
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	# authenticate the user to user the page
	if(!empty($_SESSION['type'])) {
		if($_SESSION['type']=='admin') {
			if(!empty($_SESSION['username'])) {
				# authenticate user
				ob_start();
				include_once("../controller/auth.php");
				$out = ob_get_clean();
				$outArr = json_decode($out, true);
				if($outArr['auth']=="true") {
					$activeId = (!empty($_GET['sort'])) ? $_GET['sort'] : "az";
?>
<div class="panel-body">
	<div class="btn-group btn-group-justified" role="group">
    	<div class="btn-group" role="group">
        	<button type="button" class="btn btn-toolbar <?php echo $activeId=="az"?"active":""?>" onClick="sortAZ();" id="az">
            	A<span class="glyphicon glyphicon-chevron-right"></span>Z
            </button>
        </div>
        
    	<div class="btn-group" role="group">
        	<button type="button" class="btn btn-toolbar <?php echo $activeId=="za"?"active":""?>" onClick="sortZA();" id="za">
            	A<span class="glyphicon glyphicon-chevron-left"></span>Z
            </button>
        </div>
        
    	<div class="btn-group" role="group">
        	<button type="button" class="btn btn-toolbar <?php echo $activeId=="du"?"active":""?>" onClick="sortDateUp();" id="du">
            	<span class="glyphicon glyphicon-calendar"></span>
            	<span class="glyphicon glyphicon-chevron-up"></span>
            </button>
        </div>
        
    	<div class="btn-group" role="group">
        	<button type="button" class="btn btn-toolbar <?php echo $activeId=="dd"?"active":""?>" onClick="sortDateDown();" id="dd">
            	<span class="glyphicon glyphicon-calendar"></span>
            	<span class="glyphicon glyphicon-chevron-down"></span>
            </button>
        </div>
    </div>
</div>


<script>
	function sortAZ() {
		$("#companyListDiv").load("/ajax/adminCompanyList?sort=az");
	}
	
	function sortZA() {
		$("#companyListDiv").load("/ajax/adminCompanyList?sort=za");
	}
	
	function sortDateUp() {
		$("#companyListDiv").load("/ajax/adminCompanyList?sort=du");
	}
	
	function sortDateDown() {
		$("#companyListDiv").load("/ajax/adminCompanyList?sort=dd");
	}
</script>
<?php
					ob_start();
					$_POST['username'] = $_SESSION['username'];
					include_once("../controller/companyList.php");
					$out = ob_get_clean();
					$outArr = json_decode($out, true);
					$len = count($outArr);
					if($len) {
?>
<!-- table to display the mail -->
<table class='table table-hover table-condensed' id="tblCompanyList">
    <!-- display all the companies -->
    <tbody>
    <?php
		foreach($outArr as $val) {
	?>
    	<tr onClick="document.location = '/admin/viewCompanyDetails?id=<?php echo $val['companyId']; ?>'">
            <td><?php echo $val['companyName']; ?></td>
		</tr>
    <?php
		}
    ?>
	</tbody>
</table>
<?php
					} else {
?>
<div class="panel-body"><center>No companies in the system</center></div>
<?php
					}
				} else
					header("Location: /login");
			} else {
				# user trying to access other folders
				switch($_SESSION['type']) {
					# user is coordinator
					case 'company':
						header("Location: /company/");
						break;
					case 'coordinator':
						header("Location: /coordinator/");
						break;
					default: 
						; # someone trying to play with session variables
				}
			}
		} else {
			session_destroy();
			header("Location: /login");
		}
	} else {
		session_destroy();
		header("Location: /login");
	}
?>