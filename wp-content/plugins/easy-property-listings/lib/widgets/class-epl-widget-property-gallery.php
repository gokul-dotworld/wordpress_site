<?php
/**
 * WIDGET :: Property Gallery
 *
 * @package     EPL
 * @subpackage  Widget/Classes/Gallery
 * @copyright   Copyright (c) 2019, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * EPL_Widget_Property_Gallery class
 *
 * @since 1.0
 * @since 3.5 Added accessibility labels to select elements. Escaping value missing.
 */
class EPL_Widget_Property_Gallery extends WP_Widget {

	/**
	 * Construct the widget.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct( false, $name = __( 'EPL - Listing Gallery', 'easy-property-listings' ), array( 'description' => __( 'Display image gallery.', 'easy-property-listings' ) ) );
		// Widget name for filter: epl_property_gallery.
	}

	/**
	 * Widget function.
	 *
	 * @since 1.0
	 * @since 3.5 Added escaping to elements.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {

		// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped

		$defaults = array(
			'title'     => '',
			'd_columns' => '4',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		foreach ( $args as $arg_key => $arg_val ) {
			${$arg_key} = $arg_val;
		}

		$title       = apply_filters( 'widget_title', $instance['title'] );
		$d_columns   = $instance['d_columns'];
		$attachments = get_children(
			array(
				'post_parent'    => get_the_ID(),
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
			)
		);
		if ( ! empty( $attachments ) ) {
			echo $before_widget;
			if ( $title ) {
				echo $before_title . esc_html( $title ) . $after_title;
			}

			$gall = '[gallery columns="' . $d_columns . '" link="file"]';
			echo do_shortcode( $gall );
			echo $after_widget;
		}
	}

	/**
	 * Widget update.
	 *
	 * @param array $new_instance Old values.
	 * @param array $old_instance New values.
	 *
	 * @return array
	 * @since 1.0
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = wp_strip_all_tags( $new_instance['title'] );
		$instance['d_columns'] = wp_strip_all_tags( $new_instance['d_columns'] );
		return $instance;
	}

	/**
	 * Render the widget form.
	 *
	 * @since 1.0
	 * @since 3.5 Refactored escaping elements. Removed unnecessary variables.
	 * @param array $instance options.
	 */
	public function form( $instance ) {

		$defaults = array(
			'title'     => '',
			'd_columns' => '4',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'easy-property-listings' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'd_columns' ) ); ?>"><?php esc_html_e( 'Number of columns', 'easy-property-listings' ); ?></label>
			<select aria-label="<?php esc_attr_e( 'Number of columns', 'easy-property-listings' ); ?>"  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'd_columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'd_columns' ) ); ?>">
				<?php
				for ( $i = 1;$i <= 6;$i++ ) {
					echo '<option value="' . esc_attr( $i ) . '"';
					if ( $i == $instance['d_columns'] ) { //phpcs:ignore
						echo ' selected="selected"';
					} echo '>' . esc_html( $i ) . '</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
}

/**
 * Register Property Gallery Widget.
 *
 * Registers the EPL Widgets.
 *
 * @since 3.2.2
 * @return void
 */
function epl_register_widget_property_gallery() {
	register_widget( 'EPL_Widget_Property_Gallery' );
}
add_action( 'widgets_init', 'epl_register_widget_property_gallery' );
