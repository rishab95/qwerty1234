<?php
	# link and link name for the button to be displayed
	if($page == "register") {
		$name = "Login";
		$link = "/";
	} else if($page == 'login'){
		$name = "Register";
		$link = "/?register=1";
	} else {
		$name = "Login";
		$link = "/";
	}
?>

<!-- header division -->
<header class="page-header">
	
    <!-- main navigation container -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    	<div class="container">
        	<div class="row">
            	<!-- branding implementation -->
            	<div class="col-sm-3">
		        	<div class="navbar-header">
		            	<a href="" class="navbar-brand">PAP</a>
		            </div>
                </div>
            
            	<div class="col-sm-6" style="margin-top: 10px;">
                
                	<!-- search form -->
                	<form method="get" action="controller/search.php">
	                	<div class="input-group">
    	                
        	                <input type="search" class="form-control head-item" placeholder="Search" />
            	            
                	        <span class="input-group-btn">
                    	        <button class="btn btn-primary" type="submit">
                        	    	<span class="glyphicon glyphicon-search"></span>
	                        	</button>
    	                	</span>
        	                
            	    	</div>
                	</form>
                </div>
                
                <!-- link for forwarding to next page -->
            	<div class="col-sm-3">
                	<div class="pull-right" style="margin-top: 10px;">
                       	<a href="<?php echo $link; ?>">

    			           	<button class="btn btn-primary navbar-btn pull-right" type="button" id="mainHeadToggleButton">
        	   		           	<span class="glyphicon glyphicon-user"></span> <?php echo $name; ?>
    	           	        </button>
	   	           		</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</header>