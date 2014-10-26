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

        <!-- Carousel -->
            <section class="carousel">
                <div class="reel" style="overflow: visible; transform: translate(0px, 0px);">

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic01.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Pulvinar sagittis congue</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic02.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Fermentum sagittis proin</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic03.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic04.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Ultrices urna sit lobortis</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic05.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Varius magnis sollicitudin</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic01.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Pulvinar sagittis congue</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic02.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Fermentum sagittis proin</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic03.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic04.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Ultrices urna sit lobortis</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article class="">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic05.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Varius magnis sollicitudin</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                </div>
                <span class="forward" style="display: inline;"></span><span class="backward" style="display: inline;"></span>
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
