<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   Classic Real Estate
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function classic_real_estate_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * HEX Color sanitization callback example.
 *
 * - Sanitization: hex_color
 * - Control: text, WP_Customize_Color_Control
 * 
 * Note: sanitize_hex_color_no_hash() can also be used here, depending on whether
 * or not the hash prefix should be stored/retrieved with the hex color value.
 * 
 * @see sanitize_hex_color() https://developer.wordpress.org/reference/functions/sanitize_hex_color/
 * @link sanitize_hex_color_no_hash() https://developer.wordpress.org/reference/functions/sanitize_hex_color_no_hash/
 *
 * @param string               $hex_color HEX color to sanitize.
 * @param WP_Customize_Setting $setting   Setting instance.
 * @return string The sanitized hex color if not null; otherwise, the setting default.
 */
function classic_real_estate_sanitize_hex_color( $hex_color, $setting ) {
	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
}

function classic_real_estate_sanitize_phone_number( $phone ) {
		return preg_replace( '/[^\d+]/', '', $phone );
	}

/*radio button sanitization*/
function classic_real_estate_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

if ( ! function_exists( 'classic_real_estate_sanitize_integer' ) ) {
    function classic_real_estate_sanitize_integer( $input ) {
        return (int) $input;
    }
}


/*-- Custom metafields for Real Estate --*/
function classic_real_estate_custom_fields() {
    add_meta_box(
        're_meta',
        __('Classic Real Estate Custom Fields', 'classic-real-estate'),
        'real_estate_render_custom_fields',
        'post',
        'normal',
        'high'
    );
}
if (is_admin()) {
    add_action('admin_menu', 'classic_real_estate_custom_fields');
}

function real_estate_render_custom_fields($post) {
    wp_nonce_field(basename(__FILE__), 'classic_real_estate_custom_fields_nonce');
    
    $custom_bedrooms = get_post_meta($post->ID, 'classic_real_estate_custom_bedrooms', true);
    $custom_beds = get_post_meta($post->ID, 'classic_real_estate_custom_beds', true);
    $custom_bathrooms = get_post_meta($post->ID, 'classic_real_estate_custom_bathrooms', true);
    $custom_price = get_post_meta($post->ID, 'classic_real_estate_custom_price', true);
    ?>

    <div class="metafield-content" style="margin-top: 10px; margin-bottom: 10px; display: flex; width: 37%;">
        <label for="classic_real_estate_custom_bedrooms" style="flex: 0 0 30%; margin-right: 10px; font-weight: 600;"><?php esc_html_e( 'Number of Bedrooms :', 'classic-real-estate' )?></label>
        <input type="number" id="classic_real_estate_custom_bedrooms" name="classic_real_estate_custom_bedrooms" value="<?php echo esc_attr($custom_bedrooms); ?>" style="flex: 0 0 60%; padding: 5px;">
    </div>

    <div class="metafield-content" style="margin-top: 10px; margin-bottom: 10px; display: flex; width: 37%;">
        <label for="classic_real_estate_custom_beds" style="flex: 0 0 30%; margin-right: 10px; font-weight: 600;"><?php esc_html_e( 'Number of Beds :', 'classic-real-estate' )?></label>
        <input type="number" id="classic_real_estate_custom_beds" name="classic_real_estate_custom_beds" value="<?php echo esc_attr($custom_beds); ?>" style="flex: 0 0 60%; padding: 5px;">
    </div>

    <div class="metafield-content" style="margin-top: 10px; margin-bottom: 10px; display: flex; width: 37%;">
        <label for="classic_real_estate_custom_bathrooms" style="flex: 0 0 30%; margin-right: 10px; font-weight: 600;"><?php esc_html_e( 'Number of Bathrooms :', 'classic-real-estate' )?></label>
        <input type="number" id="classic_real_estate_custom_bathrooms" name="classic_real_estate_custom_bathrooms" value="<?php echo esc_attr($custom_bathrooms); ?>" style="flex: 0 0 60%; padding: 5px;">
    </div>

    <div class="metafield-content" style="margin-top: 10px; margin-bottom: 10px; display: flex; width: 37%;">
        <label for="classic_real_estate_custom_price" style="flex: 0 0 30%; margin-right: 10px; font-weight: 600;"><?php esc_html_e( 'Apartment Price :', 'classic-real-estate' )?></label>
        <input type="text" id="classic_real_estate_custom_price" name="classic_real_estate_custom_price" value="<?php echo esc_attr($custom_price); ?>" style="flex: 0 0 60%; padding: 5px;">
    </div>


    <?php
}

function classic_real_estate_save_custom_fields($post_id) {
    if (!isset($_POST['classic_real_estate_custom_fields_nonce']) || !wp_verify_nonce($_POST['classic_real_estate_custom_fields_nonce'], basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $custom_fields = array(
        'classic_real_estate_custom_bedrooms',
        'classic_real_estate_custom_beds',
        'classic_real_estate_custom_bathrooms',
        'classic_real_estate_custom_price'
    );

    foreach ($custom_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'classic_real_estate_save_custom_fields');
