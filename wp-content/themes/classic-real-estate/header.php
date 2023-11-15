<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Real Estate
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-real-estate' ); ?></a>

<header id="header" class="w-100 left-0">
  <div class="header-top <?php echo esc_attr(classic_real_estate_sticky_menu()); ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 align-self-center">
          <div class="logo">
            <?php classic_real_estate_the_custom_logo(); ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( get_theme_mod('classic_real_estate_title_enable',true) != "") { ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                <?php endif; ?>
              <?php } ?>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php $classic_real_estate_description = get_bloginfo( 'description', 'display' );
                  if ( $classic_real_estate_description || is_customize_preview() ) : ?>
                  <?php if ( get_theme_mod('classic_real_estate_tagline_enable',false) != "") { ?>
                  <p class="site-tagline mb-2"><?php echo esc_html( $classic_real_estate_description ); ?></p>
                  <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
          <div class="col-lg-3 col-md-3 align-self-center phone text-left">
            <?php if ( get_theme_mod('classic_real_estate_phone_number_text') != "" || get_theme_mod('classic_real_estate_phone_number') != "") { ?>
                <div class="phoneno">
                    <div class="row">
                      <div class="col-lg-2 col-md-3 col-3 align-self-center phone-icon">
                        <i class="fas fa-phone mb-2 mb-lg-2"></i>
                      </div>
                      <div class="col-lg-10 col-md-9 col-9 pl-lg-0 phone-text">
                        <p class="top-text m-0 text-uppercase"><?php echo esc_html(get_theme_mod ('classic_real_estate_phone_number_text','')); ?></p>
                        <a class="mb-0 top-contact" href="tel:<?php echo esc_attr( get_theme_mod('classic_real_estate_phone_number','' )); ?>"><?php echo esc_html(get_theme_mod ('classic_real_estate_phone_number','')); ?></a>
                      </div>
                    </div>
                </div>
            <?php }?>
          </div>
          <div class="col-lg-3 col-md-4 align-self-center email text-left">
            <?php if ( get_theme_mod('classic_real_estate_email_address_text') != "" || get_theme_mod('classic_real_estate_email_address') != "") { ?>
              <div class="emailadd">
                  <div class="row">
                    <div class="col-lg-2 col-md-3 col-2 align-self-center email-icon">
                      <i class="fas fa-envelope-open mb-2 mb-lg-2"></i>
                    </div>
                    <div class="col-lg-10 col-md-9 col-10 pl-lg-0 border-right email-text">
                      <p class="top-text text-uppercase m-0"><?php echo esc_html(get_theme_mod ('classic_real_estate_email_address_text','')); ?></p>
                      <a class="mb-0 top-contact" href="mailto:<?php echo esc_attr( get_theme_mod('classic_real_estate_email_address','') ); ?>"><?php echo esc_html(get_theme_mod ('classic_real_estate_email_address','')); ?></a>
                    </div>
                  </div>
              </div>
            <?php }?>
          </div>
        <div class="col-lg-3 col-md-2 menubox align-self-center">
          <div class="toggle-nav text-center my-2 align-self-center <?php echo esc_attr(classic_real_estate_sticky_menu_mobile()); ?>">
            <?php if(has_nav_menu('primary')){ ?>
              <button role="tab"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?php }?>
          </div>
          <div id="mySidenav" class="nav sidenav text-right">
            <nav id="site-navigation" class="main-nav contactbox" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','classic-real-estate' ); ?>">
               <div class="logo">
                <?php classic_real_estate_the_custom_logo(); ?>
                <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( get_theme_mod('classic_real_estate_title_enable',true) != "") { ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                      <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                      <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>
                  <?php } ?>
                <?php endif; ?>
                <?php $blog_info = get_bloginfo( 'name' ); ?>
                  <?php if ( ! empty( $blog_info ) ) : ?>
                    <?php $classic_real_estate_description = get_bloginfo( 'description', 'display' );
                      if ( $classic_real_estate_description || is_customize_preview() ) : ?>
                      <?php if ( get_theme_mod('classic_real_estate_tagline_enable',false) != "") { ?>
                      <p class="site-tagline mb-2"><?php echo esc_html( $classic_real_estate_description ); ?></p>
                      <?php } ?>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              <ul class="mobile_nav">
                <?php
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu' ,
                    'items_wrap' => '%3$s',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                ?>
              </ul>
                <?php if ( get_theme_mod('classic_real_estate_phone_number_text') != "" || get_theme_mod('classic_real_estate_phone_number') != "") { ?>
                  <div class="phoneno">
                      <div class="row">
                        <div class="col-lg-4 col-md-5 col-3 align-self-center phone-icon">
                          <i class="fas fa-phone mb-2 mb-lg-2"></i>
                        </div>
                        <div class="col-lg-8 col-md-7 col-9 pl-lg-0 phone-text">
                          <p class="top-text m-0 text-uppercase"><?php echo esc_html(get_theme_mod ('classic_real_estate_phone_number_text','')); ?></p>
                          <a class="mb-0 top-contact" href="tel:<?php echo esc_attr( get_theme_mod('classic_real_estate_phone_number','' )); ?>"><?php echo esc_html(get_theme_mod ('classic_real_estate_phone_number','')); ?></a>
                        </div>
                      </div>
                  </div>
                <?php }?>
                <?php if ( get_theme_mod('classic_real_estate_email_address_text') != "" || get_theme_mod('classic_real_estate_email_address') != "") { ?>
                  <div class="emailadd">
                      <div class="row">
                        <div class="col-lg-4 col-md-5 col-3 align-self-center email-icon">
                          <i class="fas fa-envelope-open mb-2 mb-lg-2"></i>
                        </div>
                        <div class="col-lg-8 col-md-7 col-9 pl-lg-0 border-right email-text">
                          <p class="top-text text-uppercase m-0"><?php echo esc_html(get_theme_mod ('classic_real_estate_email_address_text','')); ?></p>
                          <a class="mb-0 top-contact" href="mailto:<?php echo esc_attr( get_theme_mod('classic_real_estate_email_address','') ); ?>"><?php echo esc_html(get_theme_mod ('classic_real_estate_email_address','')); ?></a>
                        </div>
                      </div>
                  </div>
                <?php }?>
              <a href="javascript:void(0)" class="close-button"><i class="far fa-times-circle"></i></a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
