<?php
/**
 * Classic Real Estate Theme Customizer
 *
 * @package Classic Real Estate
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_real_estate_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('classic-real-estate-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	//Logo
    $wp_customize->add_setting('classic_real_estate_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_real_estate_sanitize_integer'
	));
	$wp_customize->add_control(new Classic_Real_Estate_Slider_Custom_Control( $wp_customize, 'classic_real_estate_logo_width',array(
		'label'	=> esc_html__('Logo Width','classic-real-estate'),
		'section'=> 'title_tagline',
		'settings'=>'classic_real_estate_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	// color site title
	$wp_customize->add_setting('classic_real_estate_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_sitetitle_color', array(
	   'settings' => 'classic_real_estate_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'classic-real-estate'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('classic_real_estate_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'classic_real_estate_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_real_estate_title_enable', array(
	   'settings' => 'classic_real_estate_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-real-estate'),
	   'type'      => 'checkbox'
	));


	// color site tagline
	$wp_customize->add_setting('classic_real_estate_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_sitetagline_color', array(
	   'settings' => 'classic_real_estate_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'classic-real-estate'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('classic_real_estate_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_real_estate_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_real_estate_tagline_enable', array(
	   'settings' => 'classic_real_estate_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-real-estate'),
	   'type'      => 'checkbox'
	));

	//Theme Options
	$wp_customize->add_panel( 'classic_real_estate_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-real-estate' ),
	) );

	// Header Section
	$wp_customize->add_section('classic_real_estate_general_section', array(
        'title' => __('Manage General Section', 'classic-real-estate'),
		'description' => __('<p class="sec-title">Manage General Section</p>','classic-real-estate'),
        'priority' => null,
		'panel' => 'classic_real_estate_panel_area',
 	));

 	$wp_customize->add_setting('classic_real_estate_sidebar',array(
		'default' => true,
		'sanitize_callback' => 'classic_real_estate_sanitize_checkbox',
	));

	$wp_customize->add_control( 'classic_real_estate_sidebar', array(
	   'section'   => 'classic_real_estate_general_section',
	   'label'	=> __('Check To Show Sidebar','classic-real-estate'),
	   'type'      => 'checkbox'
 	));

	// Header Section
	$wp_customize->add_section('classic_real_estate_header_section', array(
        'title' => __('Manage Header Section', 'classic-real-estate'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','classic-real-estate'),
        'priority' => null,
		'panel' => 'classic_real_estate_panel_area',
 	));

 	$wp_customize->add_setting('classic_real_estate_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'classic_real_estate_sanitize_checkbox',
	));

	$wp_customize->add_control( 'classic_real_estate_stickyheader', array(
	   'section'   => 'classic_real_estate_header_section',
	   'label'	=> __('Check To Show Sticky Header','classic-real-estate'),
	   'type'      => 'checkbox'
 	));

 	$wp_customize->add_setting('classic_real_estate_email_address_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_real_estate_email_address_text', array(
	   'settings' => 'classic_real_estate_email_address_text',
	   'section'   => 'classic_real_estate_header_section',
	   'label' => __('Add Text', 'classic-real-estate'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_real_estate_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_real_estate_email_address', array(
	   'settings' => 'classic_real_estate_email_address',
	   'section'   => 'classic_real_estate_header_section',
	   'label' => __('Add Email Address', 'classic-real-estate'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_real_estate_phone_number_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_real_estate_phone_number_text', array(
	   'settings' => 'classic_real_estate_phone_number_text',
	   'section'   => 'classic_real_estate_header_section',
	   'label' => __('Add Text', 'classic-real-estate'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_real_estate_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_real_estate_phone_number', array(
	   'settings' => 'classic_real_estate_phone_number',
	   'section'   => 'classic_real_estate_header_section',
	   'label' => __('Add Phone Number', 'classic-real-estate'),
	   'type'      => 'text'
	));

	// header menu
	$wp_customize->add_setting('classic_real_estate_menu_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_menu_color', array(
	   'settings' => 'classic_real_estate_menu_color',
	   'section'   => 'classic_real_estate_header_section',
	   'label' => __('Menu Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	// header menu hover color
	$wp_customize->add_setting('classic_real_estate_menuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_menuhrv_color', array(
	   'settings' => 'classic_real_estate_menuhrv_color',
	   'section'   => 'classic_real_estate_header_section',
	   'label' => __('Menu Hover Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	// header sub menu color
	$wp_customize->add_setting('classic_real_estate_submenu_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_submenu_color', array(
	   'settings' => 'classic_real_estate_submenu_color',
	   'section'   => 'classic_real_estate_header_section',
	   'label' => __('SubMenu Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	// header sub menu hover color
	$wp_customize->add_setting('classic_real_estate_submenuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_submenuhrv_color', array(
	   'settings' => 'classic_real_estate_submenuhrv_color',
	   'section'   => 'classic_real_estate_header_section',
	   'label' => __('SubMenu Hover Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	// Home Category Dropdown Section
	$wp_customize->add_section('classic_real_estate_one_cols_section',array(
		'title'	=> __('Manage Slider Section','classic-real-estate'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1200 x 600).','classic-real-estate'),
		'priority'	=> null,
		'panel' => 'classic_real_estate_panel_area'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'classic_real_estate_slidersection', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Classic_Real_Estate_Category_Dropdown_Custom_Control( $wp_customize, 'classic_real_estate_slidersection', array(
		'section' => 'classic_real_estate_one_cols_section',
		'settings'   => 'classic_real_estate_slidersection',
	) ) );

	//Hide Section
	$wp_customize->add_setting('classic_real_estate_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'classic_real_estate_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_hide_categorysec', array(
	   'settings' => 'classic_real_estate_hide_categorysec',
	   'section'   => 'classic_real_estate_one_cols_section',
	   'label'     => __('Check To Enable This Section','classic-real-estate'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_real_estate_button_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_real_estate_button_text', array(
	   'settings' => 'classic_real_estate_button_text',
	   'section'   => 'classic_real_estate_one_cols_section',
	   'label' => __('Add Button Text', 'classic-real-estate'),
	   'type'      => 'text'
	));

	// color slider title
	$wp_customize->add_setting('classic_real_estate_slidertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_slidertitle_color', array(
	   'settings' => 'classic_real_estate_slidertitle_color',
	   'section'   => 'classic_real_estate_one_cols_section',
	   'label' => __('Title Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	// color slider description
	$wp_customize->add_setting('classic_real_estate_sliderdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_sliderdescription_color', array(
	   'settings' => 'classic_real_estate_sliderdescription_color',
	   'section'   => 'classic_real_estate_one_cols_section',
	   'label' => __('Description Color', 'classic-real-estate'),
	   'type'      => 'color'
	));


	// color slider button1 text
	$wp_customize->add_setting('classic_real_estate_sliderbutton1text_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_sliderbutton1text_color', array(
	   'settings' => 'classic_real_estate_sliderbutton1text_color',
	   'section'   => 'classic_real_estate_one_cols_section',
	   'label' => __('Button Text Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	// color slider button1
	$wp_customize->add_setting('classic_real_estate_sliderbutton1_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_sliderbutton1_color', array(
	   'settings' => 'classic_real_estate_sliderbutton1_color',
	   'section'   => 'classic_real_estate_one_cols_section',
	   'label' => __('Button Background Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	// Services Section
	$wp_customize->add_section('classic_real_estate_apartments_section', array(
		'title'	=> __('Manage Our Apartments Section','classic-real-estate'),
		'description'	=> __('<p class="sec-title">Manage Our Apartments Section</p> Select service category from the Dropdowns for Our Apartments section.','classic-real-estate'),
		'priority'	=> null,
		'panel' => 'classic_real_estate_panel_area',
	));

	$wp_customize->add_setting('classic_real_estate_main_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_real_estate_main_title', array(
	   'settings' => 'classic_real_estate_main_title',
	   'section'   => 'classic_real_estate_apartments_section',
	   'label' => __('Add Section Title', 'classic-real-estate'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_real_estate_main_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_real_estate_main_text', array(
	   'settings' => 'classic_real_estate_main_text',
	   'section'   => 'classic_real_estate_apartments_section',
	   'label' => __('Add Section Content', 'classic-real-estate'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_real_estate_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'classic_real_estate_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( 'classic_real_estate_disabled_pgboxes', array(
	   'settings' => 'classic_real_estate_disabled_pgboxes',
	   'section'   => 'classic_real_estate_apartments_section',
	   'label'     => __('Check To Enable This Section','classic-real-estate'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting( 'classic_real_estate_services_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Classic_Real_Estate_Category_Dropdown_Custom_Control( $wp_customize, 'classic_real_estate_services_cat', array(
		'section' => 'classic_real_estate_apartments_section',
		'settings'   => 'classic_real_estate_services_cat',
	) ) );

	//  service heading color
	$wp_customize->add_setting('classic_real_estate_serviceheading_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_serviceheading_color', array(
	   'settings' => 'classic_real_estate_serviceheading_color',
	   'section'   => 'classic_real_estate_apartments_section',
	   'label' => __('Heading Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	//  service title color
	$wp_customize->add_setting('classic_real_estate_servicetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_servicetitle_color', array(
	   'settings' => 'classic_real_estate_servicetitle_color',
	   'section'   => 'classic_real_estate_apartments_section',
	   'label' => __('Title Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	//Blog post
	$wp_customize->add_section('classic_real_estate_blog_post_settings',array(
        'title' => __('Manage Post Section', 'classic-real-estate'),
        'priority' => null,
        'panel' => 'classic_real_estate_panel_area'
    ) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('classic_real_estate_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'classic_real_estate_sanitize_choices'
	));
	$wp_customize->add_control('classic_real_estate_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'classic-real-estate'),
     'description'   => __('This option work for blog page, archive page and search page.', 'classic-real-estate'),
     'section' => 'classic_real_estate_blog_post_settings',
     'choices' => array(
         'full' => __('Full','classic-real-estate'),
         'left' => __('Left','classic-real-estate'),
         'right' => __('Right','classic-real-estate'),
         'three-column' => __('Three Columns','classic-real-estate'),
         'four-column' => __('Four Columns','classic-real-estate'),
         'grid' => __('Grid Layout','classic-real-estate')
     ),
	) );

	$wp_customize->add_setting('classic_real_estate_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'classic_real_estate_sanitize_choices'
	));
	$wp_customize->add_control('classic_real_estate_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','classic-real-estate'),
        'section' => 'classic_real_estate_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','classic-real-estate'),
            'Excerpt Content' => __('Excerpt Content','classic-real-estate'),
            'Full Content' => __('Full Content','classic-real-estate'),
        ),
	) );

	// Footer Section
	$wp_customize->add_section('classic_real_estate_footer', array(
		'title'	=> __('Manage Footer Section','classic-real-estate'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','classic-real-estate'),
		'priority'	=> null,
		'panel' => 'classic_real_estate_panel_area',
	));

	$wp_customize->add_setting('classic_real_estate_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_real_estate_copyright_line', array(
	   'section' 	=> 'classic_real_estate_footer',
	   'label'	 	=> __('Copyright Line','classic-real-estate'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('classic_real_estate_copyright_link',array(
		'default' => 'https://www.theclassictemplates.com/free-real-estate-wordpress-theme/',
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'classic_real_estate_copyright_link', array(
	   'section' 	=> 'classic_real_estate_footer',
	   'label'	 	=> __('Copyright Link','classic-real-estate'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('classic_real_estate_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_footercoypright_color', array(
	   'settings' => 'classic_real_estate_footercoypright_color',
	   'section'   => 'classic_real_estate_footer',
	   'label' => __('Coypright Color', 'classic-real-estate'),
	   'type'      => 'color'
	));


	//  footer bg color
	$wp_customize->add_setting('classic_real_estate_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_footerbg_color', array(
	   'settings' => 'classic_real_estate_footerbg_color',
	   'section'   => 'classic_real_estate_footer',
	   'label' => __('BG Color', 'classic-real-estate'),
	   'type'      => 'color'
	));


	//  footer title color
	$wp_customize->add_setting('classic_real_estate_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_footertitle_color', array(
	   'settings' => 'classic_real_estate_footertitle_color',
	   'section'   => 'classic_real_estate_footer',
	   'label' => __('Title Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('classic_real_estate_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_footerdescription_color', array(
	   'settings' => 'classic_real_estate_footerdescription_color',
	   'section'   => 'classic_real_estate_footer',
	   'label' => __('Description Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('classic_real_estate_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_real_estate_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_real_estate_footerlist_color', array(
	   'settings' => 'classic_real_estate_footerlist_color',
	   'section'   => 'classic_real_estate_footer',
	   'label' => __('List Color', 'classic-real-estate'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_real_estate_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'classic_real_estate_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'classic_real_estate_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'classic-real-estate' ),
        'section'        => 'classic_real_estate_footer',
        'settings'       => 'classic_real_estate_scroll_hide',
        'type'           => 'checkbox',
    )));


}
add_action( 'customize_register', 'classic_real_estate_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_real_estate_customize_preview_js() {
	wp_enqueue_script( 'classic_real_estate_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_real_estate_customize_preview_js' );
