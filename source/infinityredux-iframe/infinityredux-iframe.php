<?php

/*
Plugin Name: InfinityRedux iFrame
Description: A customisable iFrame for display.
Version: 0.1
Author: Nick Elliott
Plugin URI: https://portfolio.infinityredux.net/portfolio
License: GPL3
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo "This is just a plugin, not much it can do by itself.";
	exit;
}

include_once plugin_dir_path( __FILE__ ) . 'includes/InfinityFrame.php';

register_activation_hook(__FILE__, array('InfinityFrame', 'install'));
register_deactivation_hook(__FILE__, array('InfinityFrame', 'disable'));
register_uninstall_hook(__FILE__, array('InfinityFrame', 'remove'));

if ( is_admin() ) {
	// Only include admin interface files if we actually need to
	include_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
} else {
	// non-admin enqueues, actions, and filters
}

include_once plugin_dir_path( __FILE__ ) . 'includes/widget_example.php';
