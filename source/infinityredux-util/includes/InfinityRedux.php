<?php

/**
 * Class InfinityRedux
 */
class InfinityRedux {
	/**
	 * General init function, used to setup the plugin
	 */
	static function init() {
		$dir = plugin_dir_path(__DIR__);

		/** @noinspection PhpIncludeInspection */
		include_once $dir . 'includes/InfinityReduxFrameShortcode.php';
		include_once $dir . 'includes/InfinityReduxFrameWidget.php';

		add_action( 'init',         array( 'InfinityReduxFrameShortcode', 'init' ) );
		add_action( 'widgets_init', array( 'InfinityReduxFrameWidget', 'init') );

		if ( is_admin() ) {
			// Only include admin interface files if we actually need to
			/** @noinspection PhpIncludeInspection */
			include_once $dir . 'admin/InfinityReduxAdmin.php';
			InfinityReduxAdmin::init();
		} else {
			// non-admin enqueues, actions, and filters
		}
	}

	/**
	 * Plugin activated.
	 */
	static function activate() {

	}

	/**
	 * Plugin disabled.
	 */
	static function deactivate() {

	}

	/**
	 * Plugin uninstalled / removed.
	 */
	static function uninstall() {

	}
}