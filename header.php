<!DOCTYPE HTML>
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 

	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  	<link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/9e670c54-947b-4ef0-a023-cd814ad021d5.css"/>
		 <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
		<?php wp_head(); ?>
	</head>
<body <?php body_class($class); ?>> 
	<div id="page-container">	
	<div id="search-container">
		<form role="search" method="get" id="searchform" action="http://plantation.org.uk/">
	        <input type="text" value="" name="s" id="header-search">
	        <button type="submit" id="search-submit" value="Search">
	            <img src="http://i.imgur.com/HrWRm7o.png" alt="Search"/>
	        </button>
		</form>
	</div>
	<!-- /search -->
	<header>
		<h1><a id="logo" href="<?php echo home_url(); ?>/"><img src="http://79.170.44.155/plantation.org.uk/wp-content/themes/plantation-productions/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a></h1>
		<!-- /logo -->
		<nav role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</nav><!-- /nav -->
	</header><!-- /header -->

