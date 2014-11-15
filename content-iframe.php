<?php
/**
 * The template used for displaying form content
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */
?>

<!-- Breadcrumbs -->
<div id="breadcrumbs">
    <?php if(function_exists('the_breadcrumbs')) the_breadcrumbs(); ?>
</div>

<article id="main" <?php if ( strpos(get_page_template(), 'sidebar') === false ) : ?>class="special"<?php endif; ?>>
	<header>
		<h2><?php the_title(); ?></h2>
        <?php $subheading = get_post_meta( get_the_ID(), '_subheading', true );
        if( !empty( $subheading ) ) : ?>
		<p><?php echo $subheading; ?></p>
        <?php endif; ?>
	</header>

    <?php the_content(); ?>

    <?php $url = get_post_meta( get_the_ID(), 'url', true ); ?>

    <?php if( !empty( $url ) ) : ?>
        <iframe src="<?=$url;?>"></iframe>
    <?php endif; ?>

	<footer></footer>

<?php edit_post_link( __( 'Edit', 'wphelios' ), '<span class="edit-link">', '</span>' ); ?>

</article>  <!-- #post-post-<?php the_ID(); ?> -->