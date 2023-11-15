<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classic Real Estate
 */
?>
<div style="background-color: #efebe5;">
<div id="footer">
  <div class="container">
    <div class="row py-3 footer-content">
      <?php dynamic_sidebar('footer-nav'); ?>
    </div>
  </div>
  <div class="copywrap text-center">
    <div class="container">
      <p><a href="<?php echo esc_html(get_theme_mod('classic_real_estate_copyright_link',__('https://www.theclassictemplates.com/free-real-estate-wordpress-theme/','classic-real-estate'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('classic_real_estate_copyright_line',__('Classic Real Estate WordPress Theme','classic-real-estate'))); ?></a> <?php echo esc_html('By Classic Templates','classic-real-estate'); ?></p>
    </div>
  </div>
</div>
</div>

<?php if(get_theme_mod('classic_real_estate_scroll_hide',false)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'classic-real-estate'); ?></a>
<?php } ?>
  
<?php wp_footer(); ?>
</body>
</html>
