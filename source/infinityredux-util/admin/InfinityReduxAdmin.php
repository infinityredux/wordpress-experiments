<?php

class InfinityReduxAdmin {
	static function init() {
		/** @noinspection PhpIncludeInspection */
		include_once plugin_dir_path(__FILE__) . 'InfinityReduxAdminOptions.php';

		add_action('admin_menu', array( 'InfinityReduxAdminOptions', 'initMenu' ));
		add_action('admin_init', array( 'InfinityReduxAdminOptions', 'initSettings' ));
	}
}
