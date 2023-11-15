<?php
/**
 * Classic Real Estate functions and definitions
 *
 * @package Classic Real Estate
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'classic_real_estate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_real_estate_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;

	load_theme_textdomain( 'classic-real-estate', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'classic-real-estate' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // classic_real_estate_setup
add_action( 'after_setup_theme', 'classic_real_estate_setup' );

function classic_real_estate_the_breadcrumb() {
	if (!is_home()) {
		echo '<a class="text-decoration-none fw-light" href="';
		echo esc_url( home_url() );
		echo '">';
		bloginfo('name');
		echo "</a> <i class='fas fa-chevron-right fs-6'></i> ";
		if (is_category() || is_single()) {
			the_category(' , ');
			if (is_single()) {
				echo " <i class='fas fa-chevron-right fs-6'></i> ";
				the_title();
			}
		} elseif (is_page()) {
			echo '<span class="text-decoration-none fw-light">';
			echo the_title();
			echo '</span>';
		}
	}
}

function classic_real_estate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'classic-real-estate' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-real-estate' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'classic-real-estate' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'classic-real-estate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'classic-real-estate' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'classic-real-estate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'classic-real-estate' ),
		'description'   => __( 'Appears on footer', 'classic-real-estate' ),
		'id'            => 'footer-nav',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-lg-3 col-mb-3 col-sm-6 col-xs-12">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title fw-normal fs-4 mt-4 mb-3">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'classic_real_estate_widgets_init' );

function classic_real_estate_scripts() {
	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style('classic-real-estate-style', get_stylesheet_uri(), array() );
		wp_style_add_data('classic-real-estate-style', 'rtl', 'replace');

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'classic-real-estate-style',$classic_real_estate_color_scheme_css );
	
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'classic-real-estate-default', esc_url(get_template_directory_uri())."/css/default.css" );
	
	wp_enqueue_style( 'classic-real-estate-style', get_stylesheet_uri() );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'classic-real-estate-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	wp_enqueue_style( 'classic-real-estate-block-style', esc_url( get_template_directory_uri() ).'/css/blocks.css' );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font family
	$classic_real_estate_body_font = esc_html(get_theme_mod('classic_real_estate_body_fonts'));

	if( $classic_real_estate_body_font ) {
		wp_enqueue_style( 'outfit', '//fonts.googleapis.com/css?family='. $classic_real_estate_body_font );
	} else {
		wp_enqueue_style( 'classic-real-estate-source-body', '//fonts.googleapis.com/css?family=Outfit:wght@100;200;300;400;500;600;700;800;900');
	}
}
add_action( 'wp_enqueue_scripts', 'classic_real_estate_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

/**
 * Webfont-Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Theme Info Page.
 */
if ( ! defined( 'CLASSIC_REAL_ESTATE_PRO_NAME' ) ) {
	define( 'CLASSIC_REAL_ESTATE_PRO_NAME', __( 'About Classic Real Estate', 'classic-real-estate' ));
}
if ( ! defined( 'CLASSIC_REAL_ESTATE_THEME_PAGE' ) ) {
define('CLASSIC_REAL_ESTATE_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','classic-real-estate'));
}
if ( ! defined( 'CLASSIC_REAL_ESTATE_SUPPORT' ) ) {
define('CLASSIC_REAL_ESTATE_SUPPORT',__('https://wordpress.org/support/theme/classic-real-estate/','classic-real-estate'));
}
if ( ! defined( 'CLASSIC_REAL_ESTATE_REVIEW' ) ) {
define('CLASSIC_REAL_ESTATE_REVIEW',__('https://wordpress.org/support/theme/classic-real-estate/reviews/#new-post','classic-real-estate'));
}
if ( ! defined( 'CLASSIC_REAL_ESTATE_PRO_DEMO' ) ) {
define('CLASSIC_REAL_ESTATE_PRO_DEMO',__('https://www.theclassictemplates.com/trial/classic-real-estate-pro/','classic-real-estate'));
}
if ( ! defined( 'CLASSIC_REAL_ESTATE_PREMIUM_PAGE' ) ) {
define('CLASSIC_REAL_ESTATE_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/estate-wordpress-theme/','classic-real-estate'));
}
if ( ! defined( 'CLASSIC_REAL_ESTATE_THEME_DOCUMENTATION' ) ) {
define('CLASSIC_REAL_ESTATE_THEME_DOCUMENTATION',__('https://theclassictemplates.com/documentation/classic-real-estate-free/','classic-real-estate'));
}

if ( ! function_exists( 'classic_real_estate_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function classic_real_estate_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;