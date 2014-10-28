<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */

get_header(); ?>

    <!-- Main -->
    <div class="wrapper style1">
        <div class="container">

            <article id="main">
                <header>
                    <h2><?php _e( 'Not Found', 'wphelios' ); ?></h2>
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wphelios' ); ?></p>
                </header>
            </article>

<?php get_footer(); ?>