<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php the_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--styles -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/csp/css/style.min.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/csp/css/css-menu.min.css" />
<!--[if lt IE 9]> 
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/csp/css/css-ie8.min.css" />
	<![endif]-->
</head>

<body>
    <!--The "Play testimonial" jquery dialog-->
    <div id="dialogContainer">
        <div id="dialog" style="display:none;" title="Basic dialog">
            <a href="#" id="btnDone" title="Close">[X]</a>
        </div>
    </div>
    <div id="page">

        <header class="container">
            <div class="col-md-12">
                <div id="logo" class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                    <a href="home">
                        <img class="img-responsive" src="/wp-content/themes/csp/images/logo_csp.gif" />
                    </a>
                </div>
                    <!-- Mobile View -->
                     <div class='visible-xs'>
						<div class="navbar navbar-default">
						<a href="home" style="float:left;">
                        <img class="img-responsive" src="/wp-content/themes/csp/images/logo_csp.gif" />
						</a>
							<div class="navbar-header pull-right">
								<button id="mob_Btn" style="width:100%;" title="Click for Menu" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-main">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<br/>
							<div id="navbar-main" class="navbar-collapse navbar-responsive-collapse collapse">
								<ul class="nav navbar-nav">
									<li><a href="home">Home</a></li>                    
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Solutions <b class="caret"></b></a>
										<ul class="dropdown-menu">
												<li class="textColor padLeft22">&nbsp;&nbsp;BACKUP</li>												
												<li><a href="#">Backup</a></li>
												<li><a href="#">Recovery</a></li>
												<li><a href="#">IT Continuity</a></li>
												<li><a href="#">Archiving</a></li>
											<li class="divider"></li>
												<li class="textColor padLeft22">&nbsp;&nbsp;CLOUD</li>			
												<li><a href="#">Infrastructure</a></li>
												<li><a href="#">Software</a></li>
												<li><a href="#">Email</a></li>
												<li><a href="#">Security</a></li>
											<li class="divider"></li>
												<li class="textColor padLeft22">&nbsp;&nbsp;NETWORKS</li>			
												<li><a href="#">Managed IT Services</a></li>
												<li><a href="#">Managed Security Services</a></li>
												<li><a href="#">Application Performance Services</a></li>
												<li><a href="#">Projects</a></li>
											<li class="divider"></li>
										</ul>
									</li>
									<li class="dropdown open">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Experience <b class="caret"></b></a>
										<ul class="dropdown-menu">
												<li class="textColor padLeft22">&nbsp;&nbsp;VERTICALS</li>			
												<li><a href="#">Retail</a></li>
												<li><a href="#">Warehouse/Manufacturer</a></li>
												<li><a href="#">Pharmaceuticals</a></li>
												<li><a href="#">Non-Profit</a></li>
												<li><a href="#">Financial</a></li>
												<li><a href="#">Media</a></li>
												<li><a href="#">Transportation</a></li>
											<li class="divider"></li>
												<li class="textColor padLeft22">&nbsp;&nbsp;CASE STUDIES</li>			
												<li><a href="#">Pharmaceuticals - Glumetrics</a></li>
												<li><a href="#">Manufacturer - OleumTech</a></li>
												<li><a href="#">Media - Radius60 Studios</a></li>
											<li class="divider"></li>
										</ul>
									</li>
									<li><a href="about">About</a></li>  
									<li><a href="contact">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>

                    
                <div id="navigation" class="col-md-offset-1 col-lg-6 col-md-9 col-sm-9 navbar navbar-default pull-right desktop-menu hidden-xs">

                    <!-- desktop view -->
                    <div class="desktop-menu hidden-xs">
                        <ul>
                            <li><a class="menyItem" href="home">Home</a></li>
                            <li class="arrowClass">
                                <a class="menyItem" href="#">Solution</a>
                                <div class="chember-1 col-md-12">
                                    <div class="inner-chamber">
                                        <div class="textColor">&nbsp;&nbsp;BACKUP</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Backup</a></li>
                                            <li><a href="#">Recovery</a></li>
                                            <li><a href="#">IT Continuity</a></li>
                                            <li><a href="#">Archiving</a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-chamber">
                                        <div class="textColor">&nbsp;&nbsp;CLOUD</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Infrastructure</a></li>
                                            <li><a href="#">Software</a> </li>
                                            <li><a href="#">Email</a></li>
                                            <li><a href="#">Security</a></li>
                                        </ul>
                                    </div>
									<div class="inner-chamber">
                                        <div class="textColor">&nbsp;&nbsp;NETWORKS</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Managed IT Services</a></li>
                                            <li><a href="#">Managed Security Services</a></li>
                                            <li><a href="#">Application Performance Services</a></li>
                                            <li><a href="#">Projects</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="arrowClass">
                                <a class="menyItem" href="#">Experience</a>
                                <div class="chember-1 col-md-12">
                                    <div class="inner-chamber">
                                        <div class="textColor">&nbsp;&nbsp;VERTICALS</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Retail</a></li>
                                            <li><a href="#">Warehouse/Manufacturer</a></li>
                                            <li><a href="#">Pharmaceuticals</a></li>
                                            <li><a href="#">Non-Profit</a></li>
                                            <li><a href="#">Financial</a></li>
                                            <li><a href="#">Media</a></li>
                                            <li><a href="#">Transportation</a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-chamber">
                                        <div class="textColor">&nbsp;&nbsp;CASE STUDIES</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Pharmaceuticals - Glumetrics</a></li>
                                            <li><a href="#">Manufacturer - OleumTech</a></li>
                                            <li><a href="#">Media - Radius60 Studios</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a class="menyItem" href="about">About</a></li>
                            <li><a class="menyItem" href="contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
