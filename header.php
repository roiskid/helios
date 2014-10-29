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
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="keywords" content="">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>

        <style>
            input[type="button"],
            input[type="submit"],
            input[type="reset"],
            .button {
                background: <?php echo $wphelios_theme_options['color']; ?>;
            }
            input[type="button"]:hover,
            input[type="submit"]:hover,
            input[type="reset"]:hover,
            .button:hover
            {
                background: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75);
            }
            .dropotron li:hover
            {
                color: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75);
            }
            ul.icons li a:hover
            {
                color: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75);
            }
            a:hover
            {
                color: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75);
            }
            .carousel .forward:hover:before,
            .carousel .backward:hover:before
            {
                background-color: rgba(<?=hex2rgb($wphelios_theme_options['color'])?>,0.75);
            }
            form textarea:focus
            {
                border-color: <?php echo $wphelios_theme_options['color']; ?>;
            }
        </style>
	</head>

	<body <?php if( is_home() ) : body_class('homepage'); else: body_class(); endif; ?>>
		<!-- Header -->
			<div id="header"<?php if (!empty($wphelios_theme_options['header-img'])) : ?> style="background-image: url('<?php echo $wphelios_theme_options['header-img']; ?>');"<?php endif; ?>>
				<!-- Inner -->
					<div class="inner">
						<header>
                            <?php if (is_home()) : ?>
                                <?php if (!empty($wphelios_theme_options['header-logo'])) : ?><div id="logo"><img src="<?php echo $wphelios_theme_options['header-logo']; ?>" alt="<?php bloginfo( 'name' ); ?> logo" /></div><?php endif; ?>
                            <?php else: ?>
                                <?php if (!empty($wphelios_theme_options['header-logo'])) : ?><div id="logo"><a href="/"><img src="<?php echo $wphelios_theme_options['header-logo']; ?>" alt="<?php bloginfo( 'name' ); ?> logo" /></a></div><?php endif; ?>
                            <?php endif; ?>
                            <?php if (!empty($wphelios_theme_options['home-heading'])) : ?><h1><a href="/"><?php echo $wphelios_theme_options['home-heading']; ?></a></h1><?php if (is_home()) : ?><hr /><?php endif; ?><?php endif; ?>
							<?php if (is_home() && !empty($wphelios_theme_options['home-subheading'])) : ?><p><?php echo $wphelios_theme_options['home-subheading']; ?></p><?php endif; ?>
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