<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Real Estate
 */

get_header(); ?>

<div id="content" >
  <?php
    $hidcatslide = get_theme_mod('classic_real_estate_hide_categorysec', true);
    if( $hidcatslide != ''){
  ?>
    <section id="slider">
      <div class="owl-carousel owl-theme slider-sec">
        <?php if( get_theme_mod('classic_real_estate_slidersection',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('classic_real_estate_slidersection',true)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
          <div class="item">
            <div class="content d-flex align-items-center" style="background-image: url(<?php 
              if (has_post_thumbnail()) {
                echo the_post_thumbnail_url('full');
              } else {
                echo esc_url(get_template_directory_uri() . '/images/slider-img.png');
              }
              ?>);">
              <div class="sliderbox">
                    <h1 class="title-slider mb-2 text-start">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>
                    <?php
                      $trimexcerpt = get_the_excerpt();
                      $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 25 );
                      echo ' <p class="text-slider mb-2 text-start">' . esc_html( $shortexcerpt ) . '</p>'; 
                    ?>
                    <div class="gap-md-3 gap-1 text-start mt-4 sliderbtn">
                      <?php if (get_theme_mod('classic_real_estate_button_text', 'true') != "") { ?>
                          <a href="<?php the_permalink(); ?>" class="button redmor mb-3">
                            <?php echo esc_html(get_theme_mod('classic_real_estate_button_text', __('Read More', 'classic-real-estate'))); ?>
                            <span class="screen-reader-text">
                              <?php echo esc_html(get_theme_mod('classic_real_estate_button_text', __('Read More', 'classic-real-estate'))); ?>
                            </span>
                          </a>
                      <?php } ?>
                  </div>
              </div>
              <div class="overlayer"></div>
            </div>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php } ?>
      </div>
    </section>
  <?php } ?>
  <div class="slidersearch">
    <div class="slide-search">
      <?php get_search_form(); ?>
    </div>
  </div>
  <?php
$classic_real_estate_hidepageboxes = get_theme_mod('classic_real_estate_disabled_pgboxes', true);
if ($classic_real_estate_hidepageboxes != '') {
?>
<section id="service" class="my-5">
  <?php if (get_theme_mod('classic_real_estate_services_cat', false)) { ?>
    <div class="container">
      <?php if (get_theme_mod('classic_real_estate_main_title', '')) { ?>
        <h2 class="text-center mb-2"><?php echo esc_html(get_theme_mod('classic_real_estate_main_title', '')); ?></h2>
      <?php } ?>
      <?php if (get_theme_mod('classic_real_estate_main_text', '')) { ?>
        <p class="main_text text-center w-50 mx-auto"><?php echo esc_html(get_theme_mod('classic_real_estate_main_text', '')); ?></p>
      <?php } ?>
      <div class="row">
        <?php
        $queryvar = new WP_Query('cat=' . esc_attr(get_theme_mod('classic_real_estate_services_cat', true)));
        while ($queryvar->have_posts()) : $queryvar->the_post();
        ?>
          <div class="col-lg-4 col-md-4 services mb-4">
              <?php the_post_thumbnail('full'); ?>
            <div class="service-content">
              <h3 class="my-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <div class="meta-fields">
                <?php if (get_post_meta($post->ID, 'classic_real_estate_custom_bedrooms', true)) { ?>
                  <p class="text-center mb-1 serv-num me-lg-3 me-md-1 me-3"><?php echo esc_html(get_post_meta($post->ID, 'classic_real_estate_custom_bedrooms', true)); ?> bedrooms</p>
                <?php } ?>

                <?php if (get_post_meta($post->ID, 'classic_real_estate_custom_beds', true)) { ?>
                  <p class="text-center mb-1 serv-num me-lg-3 me-md-1 me-3"><?php echo esc_html(get_post_meta($post->ID, 'classic_real_estate_custom_beds', true)); ?> beds</p>
                <?php } ?>

                <?php if (get_post_meta($post->ID, 'classic_real_estate_custom_bathrooms', true)) { ?>
                  <p class="text-center mb-1 serv-num me-lg-3 me-md-1 me-3"><?php echo esc_html(get_post_meta($post->ID, 'classic_real_estate_custom_bathrooms', true)); ?> bathrooms</p>
                <?php } ?>
              </div>
              <div class="price-meta-fields">
                <?php if (get_post_meta($post->ID, 'classic_real_estate_custom_price', true)) { ?>
                  <p class="text-left mb-1 serv-num"><?php echo esc_html(get_post_meta($post->ID, 'classic_real_estate_custom_price', true)); ?></p>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
        ?>
      </div> 
    </div>
  <?php } ?>
</section>
<?php } ?>


<?php get_footer(); ?>
