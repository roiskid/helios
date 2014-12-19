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
$wphelios_theme_options = get_option( 'wphelios_theme_options' );
?><!DOCTYPE HTML>
<html>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="keywords" content="">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <!--[if lte IE 8]><script src="<?php echo get_template_directory_uri(); ?>/css/ie/html5shiv.js"></script><![endif]-->
        <noscript>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/wp-helios-noscript.min.css" />
        </noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie/v8.css" /><![endif]-->

		<?php wp_head(); ?>

		<style>
			input[type="button"],
			input[type="submit"],
			input[type="reset"],
			.button {
				background: <?php echo $wphelios_theme_options['color']; ?> !important ;
			}
			input[type="button"]:hover,
			input[type="submit"]:hover,
			input[type="reset"]:hover,
			.button:hover
			{
				background: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75) !important;
                color: #fff !important;
			}
            <?php if (!empty($wphelios_theme_options['menu-color'])) : ?>
            #nav {
                background: rgba(<?=hex2rgb($wphelios_theme_options['menu-color'])?>,0.5) !important;
                padding: .5em 0 .5em 0 !important;
            }
            <?php endif; ?>
            <?php if (!empty($wphelios_theme_options['text-color'])) : ?>
            #header header {
                color: <?php echo $wphelios_theme_options['text-color']; ?> !important;
            }
            <?php endif; ?>
            #nav>ul>li>a:hover {
                color: <?php echo $wphelios_theme_options['color']; ?> !important;
            }
			.dropotron li:hover
			{
				color: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75) !important;
			}
			ul.icons li a:hover
			{
				color: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75) !important;
			}
			a:hover
			{
				color: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75) !important;
			}
			.carousel .forward:hover:before,
			.carousel .backward:hover:before
			{
				background: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75) !important;
			}
			form textarea:focus
			{
				border-color: <?php echo $wphelios_theme_options['color']; ?> !important;
			}
			#header .overlay {
				background: <?php echo $wphelios_theme_options['color']; ?> !important;
			}
			#footer .icon.circled {
				background: <?php echo $wphelios_theme_options['color']; ?> !important;
			}

            <?php if( is_home() && !empty($wphelios_theme_options['header-vid'])) : ?>
            .homepage #header.ready .overlay {
                opacity: 100;
            }
            #header {
                background-image: none !important;
            }
            .video-container {
                position: relative;
                height: 100%;
                overflow: hidden;
            }
            .video-container iframe,
            .video-container object,
            .video-container embed {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                height: 100%;
                max-height: 100%;
                transform: translate(-50%, -50%);
            }
            <?php endif; ?>
		</style>
	</head>

	<body <?php if( is_home() ) : body_class('homepage'); else: body_class(); endif; ?> style="display: none;">
		<!-- Header -->
			<div id="header"<?php if (!empty($wphelios_theme_options['header-img'])) : ?> style="background-image: url('<?php echo $wphelios_theme_options['header-img']; ?>');"<?php endif; ?>>
				<!-- Inner -->
					<div class="inner">
						<header>
                            <?php if (is_home()) : ?>
                                <?php if (!empty($wphelios_theme_options['header-logo'])) : ?><div id="logo"><img src="<?php echo $wphelios_theme_options['header-logo']; ?>" alt="<?php bloginfo( 'name' ); ?> logo" <?php if (!empty($wphelios_theme_options['logo-width'])) : ?> style="width:<?php echo $wphelios_theme_options['logo-width']; ?>px;"<?php endif; ?>/></div><?php endif; ?>
                            <?php else: ?>
                                <?php if (!empty($wphelios_theme_options['header-logo'])) : ?><div id="logo"><a href="/"><img src="<?php echo $wphelios_theme_options['header-logo']; ?>" alt="<?php bloginfo( 'name' ); ?> logo" <?php if (!empty($wphelios_theme_options['logo-width'])) : ?> style="width:<?php echo $wphelios_theme_options['logo-width']; ?>px;"<?php endif; ?>/></a></div><?php endif; ?>
                            <?php endif; ?>
                            <?php if (!empty($wphelios_theme_options['home-heading'])) : ?><h1><a href="/"><?php echo $wphelios_theme_options['home-heading']; ?></a></h1><?php if (is_home()) : ?><hr /><?php endif; ?><?php endif; ?>
							<?php if (is_home() && !empty(bloginfo( 'description' ))) : ?><p><?php bloginfo( 'description' ); ?></p><?php endif; ?>
						</header>
						<?php if( is_home() ) { ?>
						<footer>
							<a href="#banner" class="button circled scrolly"><?php if (!empty($wphelios_theme_options['home-button-label'])) : echo $wphelios_theme_options['home-button-label']; else: echo 'Start'; endif; ?></a>
						</footer>
						<?php } ?>
					</div>
				<!-- Nav -->
					<nav id="nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'Top Nav', 'container' => '', 'menu_class' => '' ) ); ?>
					</nav>
			</div>