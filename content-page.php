<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */
?>

<article id="main" <?php if ( strpos(get_page_template(), 'sidebar') === false ) : ?>class="special"<?php endif; ?>>
	<header>
		<h2><?php the_title(); ?></h2>
<?php
$subheading = get_post_meta( get_the_ID(), '_subheading', true );
if( !empty( $subheading ) ) :
?>
		<p><?php echo $subheading; ?></p>
<?php endif; ?>
	</header>
    <?php if (has_post_thumbnail()) : ?>
    <a href="#" class="image featured">
        <?php if ( strpos(get_page_template(), 'sidebar') === false ) : the_post_thumbnail( 'page-banner' ); endif; ?>
        <?php if ( strpos(get_page_template(), 'sidebar') !== false ) : the_post_thumbnail( 'sidebar-page-banner' ); endif; ?>
    </a>
    <?php endif; ?>
<?php
the_content();

wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wphelios' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
) );

edit_post_link( __( 'Edit', 'wphelios' ), '<span class="edit-link">', '</span>' );
?>
</article>  <!-- #post-post-<?php the_ID(); ?> -->