<?php
/**
 * @package Classic Real Estate
 * Setup the WordPress core custom header feature.
 *
 * @uses classic_real_estate_header_style()
 */
function classic_real_estate_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'classic_real_estate_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 2500,
		'height'                 => 400,
		'wp-head-callback'       => 'classic_real_estate_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'classic_real_estate_custom_header_setup' );

if ( ! function_exists( 'classic_real_estate_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see classic_real_estate_custom_header_setup().
 */
function classic_real_estate_header_style() {
	$header_text_color = get_header_textcolor();

	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		#header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
			background-size: cover;
		}

	<?php endif; ?>	

	.page-template-template-home-page .site-title a, .page-template-template-home-page p.site-title a, h1.site-title a, p.site-title a{
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_sitetitle_color')); ?> !important;
	}

	.page-template-template-home-page .site-tagline, .site-tagline{
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_sitetagline_color')); ?> !important;
	}

	#header .fa-facebook {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_fb_color')); ?>;
	}

	#header .fa-twitter { 
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_twitt_color')); ?>;
	}

	#header .fa-pinterest  {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_pinterst_color')); ?>;
	}

	#header .fa-instagram  {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_insta_color')); ?>;
	}

	#header .fa-linkedin  {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_linkedin_color')); ?>;
	}

	#header .fa-youtube  {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_youtube_color')); ?>;
	}

	.main-nav ul li a {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_menu_color')); ?>;
	}

	.main-nav a:hover, .current_page_item a {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_menuhrv_color')); ?>;
	}

	.main-nav ul ul a{
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_submenu_color')); ?> !important;
	}

	.main-nav ul ul a:hover {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_submenuhrv_color')); ?> !important;
	}

	.sliderbox h1 a{
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_slidertitle_color')); ?> !important;
	}

	#slider p.text-slider {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_sliderdescription_color')); ?> !important;
	}

	#slider .redmor {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_sliderbutton1text_color')); ?> !important;
	}

	#slider .redmor {
		background-color: <?php echo esc_attr(get_theme_mod('classic_real_estate_sliderbutton1_color')); ?> !important;
	}

	
	#service h2{
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_serviceheading_color')); ?> !important;
	}

	.service-content h3 a{
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_servicetitle_color')); ?>;
	}

	.copywrap p {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_footercoypright_color')); ?> !important;
	}

	#footer h6 {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_footertitle_color')); ?> !important;

	}

	#footer p {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_footerdescription_color')); ?>;

	}

	#footer ul li a {
		color: <?php echo esc_attr(get_theme_mod('classic_real_estate_footerlist_color')); ?>;

	}


	#footer {
		background-color: <?php echo esc_attr(get_theme_mod('classic_real_estate_footerbg_color')); ?>;
	}
	

	</style>
	<?php 
}
endif;