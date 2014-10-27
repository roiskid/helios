<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */
$wphelios_theme_options = get_option( 'wphelios_theme_options' );
?>
                <hr />

                <div class="row">
                    <article class="4u special">
                        <?php if ( is_active_sidebar( 'footer-1' ) ) :
                            dynamic_sidebar( 'footer-1' );
                        endif; ?>
                    </article>
                    <article class="4u special">
                        <?php if ( is_active_sidebar( 'footer-2' ) ) :
                            dynamic_sidebar( 'footer-2' );
                        endif; ?>
                    </article>
                    <article class="4u special">
                        <?php if ( is_active_sidebar( 'footer-3' ) ) :
                            dynamic_sidebar( 'footer-3' );
                        endif; ?>
                    </article>
                </div>

            </div>  <!-- .container -->
        </div>  <!-- .wrapper style1 -->

		<!-- Footer -->
			<div id="footer">
				<div class="container">
					<div class="row">
						<!-- Footer 1 -->
							<section class="4u">
                                <?php if ( is_active_sidebar( 'footer-4' ) ) :
                                    dynamic_sidebar( 'footer-4' );
                                endif; ?>
							</section>
						<!-- Footer 2 -->
							<section class="4u">
                                <?php if ( is_active_sidebar( 'footer-5' ) ) :
                                    dynamic_sidebar( 'footer-5' );
                                endif; ?>
							</section>
						<!-- Footer 3 -->
							<section class="4u">
                                <?php if ( is_active_sidebar( 'footer-6' ) ) :
                                    dynamic_sidebar( 'footer-6' );
                                endif; ?>
							</section>
					</div>
					<hr />
					<div class="row">
						<div class="12u">
							<!-- Social -->
								<section class="contact">
                                    <?php if (!empty($wphelios_theme_options['social-heading'])) : ?><header><h3><?php echo $wphelios_theme_options['social-heading']; ?></h3></header><?php endif; ?>
                                    <?php if (!empty($wphelios_theme_options['social-subheading'])) : ?><p><?php echo $wphelios_theme_options['social-subheading']; ?></p><?php endif; ?>
									<ul class="icons">
                                        <?php if (!empty($wphelios_theme_options['social-link-1-url'])) : ?><li><a href="<?php echo $wphelios_theme_options['social-link-1-url']; ?>" class="icon fa-twitter"><span class="label">Twitter</span></a></li><?php endif; ?>
                                        <?php if (!empty($wphelios_theme_options['social-link-2-url'])) : ?><li><a href="<?php echo $wphelios_theme_options['social-link-2-url']; ?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li><?php endif; ?>
                                        <?php if (!empty($wphelios_theme_options['social-link-3-url'])) : ?><li><a href="<?php echo $wphelios_theme_options['social-link-3-url']; ?>" class="icon fa-instagram"><span class="label">Instagram</span></a></li><?php endif; ?>
                                        <?php if (!empty($wphelios_theme_options['social-link-4-url'])) : ?><li><a href="<?php echo $wphelios_theme_options['social-link-4-url']; ?>" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li><?php endif; ?>
                                        <?php if (!empty($wphelios_theme_options['social-link-5-url'])) : ?><li><a href="<?php echo $wphelios_theme_options['social-link-5-url']; ?>" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li><?php endif; ?>
                                        <?php if (!empty($wphelios_theme_options['social-link-6-url'])) : ?><li><a href="<?php echo $wphelios_theme_options['social-link-6-url']; ?>" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li><?php endif; ?>
									</ul>
								</section>
							<!-- Copyright -->
								<div class="copyright">
									<ul class="menu">
										<li>&copy; Copyright <?php echo date('Y'); ?>, by <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. All rights reserved.</li>
                                        <li>Design: <a href="//html5up.net" target="_blank" title="Design">HTML5 UP</a></li>
                                        <li>Theme: <a href="//www.netural.nl" target="_blank" title="Theme">Netural</a></li>
									</ul>
								</div>
						</div>
					</div>
				</div>
			</div>
<?php
if( $wphelios_theme_options['gaID'] ) : ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '<?php echo $wphelios_theme_options['gaID']; ?>', '<?php echo $_SERVER['SERVER_NAME']; ?>');
    ga('send', 'pageview');
</script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>