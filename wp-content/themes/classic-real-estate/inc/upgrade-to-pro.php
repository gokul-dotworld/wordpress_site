<?php
/**
 * Upgrade to pro options
 */
function classic_real_estate_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => esc_html( CLASSIC_REAL_ESTATE_PRO_NAME ),
			'pro_text' => esc_html__( 'About Classic Real Estate','classic-real-estate'),
			'priority' => 1,
		)
	);

	class Classic_Real_Estate_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLASSIC_REAL_ESTATE_THEME_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-admin-appearance"></i><?php esc_html_e( 'Theme Page', 'classic-real-estate' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLASSIC_REAL_ESTATE_SUPPORT ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'classic-real-estate' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLASSIC_REAL_ESTATE_REVIEW ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us', 'classic-real-estate' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLASSIC_REAL_ESTATE_PREMIUM_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade Pro', 'classic-real-estate' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( CLASSIC_REAL_ESTATE_THEME_DOCUMENTATION ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'classic-real-estate' ); ?> </a></li>

				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'classic_real_estate_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Classic_Real_Estate_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'classic_real_estate_upgrade_pro_options' );
