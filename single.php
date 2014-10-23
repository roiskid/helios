<?php
/**
 * Template Name: Full Width Page (Default)
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */

get_header(); ?>

    <!-- Main -->
    <div class="wrapper style1">
        <div class="container">

<?php
	// Start the Loop.
	if( have_posts() ) :
		while ( have_posts() ) : the_post();
			// Include the page content template.
			get_template_part( 'content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
	endif;
?>

        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <?php endif; ?>

        </div>  <!-- .container -->
    </div>  <!-- .wrapper style1 -->

<?php get_template_part( 'loop', 'recent-posts' ); ?>

<?php get_footer(); ?>