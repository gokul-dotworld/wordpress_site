<?php
/**
 * SHORTCODE :: Contact Capture [listing_contact]
 *
 * @package     EPL
 * @subpackage  Shortcode/ContactForm
 * @copyright   Copyright (c) 2019, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       3.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Listing Contact Shortcode [listing_contact] This shortcode allows for you to capture contacts for listings
 *
 * @param array $atts Shortcode array of options.
 *
 * @return false|string
 * @since 3.0
 */
function epl_contact_capture_form( $atts ) {

	$defaults   = epl_contact_capture_get_widget_defaults();
	$attributes = shortcode_atts( $defaults, $atts );
	$fields     = epl_contact_capture_get_widget_fields( $attributes );

	if ( isset( $attributes['submit'] ) && ! empty( $attributes['submit'] ) ) {
		foreach ( $fields as &$field ) {
			if ( 'epl_contact_submit' === $field['name'] ) {
				$field['value'] = $attributes['submit'];
			}
		}
	}

	ob_start();
	$contact_form = new EPL_FORM_BUILDER( array( 'callback_action' => 'contact_capture_form' ) );

	$fields = array(
		array(
			'label'  => '',
			'class'  => 'col-1 epl-inner-div',
			'id'     => '',
			'help'   => '',
			'fields' => $fields,
		),

	);
	$contact_form->add_sections( $fields );
	$contact_form->add_fields();
	$contact_form->add_nonce( 'epl_contact_widget' );
	echo '<div class="epl-contact-capture-form">';?>
	<div class="epl-contact-capture-form-desc">
		<?php
			echo isset( $atts['description'] ) ? esc_html( $atts['description'] ) : '';
		?>
	</div>
	<?php

	$contact_form->render_form();
	echo '</div>';
	return ob_get_clean();
}
add_shortcode( 'epl_contact_form', 'epl_contact_capture_form' );
add_shortcode( 'listing_contact', 'epl_contact_capture_form' );


/**
 * Contact Form Callback
 *
 * @since 3.0
 * @param array $form_data Array of form data.
 * @param array $request Request from url for antispam check.
 */
function epl_contact_capture_form_callback( $form_data, $request ) {

	if ( isset( $request['epl_contact_anti_spam'] ) && ! empty( $attributes['submit'] ) ) {
		// spam.
		return;
	}

	$contact = new EPL_contact( $request['epl_contact_email'] );
	$fname   = isset( $request['epl_contact_first_name'] ) ? sanitize_text_field( $request['epl_contact_first_name'] ) : '';
	$lname   = isset( $request['epl_contact_last_name'] ) ? sanitize_text_field( $request['epl_contact_last_name'] ) : '';
	$phone   = isset( $request['epl_contact_phone'] ) ? sanitize_text_field( $request['epl_contact_phone'] ) : '';
	$title   = isset( $request['epl_contact_title'] ) ? sanitize_text_field( $request['epl_contact_title'] ) : '';

	if ( empty( $contact->ID ) ) {

		$contact_data = array(
			'name'  => $title,
			'email' => sanitize_email( $request['epl_contact_email'] ),
		);
		if ( $contact->create( $contact_data ) ) {
			$contact->update_meta( 'contact_first_name', $fname );
			$contact->update_meta( 'contact_last_name', $lname );
			$contact->update_meta( 'contact_phones', array( 'phone' => $phone ) );
			$contact->update_meta( 'contact_category', 'widget' );
			$contact->attach_listing( $request['epl_contact_listing_id'] );
			$contact->add_note( $request['epl_contact_note'], 'note', $request['epl_contact_listing_id'] );
		}
	} else {

		if ( $contact->update( array( 'name' => $title ) ) ) {
			$contact->add_note( $request['epl_contact_note'], 'note', $request['epl_contact_listing_id'] );
			$contact->attach_listing( $request['epl_contact_listing_id'] );
		}
	}
}
add_action( 'epl_form_builder_contact_capture_form', 'epl_contact_capture_form_callback', 10, 2 );
