<?php
	if($page == "register") {
		$name = "Login";
		$link = "/";
	} else {
		$name = "Register";
		$link = "/?register=1";
	}
?>

<!-- header division -->
<header class="page-header">
	
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
                
                	<!-- dynamix nav bar to be implemented -->
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

    			           	<button class="btn btn-primary navbar-btn pull-right" type="button">
        	   		           	<span class="glyphicon glyphicon-user"></span> <?php echo $name; ?>
    	           	        </button>
	   	           		</a>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>

</header>