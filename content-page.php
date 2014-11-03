<?php
/**
 * The template used for displaying page content
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
    <?php if (has_post_thumbnail()) : ?>
    <a href="#" class="image featured">
        <?php if ( strpos(get_page_template(), 'sidebar') === false ) : the_post_thumbnail( 'page-banner' ); endif; ?>
        <?php if ( strpos(get_page_template(), 'sidebar') !== false ) : the_post_thumbnail( 'sidebar-page-banner' ); endif; ?>
    </a>
    <?php endif; ?>
<?php the_content(); ?>

<span class="byline"><?php _e( 'Posted by', 'wphelios' ); ?> <?php echo get_the_author_link(); ?> on <?php the_date(); ?>
	<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?> in <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'wphelios' ) ); ?></span>
	<?php endif; ?>

	<?php if( has_tag() ): ?>
		<div class="post-meta">
			<?php the_tags( 'Tagged with: ' ); ?>
		</div>  <!-- .post-meta -->
	<?php endif; ?>

	<footer></footer>

	<?php
wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wphelios' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
) );

edit_post_link( __( 'Edit', 'wphelios' ), '<span class="edit-link">', '</span>' );
?>
</article>  <!-- #post-post-<?php the_ID(); ?> -->