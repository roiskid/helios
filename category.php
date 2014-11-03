<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */

get_header(); ?>

    <?php if ( have_posts() ) : ?>

    <!-- Banner -->
        <section id="banner">
            <header>
                <h2><?php printf( __( 'Category Archives: %s', 'wphelios' ), single_cat_title( '', false ) ); ?></h2>
            </header>
        </section>

    <!-- Main -->
        <div class="wrapper style2">
            <div class="container">

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					endwhile;
            ?>

            <div class="navigation"><p><?php posts_nav_link(); ?></p></div>

    <?php else :
        // If no content, include the "No posts found" template.
        get_template_part( 'content', 'none' );
    endif; ?>

<?php get_footer(); ?>
