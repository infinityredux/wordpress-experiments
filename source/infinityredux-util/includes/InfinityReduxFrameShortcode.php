<?php

class InfinityReduxFrameShortcode {
	/**
	 *
	 */
	static function init() {
		if (!shortcode_exists('iframe'))
			add_shortcode('iframe', array( 'InfinityReduxFrameShortcode', 'renderShortcode' ) );
	}

	/**
	 * @param array $atts
	 * @param null $content
	 * @param string $tag
	 *
	 * @return null|string
	 */
	static function renderShortcode($atts = [], $content = null, $tag = '') {
		// Ensure attribute keys are lower case and that default values exist
		$atts = array_change_key_case((array)$atts, CASE_LOWER);
		$attributes = shortcode_atts([
			'src' => 'https://infinityredux.net/',
		], $atts, $tag);

		$out = '<iframe src="' . esc_html__($attributes['src'], 'infinityredux') . '">';

		// secure output by executing the_content filter hook on $content
		// Run shortcode parser recursively (allows codes within content)
		if (!is_null($content)) {
			$out .= apply_filters('the_content', $content);
			$out .= do_shortcode($content);
		}

		$out .= '</iframe>';

		return $out;
	}
}