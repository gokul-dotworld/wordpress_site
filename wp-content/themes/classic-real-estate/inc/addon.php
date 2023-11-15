<?php
/*
 * @package Car Service
 */

function classic_real_estate_admin_enqueue_scripts() {
	wp_enqueue_style( 'classic-real-estate-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'classic_real_estate_admin_enqueue_scripts' );

add_action('after_switch_theme', 'classic_real_estate_options');

function classic_real_estate_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=classic-real-estate' ) );
		exit;
	}
}

function classic_real_estate_theme_info_menu_link() {

	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'classic-real-estate' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'classic-real-estate' ),'edit_theme_options','classic-real-estate','classic_real_estate_theme_info_page'
	);
}
add_action( 'admin_menu', 'classic_real_estate_theme_info_menu_link' );

function classic_real_estate_theme_info_page() {

	$theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'classic-real-estate' ), esc_html($theme->display( 'Name', 'classic-real-estate'  )),esc_html($theme->display( 'Version', 'classic-real-estate' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'classic-real-estate' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'classic-real-estate' ); ?>:</strong>
			<a href="<?php echo esc_url( CLASSIC_REAL_ESTATE_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'classic-real-estate' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_REAL_ESTATE_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'classic-real-estate' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_REAL_ESTATE_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'classic-real-estate' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_REAL_ESTATE_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'classic-real-estate' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_REAL_ESTATE_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'classic-real-estate' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_REAL_ESTATE_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'classic-real-estate' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'classic-real-estate' ), 
		esc_html($theme->display( 'Name', 'classic-real-estate' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'classic-real-estate' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" alt="" />
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'classic-real-estate' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'classic-real-estate' ),esc_html($theme->display( 'Name', 'classic-real-estate' ))); ?></p>
					<p>
					<a href="<?php echo esc_attr(wp_customize_url()); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Customize Theme', 'classic-real-estate' ); ?></a>
					<a href="<?php echo esc_url( CLASSIC_REAL_ESTATE_PREMIUM_PAGE ); ?>" target="_blank" class="button button-secondary premium-btn"><?php esc_html_e( 'Checkout Premium', 'classic-real-estate' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'classic-real-estate' ),
			esc_html($theme->display( 'Name', 'classic-real-estate' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'classic-real-estate' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( CLASSIC_REAL_ESTATE_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'classic-real-estate' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'classic-real-estate' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
