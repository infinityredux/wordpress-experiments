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

register_activation_hook(__FILE__, array('InfinityFrame', 'activate'));
register_deactivation_hook(__FILE__, array('InfinityFrame', 'deactivate'));
register_uninstall_hook(__FILE__, array('InfinityFrame', 'uninstall'));

InfinityFrame::init();