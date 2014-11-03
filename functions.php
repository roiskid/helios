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
		'description'   => __( 'Appears in the left upper footer section of the site.', 'wphelios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'wphelios' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears in the middle upper footer section of the site.', 'wphelios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'wphelios' ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears in the right upper footer section of the site.', 'wphelios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => __( 'Footer 4', 'wphelios' ),
        'id'            => 'footer-4',
        'description'   => __( 'Appears in the left bottom footer section of the site.', 'wphelios' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 5', 'wphelios' ),
        'id'            => 'footer-5',
        'description'   => __( 'Appears in the middle bottom footer section of the site.', 'wphelios' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 6', 'wphelios' ),
        'id'            => 'footer-6',
        'description'   => __( 'Appears in the right bottom footer section of the site.', 'wphelios' ),
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

/**
 * Theme color
 */
add_action( 'admin_enqueue_scripts', 'wphelios_color_picker' );
function wphelios_color_picker() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
}

function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    return implode(",", $rgb); // returns the rgb values separated by commas
}

/**
 * Add category metabox to page
 * Add tag metabox to page
 */
function wphelios_page_cats_and_tags() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}
add_action( 'admin_init', 'wphelios_page_cats_and_tags' );

/**
 * Enqueue scripts for the front end.
 *
 * @since WP-Helios 1.0
 */
function wphelios_enqueue_scripts() {
    wp_enqueue_script( 'wp-helios', get_template_directory_uri() . '/js/wp-helios.min.js', array(), null, true );
    wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.min.js', array('wp-helios'), null, true );
}
add_action( 'wp_enqueue_scripts', 'wphelios_enqueue_scripts' );

/**
 * Enqueue styles for the front end.
 *
 * @since WP-Helios 1.0
 */
function wphelios_enqueue_styles() {
	wp_enqueue_style( 'netural', get_template_directory_uri() . '/css/netural.css', array(), '' );
}
add_action( 'wp_enqueue_scripts', 'wphelios_enqueue_styles' );

/*
 * http://colorburned.com/adding-custom-breadcrumbs-into-your-wordpress-theme/
 */
function the_breadcrumbs() {

    global $post;

    if (!is_home()) {

        echo "<a href='/";
        //echo get_option('home');
        echo "'>";
        echo "Home";
        echo "</a>";

        if (is_category() || is_single()) {

            echo " &raquo; ";
            $cats = get_the_category( $post->ID );

            foreach ( $cats as $cat ){
                echo $cat->cat_name;
                echo " &raquo; ";
            }
            if (is_single()) {
                the_title();
            }
        } elseif (is_page()) {

            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $anc_link = get_page_link( $post->post_parent );

                foreach ( $anc as $ancestor ) {
                    $output = " &raquo; <a href=".$anc_link.">".get_the_title($ancestor)."</a> &raquo; ";
                }

                echo $output;
                the_title();

            } else {
                echo ' &raquo; ';
                echo the_title();
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"Archive: "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"Archive: "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"Archive: "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"Author's archive: "; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blogarchive: "; echo'';}
    elseif (is_search()) {echo"Search results: "; }
}