<?php
/**
 * The home template file
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */

get_header(); ?>

        <!-- Banner -->
            <section id="banner">
                <header>
                    <h2>Hi. You're looking at <strong>Helios</strong>.</h2>
                    <p>
                        A (free) responsive site template by <a href="//html5up.net">HTML5 UP</a>.
                        Built on <strong>skel</strong> and released under the <a href="http://html5up.net/license">CCA</a> license.
                    </p>
                </header>
            </section>

		<!-- Main -->
			<div class="wrapper style2">
                <div class="container">

                <?php
                // Start the Loop.
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'content', get_post_format() );
                    endwhile;
                endif;
                ?>

<?php get_footer(); ?>
