<?php
/**
 * Archive Template for Author Profile : author.php
 *
 * @package     EPL
 * @subpackage  Templates/Author
 * @copyright   Copyright (c) 2020, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 * @since 3.5.0 removed builder_get_tax_term_title() & builder_get_author_link() method call.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:disable WordPress.WP.GlobalVariablesOverride

get_header(); ?>

<div id="primary" class="site-content">
	<?php
	if ( have_posts() ) :
		?>
		<div class="loop">
			<div class="loop-header">
				<?php echo esc_html( epl_property_author_box() ); ?>
				<h4 class="loop-title">
					<?php
						the_post();

					if ( is_category() ) { // Category Archive.
						/* translators: %s: post type name */
						$title = sprintf( __( 'Archive for %s', 'easy-property-listings' ), single_cat_title( '', false ) );
					} elseif ( is_tag() ) { // Tag Archive.
						/* translators: %s: post type name */
						$title = sprintf( __( 'Archive for %s', 'easy-property-listings' ), single_tag_title( '', false ) );
					} elseif ( is_tax() ) { // Tag Archive.
						/* translators: %s: post type name */
						$term = get_queried_object(); 
						$title = sprintf( __( 'Archive for %s', 'easy-property-listings' ), $term->name );
					} elseif ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() && function_exists( 'post_type_archive_title' ) ) { // Post Type Archive.
						$title = post_type_archive_title( '', false );
					} elseif ( is_author() ) { // Author Archive.
						/* translators: %s: post type name */
						$title = sprintf( __( 'Author Archive for %s', 'easy-property-listings' ), get_the_author() );
					} elseif ( is_year() ) { // Year-Specific Archive.
						/* translators: %s: post type name */
						$title = sprintf( __( 'Archive for %s', 'easy-property-listings' ), get_the_time( 'Y' ) );
					} elseif ( is_month() ) { // Month-Specific Archive.
						/* translators: %s: post type name */
						$title = sprintf( __( 'Archive for %s', 'easy-property-listings' ), get_the_time( 'F Y' ) );
					} elseif ( is_day() ) { // Day-Specific Archive.
						/* translators: %s: post type name */
						$title = sprintf( __( 'Archive for %s', 'easy-property-listings' ), get_the_date() );
					} elseif ( is_time() ) { // Time-Specific Archive.
						$title = __( 'Time Archive', 'easy-property-listings' );
					} else { // Default catchall just in case.
						$title = __( 'Archive', 'easy-property-listings' );
					}

					if ( is_paged() ) {
						printf( '%s &ndash; Page %d', esc_attr( $title ), esc_attr( get_query_var( 'paged' ) ) );
					} else {
						echo esc_attr( $title );
					}

						rewind_posts();
					?>
				</h4>
			</div>

			<div class="loop-content">
				<?php
				while ( have_posts() ) : // The Loop.
					the_post();
					?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<!-- title, meta, and date info -->
							<div class="entry-header clearfix">
								<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="entry-meta">
									<?php
									/* translators: %s: author name */
									printf( esc_html__( 'By %s', 'easy-property-listings' ), '<span class="meta-author">' . esc_url( get_the_author_link() ) . '</span>' );
									/* translators: %s: comment count */
									do_action( 'builder_comments_popup_link', '<span class="meta-comments">&middot; ', '</span>', esc_html__( 'Comments %s', 'easy-property-listings' ), esc_html__( '(0)', 'easy-property-listings' ), esc_html__( '(1)', 'easy-property-listings' ), esc_html__( '(%)', 'easy-property-listings' ) );
									?>
								</div>

								<div class="entry-meta date">
									<span class="weekday"><?php the_time( 'l' ); ?><span class="weekday-comma">,</span></span>
									<span class="month"><?php the_time( 'F' ); ?></span>
									<span class="day"><?php the_time( 'j' ); ?><span class="day-suffix"><?php the_time( 'S' ); ?></span><span class="day-comma">,</span></span>
									<span class="year"><?php the_time( 'Y' ); ?></span>
								</div>
							</div>

							<!-- post content -->
							<div class="entry-content clearfix">
								<?php the_excerpt(); ?>
							</div>

							<!-- categories, tags and comments -->
							<div class="entry-footer clearfix">
								<?php
								/* translators: %s: author name */
								do_action( 'builder_comments_popup_link', '<div class="entry-meta alignright"><span class="comments">', '</span></div>', __( 'Comments %s', 'easy-property-listings' ), __( '(0)', 'easy-property-listings' ), __( '(1)', 'easy-property-listings' ), __( '(%)', 'easy-property-listings' ) );
								?>
								<div class="entry-meta alignleft">
									<div class="categories">
										<?php
										/* translators: %s: author name */
										printf( esc_html__( 'Categories : %s', 'easy-property-listings' ), esc_html( get_the_category_list( ', ' ) ) );
										?>
									</div>
									<?php the_tags( '<div class="tags">' . __( 'Tags : ', 'easy-property-listings' ), ', ', '</div>' ); ?>
								</div>
							</div>
						</div>
						<!-- end .post -->

						<?php
						comments_template(); // include comments template.
					endwhile; // end of one post.
				?>
			</div>

			<div class="loop-footer">
				<!-- Previous/Next page navigation -->
				<div class="loop-utility clearfix">
					<div class="alignleft"><?php previous_posts_link( __( '&laquo; Previous Page', 'easy-property-listings' ) ); ?></div>
					<div class="alignright"><?php next_posts_link( __( 'Next Page &raquo;', 'easy-property-listings' ) ); ?></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php
get_sidebar();
get_footer();
