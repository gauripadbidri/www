<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php the_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/css-menu.css" />
	<!--Included CDN URL's for jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">

    <?php wp_head(); ?>

</head>

<body>
	<!--The "Play testimonial" jquery dialog-->
	<div id="dialogContainer">
		<div id="dialog" style="display:none;" title="Basic dialog" >
		  <a href="#" id="btnDone" title="Close">[X]</a>
		</div>
	</div>
    <div id="page">
		
        <header class="container ">
            <div class="col-md-12 ">
                <div id="logo" class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <a href="home">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_csp.gif" />
                    </a>
                </div>
                <div id="navigation" class="col-md-offset-1 col-lg-5 col-md-9 col-sm-12 col-xs-12 navbar navbar-default pull-right">


                    <div class='visible-xs visible-sm hidden-lg hidden-md'>
                        <div class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="home">Home</a>
                            </div>
                            <div class="navbar-collapse navbar-responsive-collapse collapse" style="height: 1px;">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Solution<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">NETWORKS<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Managed IT Services</a></li>
                                                        <li><a href="#">Managed Security Services</a></li>
                                                        <li><a href="#">Application Performance Services</a></li>
                                                        <li><a href="#">Projects</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">BACKUP<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Backup</a></li>
                                                        <li><a href="#">Recovery</a></li>
                                                        <li><a href="#">IT Continuity</a></li>
                                                        <li><a href="#">Archiving</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">CLOUD<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Infrastructure</a></li>
                                                        <li><a href="#">Software</a></li>
                                                        <li><a href="#">Email</a></li>
                                                        <li><a href="#">Security</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <!--<li><a href="#">Another 2</a></li>
                                            <li><a href="#">Action 3</a></li>-->
                                            <li class="divider"></li>
                                            <!--<li class="dropdown-header">Dropdown header</li>
                                            <li><a href="#">Separated link</a></li>
                                            <li><a href="#">One more separated link</a></li>-->
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Experience<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">Verticals<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Retail</a></li>
                                                        <li><a href="#">Warehouse/Manufacturer</a></li>
                                                        <li><a href="#">Pharmaceuticals</a></li>
                                                        <li><a href="#">Non-Profit</a></li>
                                                        <li><a href="#">Financial</a></li>
                                                        <li><a href="#">Media</a></li>
                                                        <li><a href="#">Transportation</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">Case Studies<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Pharmaceuticals - Glumetrics</a></li>
                                                        <li><a href="#">Manufacturer - OleumTech</a></li>
                                                        <li><a href="#">Media - Radius60 Studios</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">Methods & Processes<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">None</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <!--<li class="dropdown-header">Dropdown header</li>
                                            <li><a href="#">Separated link</a></li>
                                            <li><a href="#">One more separated link</a></li>-->
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">Company & Leadership<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Michael Chen, CEO/President</a></li>
                                                        <li><a href="#">Ryan Dillon, Chief Operating Officer</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">Careers<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">System Administrator</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">News & Announcements<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">CSP celebrates 10 years in business</a></li>
                                                        <li><a href="#">CSP launches exclusive MSP partnership with Ipanema Technologies</a></li>
                                                        <li><a href="#">CSP hires new Director of IT Operations</a></li>
                                                        <li><a href="#">Fairmont Designs hires CSP to manage and implement network infrastructure upgrade</a></li>
                                                        <li><a href="#">Anton & Chia, LLP hires CSP as Managed IT Service Provider</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-submenu">Events<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Event Item A</a></li>
                                                        <li><a href="#">Event Item A</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <!--<li class="dropdown-header">Dropdown header</li>
                                            <li><a href="#">Separated link</a></li>
                                            <li><a href="#">One more separated link</a></li>-->
                                        </ul>
                                    </li>
                                    <li class="active"><a href="contact">Help Desk</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- desktop view -->
                    <div class="desktop-menu visible-lg visible-md hidden-sm hidden-xs">
                        <ul>
                            <li><a class="menyItem" href="home">Home</a></li>
                            <li class="arrowClass">
                                <a class="menyItem" href="#">Solution</a>
                                <div class="chember-1">
                                    <div class="inner-chamber">
                                        <div>NETWORKS</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Managed IT Services</a></li>
                                            <li><a href="#">Managed Security Services</a></li>
                                            <li><a href="#">Application Performance Services</a></li>
                                            <li><a href="#">Projects</a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-chamber">
                                        <div>BACKUP</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Backup</a></li>
                                            <li><a href="#">Recovery</a></li>
                                            <li><a href="#">IT Continuity</a></li>
                                            <li><a href="#">Archiving</a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-chamber">
                                        <div>CLOUD</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Infrastructure</a></li>
                                            <li><a href="#">Software</a> </li>
                                            <li><a href="#">Email</a></li>
                                            <li><a href="#">Security</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="arrowClass">
                                <a class="menyItem" href="#">Experience</a>
                                <div class="chember-1">
                                    <div class="inner-chamber">
                                        <div>VERTICALS</div>
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
                                        <div>CASE STUDIES</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Pharmaceuticals - Glumetrics</a></li>
                                            <li><a href="#">Manufacturer - OleumTech</a></li>
                                            <li><a href="#">Media - Radius60 Studios</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="arrowClass">
                                <a class="menyItem" href="#">About</a>
                                <div class="chember-1">
                                    <div class="inner-chamber">
                                        <div>Company & Leadership</div>
                                        <ul class="list-holder">
                                            <li><a href="#">Michael Chen, CEO/President </a></li>
                                            <li><a href="#">Ryan Dillon, Chief Operating Officer </a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-chamber">
                                        <div>Careers</div>
                                        <ul class="list-holder">
                                            <li><a href="#">System Administrator</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a class="menyItem" href="contact">Contact</a></li>
                        </ul>
                      </div>   
                </div>
            </div>
        </header>
