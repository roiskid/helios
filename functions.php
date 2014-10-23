<?php
/**
 * WP-Helios functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */

/**
 * Register three WP-Helios widget areas.
 *
 * @since WP-Helios 1.0
 */
function wphelios_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wphelios' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the left or right sidebar section of the site.', 'wphelios' ),
		'before_widget' => '<hr/><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'wphelios' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears in the left footer section of the site.', 'wphelios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'wphelios' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears in the middle footer section of the site.', 'wphelios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'wphelios' ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears in the right footer section of the site.', 'wphelios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wphelios_widgets_init' );

/**
 * Register navigation menus.
 *
 * @since WP-Helios 1.0
 */
register_nav_menu( 'Top Nav', 'Primary navigation along the top of the template' );

/**
 * Image settings for the theme.
 *
 * @since WP-Helios 1.0
 */
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'featured-thumb', 367, 168, true ); 
add_image_size( 'blog-thumb', 180, 167, true ); 
add_image_size( 'sidebar-page-banner', 1200, 357, true );
add_image_size( 'page-banner', 1200 );

/**
 * Add a theme settings page.
 *
 * @since WP-Helios 1.0
 */
require_once ( get_stylesheet_directory() . '/theme-options.php' );

/**
 * Add custom panels and fields to support additional presentation options.
 *
 * @since WP-Helios 1.0
 */
require_once ( get_stylesheet_directory() . '/page-options.php' );
