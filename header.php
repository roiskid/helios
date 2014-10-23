<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrapper">
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */
 
 $wphs_theme_options = get_option( 'wphs_theme_options' );
 $wphs_custom_header = $wphs_theme_options['header_img'];
?><!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="keywords" content="">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<!--[if lte IE 8]><script src="<?php echo get_template_directory_uri(); ?>/css/ie/html5shiv.js"></script><![endif]-->
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.dropotron.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrolly.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.onvisible.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/skel.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/skel-layers.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skel.css" />
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-desktop.css" />
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie/v8.css" /><![endif]-->

		<?php wp_head(); ?>
	</head>

	<body <?php if( is_home() ) : body_class('homepage'); else: body_class(); endif; ?>>
		<!-- Header -->
			<div id="header">
						
				<!-- Inner -->
					<div class="inner">
						<header>
							<h1><a href="/" id="logo">Helios</a></h1>
							<?php if( is_home() ) { ?>
							<hr />
							<p>Another fine freebie by HTML5 UP</p>
							<?php } ?>
						</header>
						<?php if( is_home() ) { ?>
						<footer>
							<a href="#banner" class="button circled scrolly">Start</a>
						</footer>
						<?php } ?>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="/">Home</a></li>
							<li>
								<a href="">Dropdown</a>
								<ul>
									<li><a href="#">Lorem ipsum dolor</a></li>
									<li><a href="#">Magna phasellus</a></li>
									<li><a href="#">Etiam dolore nisl</a></li>
									<li>
										<a href="">And a submenu &hellip;</a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Phasellus consequat</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li><a href="#">Etiam dolore nisl</a></li>
										</ul>
									</li>
									<li><a href="#">Veroeros feugiat</a></li>
								</ul>
							</li>
							<li><a href="left-sidebar.html">Left Sidebar</a></li>
							<li><a href="right-sidebar.html">Right Sidebar</a></li>
							<li><a href="no-sidebar.html">No Sidebar</a></li>
						</ul>
					</nav>

			</div>


