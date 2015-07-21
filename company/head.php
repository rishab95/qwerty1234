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
                
                <button class="navbar-toggle" data-toggle="collapse" data-target="header-nav">
                	<span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>                
            </div>
            
            <!-- collapsable section of header -->
            <div class="collapse navbar-collapse" id="header-nav">
            	<!-- list of all the options -->
            	<ul class="nav navbar-nav navbar-right">
                	<li>
                    	<form>
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
                    	<a href="/company/home">
    		            	<button class="btn btn-toolbar navbar-btn pull-right" type="button">
           		            	<span class="glyphicon glyphicon-home"></span> Home
               		        </button>
   	            		</a>
                    </li>
                    
                    <li>
                    	<a href="/company/settings">
    		            	<button class="btn btn-toolbar navbar-btn pull-right" type="button">
           		            	<span class="glyphicon glyphicon-cog"></span> Settings
               		        </button>
   	            		</a>
                    </li>
                    
                    <li>
                    	<a href="/controller/logout">
    		            	<button class="btn btn-toolbar navbar-btn pull-right" type="button">
           		            	<span class="glyphicon glyphicon-log-out"></span> Logout
               		        </button>
   	            		</a>
                    </li>

                </ul>
            </div>
            
        </div>
    </nav>
</header>