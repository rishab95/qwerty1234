<!-- header section of the page -->
<header class="page-header">	
    <!-- nav bar container -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    	<div class="container">
        	<!-- non collapsable section of header -->
        	<div class="navbar-header">
            	<a href="/about" class="navbar-brand">
                	<img src="/images/foot_white.png" height="20"/>
                </a>
                
                <button class="navbar-toggle" data-toggle="collapse" data-target="#header-nav">
                	<span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
            </div>
            
            <!-- collapsable section of header -->
            <div class="collapse navbar-collapse" id="header-nav">
            	<!-- list of all the options -->
            	<ul class="nav navbar-nav navbar-right">
                	<li>
                    	<form class="navbar-form">
                            <div class="input-group">
                                <input type="search" class="head-input-inverse form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-toolbar form-control" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li>
                    
					<li>
                    	<a href="/student/home">
    		            	<button class="btn btn-toolbar navbar-btn pull-right" type="button">
           		            	<span class="glyphicon glyphicon-"></span> Student
               		        </button>
   	            		</a>
                    </li>
                    
                	<li>
              			<button class="btn btn-toolbar navbar-btn pull-right dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Menu <span class="caret"></span></button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                          	<li>
                            	<a href="/coordinator/profile">
	           		            	<span class="glyphicon glyphicon-user"></span> Profile
                            	</a>
                            </li>
	                        <li>
                            	<a href="/coordinator/timeline">
	           		            	<span class="glyphicon glyphicon-list"></span> Timeline
   			            		</a>
                            </li>
    	                    <li>
                            	<a href="/coordinator/home">
	           		            	<span class="glyphicon glyphicon-home"></span> Home
		   	            		</a>
                            </li>	
		                    <li>
        		            	<a href="/coordinator/setting">
                                    <span class="glyphicon glyphicon-cog"></span> Setting
                                </a>
                            </li>
                            <li>
                                <a href="/logout">
                                    <span class="glyphicon glyphicon-log-out"></span> Logout
                                </a>
                            </li>
            	        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>