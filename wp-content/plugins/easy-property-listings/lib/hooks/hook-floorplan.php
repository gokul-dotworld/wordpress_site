<?php
/**
 * Hook for Floor plan Buttons on Property Templates
 *
 * @package     EPL
 * @subpackage  Hooks/FloorPlan
 * @copyright   Copyright (c) 2020, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Outputs any floor plan links for virtual tours on the property templates
 *
 * When the hook epl_buttons_single_property is used and the property
 * has floor plans links they will be output on the template
 *
 * @since 1.0
 * @since 3.3.0
 * @since 3.4.24 Fixed floor plan label filter.
 * @since 3.4.25 filter epl_show_{key} e.g. epl_show_property_floorplan to disable button rendering.
 * @since 3.4.38 Added filter epl_floorplan_keys to support additional floor plans.
 * @since 3.5 Fix for label to use esc_html instead of esc_attr.
 */
function epl_button_floor_plan() {

	$keys = apply_filters( 'epl_floorplan_keys', array( 'property_floorplan', 'property_floorplan_2' ) );

	foreach ( $keys as $key ) {

		$link       = get_post_meta( get_the_ID(), $key, true );
		$count      = 'property_floorplan' === $key ? '' : substr( $key, - 1 );
		$default    = __( 'Floor Plan ', 'easy-property-listings' ) . $count;
		$meta_label = get_post_meta( get_the_ID(), $key . '_label', true );
		$meta_label = empty( $meta_label ) ? $default : $meta_label;

		if ( is_array( $link ) ) { // Fallback if metadata is saved as an array.

			if ( ! empty( $link['image_url_or_path'] ) ) {
				$link = $link['image_url_or_path'];
			} else {
				$link = '';
			}
		}
		if ( ! empty( $link ) && apply_filters( 'epl_show_' . $key, true ) ) { ?>

			<button type="button" class="epl-button epl-floor-plan epl-floor-plan-<?php echo absint( $count ); ?>"
					onclick="window.open('<?php echo esc_url( $link ); ?>')">
				<?php
				$filter_key = str_replace( 'property_', '', $key );
				if ( has_filter( 'epl_button_label_' . $filter_key ) ) {
					$label = apply_filters( 'epl_button_label_' . $filter_key, $meta_label );
				} else {
					$label = apply_filters( 'epl_button_label_floorplan', $meta_label );
				}
				?>
				<?php echo esc_html( $label ); ?>
			</button>
			<?php

		}
	}

}

add_action( 'epl_buttons_single_property', 'epl_button_floor_plan' );
