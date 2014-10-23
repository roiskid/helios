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
                <hr>
                <div class="row">
                    <article class="4u special">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic07.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Gravida aliquam penatibus</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum.
                        </p>
                    </article>
                    <article class="4u special">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic08.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum.
                        </p>
                    </article>
                    <article class="4u special">
                        <a href="#" class="image featured"><img src="<?php echo get_template_directory_uri(); ?>/images/pic09.jpg" alt=""></a>
                        <header>
                            <h3><a href="#">Magna laoreet et aliquam</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum.
                        </p>
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
								<header>
									<h2 class="icon fa-twitter circled"><span class="label">Tweets</span></h2>
								</header>
                                <?php if ( is_active_sidebar( 'footer-1' ) ) :
                                    dynamic_sidebar( 'footer-1' );
                                endif; ?>
							</section>

						<!-- Footer 2 -->
							<section class="4u">
								<header>
									<h2 class="icon fa-file circled"><span class="label">Posts</span></h2>
								</header>
                                <?php if ( is_active_sidebar( 'footer-2' ) ) :
                                    dynamic_sidebar( 'footer-2' );
                                endif; ?>
							</section>

						<!-- Footer 3 -->
							<section class="4u">
								<header>
									<h2 class="icon fa-camera circled"><span class="label">Photos</span></h2>
								</header>
                                <?php if ( is_active_sidebar( 'footer-3' ) ) :
                                    dynamic_sidebar( 'footer-3' );
                                endif; ?>
							</section>

					</div>
					<hr />
					<div class="row">
						<div class="12u">
							
							<!-- Contact -->
								<section class="contact">
									<header>
										<h3>Nisl turpis nascetur interdum?</h3>
									</header>
									<p>Urna nisl non quis interdum mus ornare ridiculus egestas ridiculus lobortis vivamus tempor aliquet.</p>
									<ul class="icons">
										<li><a href="<?php echo $wphelios_theme_options['social-link-1-url']; ?>" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="<?php echo $wphelios_theme_options['social-link-2-url']; ?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="<?php echo $wphelios_theme_options['social-link-3-url']; ?>" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="<?php echo $wphelios_theme_options['social-link-4-url']; ?>" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
										<li><a href="<?php echo $wphelios_theme_options['social-link-5-url']; ?>" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
										<li><a href="<?php echo $wphelios_theme_options['social-link-6-url']; ?>" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
									</ul>
								</section>
							
							<!-- Copyright -->
								<div class="copyright">
									<ul class="menu">
										<li>&copy; Untitled. All rights reserved.</li>
                                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                                        <li>Theme: <a href="http://www.netural.nl">Netural</a></li>
                                        <li>Demo Images: <a href="http://md.photomerchant.net/">Michael Domaradzki</a></li>
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