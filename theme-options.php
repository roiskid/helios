<?php

add_action( 'admin_init', 'wphelios_theme_options_init' );
add_action( 'admin_menu', 'wphelios_theme_options_add_page' );

/**
 * Prep the necessary scripts for image uploads.
 *
 * @since WP-Helios 1.0
 */
function wphelios_options_enqueue_scripts() {
	if ( 'appearance_page_wphelios_theme_options' == get_current_screen() -> id ) :
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
 * Create tab navigation for settings
 *
 * @since WP-Helios 1.0
 */
function wphelios_admin_tabs( $current = 'general' ) {
	$tabs = array( 'general' => 'General',  'homepage' => 'Home Settings', 'media' => 'Media Section', 'contact' => 'Contact' );
	echo '<div id="icon-themes" class="icon32"><br></div>';
	echo '<h2 class="nav-tab-wrapper">';
	foreach( $tabs as $tab => $name ){
		$class = ( $tab == $current ) ? ' nav-tab-active' : '';
		echo "<a class='nav-tab$class' href='?page=wphelios_theme_options&tab=$tab'>$name</a>";
	}
	echo '</h2>';
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

		<?php if ( isset ( $_GET['tab'] ) ) wphelios_admin_tabs($_GET['tab']); else wphelios_admin_tabs('general'); ?>

		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields( 'wphelios_options' ); ?>
			<?php $options = get_option( 'wphelios_theme_options' ); ?>
	<?php 
	if ( isset ( $_GET['tab'] ) ) 
		$tab = $_GET['tab']; 
	else 
		$tab = 'general'; 

	switch ( $tab ) :
		case 'general' :
	?>
			<h3 class="title"><?php _e( 'Layout Options', 'wphelios' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[header_img]"><?php _e( 'Header Background Image', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[header_img]" class="regular-text" type="text" name="wphelios_theme_options[header_img]" value="<?php echo esc_url( $options['header_img'] ); ?>" /> 
							<input id="upload_header_img_button" type="button" class="button" value="<?php _e( 'Upload Image', 'wphelios' ); ?>" />
							<span class="description"><?php _e('Ideal size is 1400x651.', 'wphelios' ); ?></span>
						</td>
					</tr>
				</tbody>
			</table>

			<h3 class="title"><?php _e( 'Analytics and Tracking', 'wphelios' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[gaID]"><?php _e( 'Google Analytics Profile ID', 'wphelios' ); ?></label></td>
						<td><input id="wphelios_theme_options[gaID]" class="regular-text" type="text" name="wphelios_theme_options[gaID]" value="<?php esc_attr_e( $options['gaID'] ); ?>" placeholder="e.g. UA-12345678-1" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[tracking]"><?php _e( 'Other Tracking Code', 'wphelios' ); ?></label></th>
						<td><textarea id="wphelios_theme_options[tracking]" class="large-text" cols="30" rows="8" name="wphelios_theme_options[tracking]"><?php echo esc_textarea( $options['tracking'] ); ?></textarea></td>
					</tr>
				</tbody>
			</table>

			<script>
			jQuery(document).ready(function($) {
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
		<?php 
			break; 
		case 'homepage' : 
		?>
			<h3 class="title"><?php _e( 'Centerpiece Settings', 'wphelios' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[centerpiece_headline]"><?php _e( 'Main Headline', 'wphelios' ); ?></label></td>
						<td><input id="wphelios_theme_options[centerpiece_headline]" class="regular-text" type="text" name="wphelios_theme_options[centerpiece_headline]" value="<?php esc_attr_e( $options['centerpiece_headline'] ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[centerpiece_subheading]"><?php _e( 'Subheading', 'wphelios' ); ?></label></td>
						<td><input id="wphelios_theme_options[centerpiece_subheading]" class="regular-text" type="text" name="wphelios_theme_options[centerpiece_subheading]" value="<?php esc_attr_e( $options['centerpiece_subheading'] ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[centerpiece_button_label]"><?php _e( 'Button Label', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[centerpiece_button_label]" class="regular-text" type="text" name="wphelios_theme_options[centerpiece_button_label]" value="<?php esc_attr_e( $options['centerpiece_button_label'] ); ?>" />
							<span class="description"><?php _e('Leave blank to exclude button.', 'wphelios' ); ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[centerpiece_button_link]"><?php _e( 'Button Link', 'wphelios' ); ?></label></td>
						<td><input id="wphelios_theme_options[centerpiece_button_link]" class="regular-text" type="text" name="wphelios_theme_options[centerpiece_button_link]" value="<?php echo esc_url( $options['centerpiece_button_link'] ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[centerpiece_button_icon]"><?php echo _e( 'Button Icon', 'wphelios' ); ?></label></td>
						<td>
							<select id="wphelios_theme_options[centerpiece_button_icon]" name="wphelios_theme_options[centerpiece_button_icon]">
								<option value="">-<?php echo _e( 'None', 'wphelios' ); ?>-</option>
								<option value="arrow-o"<?php if( $options['centerpiece_button_icon'] == 'arrow-o' ) : ?> selected<?php endif; ?>>Arrow</option>
								<option value="chart"<?php if( $options['centerpiece_button_icon'] == 'chart' ) : ?> selected<?php endif; ?>>Chart</option>
								<option value="check"<?php if( $options['centerpiece_button_icon'] == 'check' ) : ?> selected<?php endif; ?>>Checkmark</option>
								<option value="cog"<?php if( $options['centerpiece_button_icon'] == 'cog' ) : ?> selected<?php endif; ?>>Cog</option>
								<option value="file"<?php if( $options['centerpiece_button_icon'] == 'file' ) : ?> selected<?php endif; ?>>File</option>
								<option value="info"<?php if( $options['centerpiece_button_icon'] == 'info' ) : ?> selected<?php endif; ?>>Info</option>
								<option value="file-text"<?php if( $options['centerpiece_button_icon'] == 'file-text' ) : ?> selected<?php endif; ?>>Text</option>
								<option value="user"<?php if( $options['centerpiece_button_icon'] == 'user' ) : ?> selected<?php endif; ?>>User</option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[centerpiece_button_type]"><?php echo _e( 'Button Type', 'wphelios' ); ?></label></td>
						<td>
							<select id="wphelios_theme_options[centerpiece_button_type]" name="wphelios_theme_options[centerpiece_button_type]">
								<option value="primary"<?php if( $options['centerpiece_button_type'] == 'primary' ) : ?> selected<?php endif; ?>>Primary</option>
								<option value="secondary"<?php if( $options['centerpiece_button_type'] == 'secondary' ) : ?> selected<?php endif; ?>>Secondary</option>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
		<?php 
			break; 
		case 'media' : 
		?>

		<?php 
			break; 
		case 'contact' : 
		?>
			<h3 class="title">Contact Information</h3>
			
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[email]"><?php _e( 'Email', 'wphelios' ); ?></label></td>
						<td><input id="wphelios_theme_options[email]" class="regular-text" type="text" name="wphelios_theme_options[email]" value="<?php esc_attr_e( $options['email'] ); ?>" placeholder="email address" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[phone]"><?php _e( 'Phone', 'wphelios' ); ?></label></th>
						<td><input id="wphelios_theme_options[phone]" class="regular-text" type="text" name="wphelios_theme_options[phone]" value="<?php echo esc_textarea( $options['phone'] ); ?>" placeholder="phone number" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[address]"><?php _e( 'Address', 'wphelios' ); ?></label></td>
						<td><textarea id="wphelios_theme_options[address]" class="large-text" cols="30" rows="8" name="wphelios_theme_options[address]"><?php esc_attr_e( $options['address'] ); ?></textarea></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[social-link-1-url]"><?php _e( 'Social Link 1', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[social-link-1-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-1-url]" value="<?php esc_attr_e( $options['social-link-1-url'] ); ?>" placeholder="<?php _e( 'link name', 'wphelios' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[social-link-2-url]"><?php _e( 'Social Link 2', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[social-link-2-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-2-url]" value="<?php esc_attr_e( $options['social-link-2-url'] ); ?>" placeholder="<?php _e( 'link name', 'wphelios' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wphelios_theme_options[social-link-4-url]"><?php _e( 'Social Link 3', 'wphelios' ); ?></label></td>
						<td>
							<input id="wphelios_theme_options[social-link-3-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-3-url]" value="<?php esc_attr_e( $options['social-link-3-url'] ); ?>" placeholder="<?php _e( 'link name', 'wphelios' ); ?>" />
						</td>
					</tr>
                    <tr>
                        <th scope="row"><label class="description" for="wphelios_theme_options[social-link-4-url]"><?php _e( 'Social Link 4', 'wphelios' ); ?></label></td>
                        <td>
                            <input id="wphelios_theme_options[social-link-4-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-4-url]" value="<?php esc_attr_e( $options['social-link-4-url'] ); ?>" placeholder="<?php _e( 'link name', 'wphelios' ); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label class="description" for="wphelios_theme_options[social-link-5-url]"><?php _e( 'Social Link 5', 'wphelios' ); ?></label></td>
                        <td>
                            <input id="wphelios_theme_options[social-link-5-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-5-url]" value="<?php esc_attr_e( $options['social-link-5-url'] ); ?>" placeholder="<?php _e( 'link name', 'wphelios' ); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label class="description" for="wphelios_theme_options[social-link-6-url]"><?php _e( 'Social Link 4', 'wphelios' ); ?></label></td>
                        <td>
                            <input id="wphelios_theme_options[social-link-6-label]" class="regular-text" type="text" name="wphelios_theme_options[social-link-6-url]" value="<?php esc_attr_e( $options['social-link-6-url'] ); ?>" placeholder="<?php _e( 'link name', 'wphelios' ); ?>" />
                        </td>
                    </tr>
				</tbody>
			</table>
	<?php 
			break; 
	endswitch; 
	?>
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