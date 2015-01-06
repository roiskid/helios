<?php
/**
 * Template Name: Facebook Page
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */
$wphelios_theme_options = get_option( 'wphelios_theme_options' ); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
    <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="keywords" content="">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/netural-facebook.css" />
</head>
<body>

    <div class="container">
        <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();
            // Include the page content template.
            the_content();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        endwhile;
        ?>
    </div>

    <?php if( !empty($wphelios_theme_options['gaID']) ) : ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', '<?php echo $wphelios_theme_options['gaID']; ?>', 'auto');
            ga('send', 'pageview');
        </script>
    <?php endif; ?>

    <?php if( !empty($wphelios_theme_options['tracking']) ) : ?>
        <?php echo $wphelios_theme_options['tracking']; ?>
    <?php endif; ?>

</body>
</html>