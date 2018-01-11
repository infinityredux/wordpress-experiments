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
			'InfinityReduxFrameWidget',                     // Base ID of your widget
			__('InfinityRedux iFrame', 'infinityredux'),    // Widget name will appear in UI
			array( 'description' => __( 'An iframe displaying a specified link.', 'infinityredux' ), )
		);
	}

	/**
     * Creating widget front-end
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$source = apply_filters( 'widget_iframe_source', $instance['source'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
        if ( ! empty( $source ) )
            echo '<iframe src="' . $source . '"></iframe>';
		echo $args['after_widget'];
	}/** @noinspection PhpDocMissingReturnTagInspection */

	/**
     * Widget Backend
	 * @param array $instance
     *
	 */
	public function form( $instance ) {
        $options  = get_option( 'infinityredux_settings' );

	    $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'New title', 'infinityredux' );
        $source = isset( $instance[ 'source' ] ) ? $instance[ 'source' ] :
            (isset($options['defaultFrameURL']) ? $options['defaultFrameURL'] : '');

        // Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'source' ); ?>"><?php _e( 'Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'source' ); ?>" name="<?php echo $this->get_field_name( 'source' ); ?>" type="text" value="<?php echo esc_attr( $source ); ?>" />
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
        $instance['source'] = ( ! empty( $new_instance['source'] ) ) ? strip_tags( $new_instance['source'] ) : '';
		return $instance;
	}
}