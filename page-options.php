<?php
/**
 * WP-Helios Custom Field Support
 *
 * Set up the various supporting custom fields for pages and posts that the theme uses
 * for various display options.
 *
 * @package WordPress
 * @subpackage WP-Helios
 * @since WP-Helios 1.0
 */

/**
 * Register meta box for pages
 *
 * @since WP-Helios 1.0
 */
function wphelios_add_meta_box() {
    $screens = array( 'page' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'wphelios_settings',
            __( 'WP-Helios Options', 'wphelios' ),
            'wphelios_meta_box_callback',
            $screen,
            'side'
        );
    }
}
add_action( 'add_meta_boxes', 'wphelios_add_meta_box' );

/**
 * Print out the meta panel
 *
 * @since WP-Helios 1.0
 */
function wphelios_meta_box_callback( $post ) {
    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'wphelios_meta_box', 'wphelios_meta_box_nonce' );

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $subheading  = get_post_meta( $post->ID, '_subheading', true );
?>
    <p><strong><?php echo _e( 'Page Subheading', 'wphelios' ); ?></strong></p>
    <p><label class="screen-reader-text" for="subheading"><?php echo _e( 'Page Subheading', 'wphelios' ); ?></label>
    <input type="text" id="subheading" name="subheading" value="<?php echo esc_attr( $subheading ); ?>" size="25" /></p>
<?php
}

/**
 * Save the data from the meta panel to custom fields
 *
 * @since WP-Helios 1.0
 */
function wphelios_save_meta_box_data( $post_id ) {
    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['wphelios_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['wphelios_meta_box_nonce'], 'wphelios_meta_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */
    
    // Make sure that it is set.
    if ( !isset( $_POST['subheading'] ) ) {
        return;
    }

    // Sanitize user input.
    $subheading_data = sanitize_text_field( $_POST['subheading'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_subheading', $subheading_data );
}
add_action( 'save_post', 'wphelios_save_meta_box_data' );