<?php

  $classic_real_estate_color_scheme_css = '';

  // slider hide css
  $classic_real_estate_hide_categorysec = get_theme_mod( 'classic_real_estate_hide_categorysec', false);
  if($classic_real_estate_hide_categorysec != true){
    $classic_real_estate_color_scheme_css .=' .page-template-template-home-page #header{';
      $classic_real_estate_color_scheme_css .='position:static;';
    $classic_real_estate_color_scheme_css .='}';
    $classic_real_estate_color_scheme_css .=' .slidersearch{';
      $classic_real_estate_color_scheme_css .='display:none;';
    $classic_real_estate_color_scheme_css .='}';
  }

  // default home page css
  if ( ! is_front_page() ) { 
    $classic_real_estate_color_scheme_css .= ' .page-template-template-home-page #header {';
    $classic_real_estate_color_scheme_css .= ' position: static;';
    $classic_real_estate_color_scheme_css .= ' }';
}

//---------------------------------Logo-Max-height--------- 
  $classic_real_estate_logo_width = get_theme_mod('classic_real_estate_logo_width');

  if($classic_real_estate_logo_width != false){

    $classic_real_estate_color_scheme_css .='.logo .custom-logo-link img{';

      $classic_real_estate_color_scheme_css .='width: '.esc_html($classic_real_estate_logo_width).'px;';

    $classic_real_estate_color_scheme_css .='}';
  }


