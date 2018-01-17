<?php

class InfinityReduxFrameShortcode {
	/**
	 *
	 */
	static function init() {
		if (!shortcode_exists('iframe')) {
            $options = get_option( 'infinityredux_settings' );
            if ($options['enableShortcode'] == 1)
                add_shortcode('iframe', array( 'InfinityReduxFrameShortcode', 'renderShortcode' ) );
        }
	}

	/**
	 * @param array $attributes
	 * @param null $content
	 * @param string $tag
	 *
	 * @return null|string
	 */
	static function renderShortcode($attributes = [], $content = null, $tag = '') {
		$options  = get_option( 'infinityredux_settings' );
        $attributes = shortcode_atts(
        	// Ensure that the default URL has been set and is not an empty string in for the default attributes
        	[ 'src' => ((isset($options['defaultFrameURL']) and strlen($options['defaultFrameURL']) > 0) ?
		        $options['defaultFrameURL'] : 'https://infinityredux.net/'), ],
	        // Ensure attribute keys are lower case and that default values exist
	        array_change_key_case((array)$attributes, CASE_LOWER),
	        $tag
        );

		$out = '<iframe src="' . esc_html__($attributes['src'], 'infinityredux') . '">';
		// Secure output by executing the_content filter hook on $content and recursively parse for further codes
		if (!is_null($content)) {
			$out .= apply_filters('the_content', $content);
			$out .= do_shortcode($content);
		}
		$out .= '</iframe>';

		return $out;
	}
}