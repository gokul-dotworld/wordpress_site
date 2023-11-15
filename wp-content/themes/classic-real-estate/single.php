<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Classic Real Estate
 */

get_header(); ?>

<?php
 $classic_real_estate_sidebar = get_theme_mod( 'classic_real_estate_sidebar',true );
 if ( false == $classic_real_estate_sidebar ) {
   $colmd = 'col-lg-12 col-md-12';
 } else { 
   $colmd = 'col-lg-8 col-md-8';
 } 
?>

<div class="container">
    <div id="content" class="contentsecwrap">
        <div class="row">
            <div class="<?php echo esc_attr( $colmd ); ?>">
                <section class="site-main">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <header class="page-header">
                            <h1><?php the_title(); ?></h1>
                            <span><?php classic_real_estate_the_breadcrumb(); ?></span>
                        </header>
                        <?php get_template_part( 'template-parts/post/content-single', 'single' ); ?>
                        <?php the_post_navigation(); ?>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                        	comments_template();
                        ?>
                    <?php endwhile; // end of the loop. ?>
                </section>
            </div>
            <?php if ( false != $classic_real_estate_sidebar ) {?>
                <div class="col-lg-3 col-md-4">
                    <?php get_sidebar();?>
                </div>
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>