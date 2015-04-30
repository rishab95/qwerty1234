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
                    	<form action="<?php echo $page!="search"?"search":""?>" method="get">
                        <div class="input-group">
                            <input type="search" id="searchInput" class="form-control head-item" placeholder="Search" pageName="q"
                        <?php
							if($page!="search") {
                        ?>
                            onInput="document.location='search?q='+document.getElementById('searchInput').value;"
                        <?php
							} else {
						?>
							onInput="Search()"
						<?php
							}
						?>
                            value="<?php echo $qVal; ?>" onfocus="this.value = this.value;"/>
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
        	   		           	<span class="glyphicon glyphicon-user"></span> <?php echo $pageName; ?>
    	           	        </button>
	   	           		</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
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