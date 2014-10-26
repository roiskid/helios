<?php

add_action( 'admin_init', 'wphelios_theme_options_init' );
add_action( 'admin_menu', 'wphelios_theme_options_add_page' );

/**
 * Prep the necessary scripts for image uploads.
 *
 * @since WP-Helios 1.0
 */
function wphelios_options_enqueue_scripts() {
	if ( 'appearance_page_wphelios_theme_options' == get_current_screen()->id ) :
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('media-upload');
	endif;
}
add_action( 'admin_enqueue_scripts', 'wphelios_options_enqueue_scripts' );


/**
 * Init plugin options to white list our options
 */
function wphelios_theme_options_init(){
	register_setting( 'wphelios_options', 'wphelios_theme_options', 'wphelios_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function wphelios_theme_options_add_page() {
	add_theme_page( 'WP-Helios Options', 'WP-Helios Options', 'manage_options', 'wphelios_theme_options', 'wphelios_theme_options_do_page' );
}

/**
 * Create the options page
 */
function wphelios_theme_options_do_page() {
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . __( 'WP-Helios Theme Settings', 'wphelios' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'wphelios' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields( 'wphelios_options' ); ?>
			<?php $options = get_option( 'wphelios_theme_options' ); ?>

			<h3 class="title"><?php _e( 'Layout Options', 'wphelios' ); ?></h3>

			<table class="form-table">
				<tbody>
                    <tr>
                        <th scope="row"><label class="description" for="wphelios_theme_options[header-logo]"><?php _e( 'Header Background Logo', 'wphelios' ); ?></label></td>
                        <td>
                            <input id="wphelios_theme_options[header-logo]" class="regular-text" type="text" name="wphelios_theme_options[header-logo]" value="<?php echo esc_url( $options['header-logo'] ); ?>" />
                            <input id="upload_header_logo" type="button" class="button" value="<?php _e( 'Upload Logo', 'wphelios' ); ?>" />
                        </td>
                    </tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[header-img]"><?php _e( 'Header Background Image', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[header-img]" class="regular-text" type="text" name="wphelios_theme_options[header-img]" value="<?php echo esc_url( $options['header-img'] ); ?>" />
							<input id="upload_header_img_button" type="button" class="button" value="<?php _e( 'Upload Image', 'wphelios' ); ?>" />
							<span class="description"><?php _e('Ideal size is 1920x1080', 'wphelios' ); ?></span>
						</td>
					</tr>
                    <tr>
                        <th scope="row"><label class="description" for="wphelios_theme_options[color]"><?php _e( 'Color', 'wphelios' ); ?></label></td>
                        <td>
                            <input id="wphelios_theme_options[color]" class="color-field" type="text" name="wphelios_theme_options[color]" value="<?php echo esc_url( $options['color'] ); ?>" data-default-color="#df7366" />
                        </td>
                    </tr>
				</tbody>
			</table>

			<h3 class="title"><?php _e( 'Analytics and Tracking', 'wphelios' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[gaID]"><?php _e( 'Google Analytics Profile ID', 'wphelios' ); ?></label></td>
						<td><input id="wphelios_theme_options[gaID]" class="regular-text" type="text" name="wphelios_theme_options[gaID]" value="<?php esc_attr_e( $options['gaID'] ); ?>" placeholder="e.g. UA-12345678-1" /> <a href="https://support.google.com/analytics/answer/1032385?hl=<?php bloginfo('language'); ?>" target="_blank"><?php _e( 'Help', 'wphelios' ); ?></a></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[tracking]"><?php _e( 'Other Tracking Code', 'wphelios' ); ?></label></th>
						<td><textarea id="wphelios_theme_options[tracking]" class="large-text" cols="30" rows="8" name="wphelios_theme_options[tracking]"><?php echo esc_textarea( $options['tracking'] ); ?></textarea></td>
					</tr>
				</tbody>
			</table>

			<script>
			jQuery(document).ready(function($) {

                $('.color-field').wpColorPicker();

                $('#upload_header_logo').click(function() {
                    tb_show('Upload a header logo', 'media-upload.php?TB_iframe=true', false);

                    window.send_to_editor = function(html) {
                        var image_url = $('img',html).attr('src');
                        $('#upload_header_logo').prev('input').val(image_url);
                        tb_remove();
                    }

                    return false;
                });
				$('#upload_header_img_button').click(function() {
					tb_show('Upload a header image', 'media-upload.php?TB_iframe=true', false);

					window.send_to_editor = function(html) {
						var image_url = $('img',html).attr('src');
						$('#upload_header_img_button').prev('input').val(image_url);
						tb_remove();
					}

					return false;
				});
			});
			</script>

			<h3 class="title"><?php _e( 'Homepage Settings', 'wphelios' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[home-heading]"><?php _e( 'Main Headline', 'wphelios' ); ?></label></td>
						<td><input id="wphelios_theme_options[home-heading]" class="regular-text" type="text" name="wphelios_theme_options[home-heading]" value="<?php esc_attr_e( $options['home-heading'] ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[home-subheading]"><?php _e( 'Subheading', 'wphelios' ); ?></label></td>
						<td><input id="wphelios_theme_options[home-subheading]" class="regular-text" type="text" name="wphelios_theme_options[home-subheading]" value="<?php esc_attr_e( $options['home-subheading'] ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[home-button-label]"><?php _e( 'Button Label', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[home-button-label]" class="regular-text" type="text" name="wphelios_theme_options[home-button-label]" value="<?php esc_attr_e( $options['home-button-label'] ); ?>" />
							<span class="description"></span>
						</td>
					</tr>
				</tbody>
			</table>

			<h3 class="title">Social Information</h3>
			
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[social-heading]"><?php _e( 'Social Heading', 'wphelios' ); ?></label></th>
						<td><input id="wphelios_theme_options[social-heading]" class="regular-text" type="text" name="wphelios_theme_options[social-heading]" value="<?php echo esc_textarea( $options['social-heading'] ); ?>" placeholder="Social heading" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[social-subheading]"><?php _e( 'Social Subheading', 'wphelios' ); ?></label></td>
						<td><textarea id="wphelios_theme_options[social-subheading]" class="large-text" cols="30" rows="8" name="wphelios_theme_options[social-subheading]"><?php esc_attr_e( $options['social-subheading'] ); ?></textarea></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[social-link-1-url]"><?php _e( 'Social Link 1', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[social-link-1-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-1-url]" value="<?php esc_attr_e( $options['social-link-1-url'] ); ?>" placeholder="Twitter" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[social-link-2-url]"><?php _e( 'Social Link 2', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[social-link-2-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-2-url]" value="<?php esc_attr_e( $options['social-link-2-url'] ); ?>" placeholder="Facebook" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[social-link-4-url]"><?php _e( 'Social Link 3', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[social-link-3-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-3-url]" value="<?php esc_attr_e( $options['social-link-3-url'] ); ?>" placeholder="Instagram" />
						</td>
					</tr>
                    <tr>
                        <th scope="row"><label class="description" for="wphelios_theme_options[social-link-4-url]"><?php _e( 'Social Link 4', 'wphelios' ); ?></label></td>
                        <td>
                            <input id="wphelios_theme_options[social-link-4-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-4-url]" value="<?php esc_attr_e( $options['social-link-4-url'] ); ?>" placeholder="Pinterest" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label class="description" for="wphelios_theme_options[social-link-5-url]"><?php _e( 'Social Link 5', 'wphelios' ); ?></label></td>
                        <td>
                            <input id="wphelios_theme_options[social-link-5-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-5-url]" value="<?php esc_attr_e( $options['social-link-5-url'] ); ?>" placeholder="Dribbble" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label class="description" for="wphelios_theme_options[social-link-6-url]"><?php _e( 'Social Link 4', 'wphelios' ); ?></label></td>
                        <td>
                            <input id="wphelios_theme_options[social-link-6-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-6-url]" value="<?php esc_attr_e( $options['social-link-6-url'] ); ?>" placeholder="LinkedIn" />
                        </td>
                    </tr>
				</tbody>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'wphelios' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function wphelios_theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/