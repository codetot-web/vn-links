<?php
/**
 * Register assets
 *
 * @package vn_links_widget
 * @author codetot
 * @since 0.0.1
 */

class Vn_Links_Widget_Legacy_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'vn-links-widget',
			__('VN Links Widget', 'vn-links-widget')
		);

		add_action( 'widgets_init', function() {
			register_widget( 'Vn_Links_Widget_Legacy_Widget' );
		} );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        echo '<div class="textwidget">';

        echo do_shortcode('[vn-links-widget]');

        echo '</div>';

        echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Website Links', 'vn-links-widget' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'vn-links-widget' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
		<?php
	}
}
