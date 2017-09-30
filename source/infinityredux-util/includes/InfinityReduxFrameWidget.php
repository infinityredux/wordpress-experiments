<?php

/**
 * Class InfinityReduxFrameWidget
 */
class InfinityReduxFrameWidget extends WP_Widget {

	/**
	 * Static function to be called during 'widgets_init' action.
	 */
    static function init() {
	    register_widget( 'InfinityReduxFrameWidget' );
    }

	function __construct() {
		parent::__construct(
			'InfinityReduxFrameWidget',                  // Base ID of your widget
			__('InfinityRedux iFrame', 'infinityredux'),    // Widget name will appear in UI
			array( 'description' => __( 'An iframe displaying the link specified.', 'infinityredux' ), )
		);
	}

	/**
     * Creating widget front-end
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo __( 'Hello, World!', 'infinityredux' );
		echo $args['after_widget'];
	}/** @noinspection PhpDocMissingReturnTagInspection */

	/**
     * Widget Backend
	 * @param array $instance
     *
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'infinityredux' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	/**
     * Updating the widget replaces the old instance with new
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}