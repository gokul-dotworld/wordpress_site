<?php
/**
 * Single Property Template: Expanded Compatibility
 *
 * @package     EPL
 * @subpackage  Templates/ContentListingSingleCompatibility
 * @copyright   Copyright (c) 2020, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 * @since       3.5 Renamed hook from epl_property_tab_section to epl_property_features
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'epl-listing-single epl-property-single view-expanded epl-property-single-compatibility' ); ?>>
	<div class="epl-header epl-clearfix">

		<?php do_action( 'epl_property_featured_image' ); ?>

		<?php do_action( 'epl_buttons_single_property' ); ?>

		<div class="epl-tab-section epl-section-property-details">
			<div class="tab-content">

				<?php do_action( 'epl_property_price_before' ); ?>
				<div class="property-meta pricing-compatibility">
					<?php do_action( 'epl_property_price' ); ?>
				</div>
				<?php do_action( 'epl_property_price_after' ); ?>
				<div class="property-feature-icons epl-clearfix">
					<?php do_action( 'epl_property_icons' ); ?>
				</div>
				<?php do_action( 'epl_property_land_category' ); ?>
				<?php do_action( 'epl_property_commercial_category' ); ?>
				<?php do_action( 'epl_property_available_dates' ); // meant for rent only. ?>
				<?php do_action( 'epl_property_inspection_times' ); ?>
			</div>
		</div>
	</div>

	<div class="epl-content epl-clearfix">

		<div class="epl-tab-wrapper tab-wrapper">

			<div class="epl-tab-section epl-section-description">
				<h5 class="epl-tab-title">
					<?php
						$title_desc = apply_filters( 'epl_property_tab_title_description', __( 'Description', 'easy-property-listings' ) );
						echo esc_html( $title_desc );
					?>
				</h5>
				<div class="tab-content">
					<!-- heading -->
					<h2 class="entry-title"><?php do_action( 'epl_property_heading' ); ?></h2>

					<h3 class="secondary-heading"><?php do_action( 'epl_property_secondary_heading' ); ?></h3>
					<?php
						do_action( 'epl_property_content_before' );

						do_action( 'epl_property_the_content' );

						do_action( 'epl_property_content_after' ); // For Extension Support.

					?>
				</div>
			</div>

			<?php do_action( 'epl_property_tab_section_before' ); ?>
			<div class="epl-tab-section epl-tab-section-features">
				<?php do_action( 'epl_property_features' ); ?>
			</div>
			<?php do_action( 'epl_property_tab_section_after' ); ?>

			<?php do_action( 'epl_property_gallery' ); ?>

			<?php do_action( 'epl_property_map' ); ?>

			<?php do_action( 'epl_single_extensions' ); ?>

			<?php do_action( 'epl_single_before_author_box' ); ?>
			<?php do_action( 'epl_single_author' ); ?>
			<?php do_action( 'epl_single_after_author_box' ); ?>
		</div>
	</div>
	<!-- categories, tags and comments -->
	<div class="epl-footer epl-clearfix">
		<div class="entry-meta">
			<?php
			wp_link_pages(
				array(
					'before'         => '<div class="entry-utility entry-pages">' . __( 'Pages:', 'easy-property-listings' ) . '',
					'after'          => '</div>',
					'next_or_number' => 'number',
				)
			);
			?>
		</div>
	</div>
</div>
<!-- end property -->
