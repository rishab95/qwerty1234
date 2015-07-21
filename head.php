<?php
	# link and link pageName for the button to be displayed
	switch($page) {
		case "register":
			$pageName = "Login";
			$link = "/";
			break;
		case "login":
			$pageName = "Register";
			$link = "/register";
			break;
		default:
			$pageName = "Login";
			$link = "/";
			break;
	}
	# obtain value of quey if it exists
	$qVal = empty($q)?"":$q;
?>

<!-- header division -->
<header class="page-header">
	
    <!-- main navigation container -->
    <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
    	<div class="container">
        	<div class="row">
            	<!-- branding implementation -->
            	<div class="col-sm-3">
		        	<div class="navbar-header">
		            	<a href="/about" class="navbar-brand">
		                	<img src="/images/foot_white.png" height="20"/>
                        </a>
                        
                        <button class="navbar-toggle" data-toggle="collapse" data-target="header-nav">
        		        	<span class="glyphicon glyphicon-menu-hamburger"></span>
		                </button>
		            </div>
                </div>
            
            <!-- collapsable section of header -->
            <div class="collapse navbar-collapse" id="header-nav">
            	<!-- list of all the options -->
            	<ul class="nav navbar-nav navbar-right">
                	<li class="nav-search">
                    	<div class="input-group">
                        	<input type="search" class="head-input-inverse form-control" placeholder="Search" />
                            <span class="input-group-btn">
                            	<button class="btn btn-toolbar form-control" type="submit">
                                	<span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </li>
                    
                    <li>
                    	<!-- link for forwarding to next page -->
                        <a href="<?php echo $link; ?>">
                        	<button class="btn btn-toolbar navbar-btn pull-right" type="button" id="mainHeadToggleButton">
                            	<span class="glyphicon glyphicon-user"></span> <?php echo $pageName; ?>
                            </button>
        	        	</a>
    	            </li>
				</ul>
            </div>
        </div>
    </div>
    
    <script>
		window.onload = function() {
			if(window.location.pathpageName == "/search")
				Search();
		};
		
		// function to retrieve values from database
		function Search() {
			var q = $('#searchInput').val();
			if(window.location.pathpageName == "/search") {
				var getLink = "/controller/search.php?q="+q;
				$.get(getLink, function(data, success) {
					searchDisplay(JSON.parse(data));
				});
			} else {
				window.location = "/search?q="+q;
			}
		}
	</script>
</header>