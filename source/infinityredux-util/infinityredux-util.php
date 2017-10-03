<?php

/*
Plugin Name: InfinityRedux Util
Description: Created to explore Wordpress plugins, a series of utilities to add useful extras and random experiments.
Version: 0.2
Author: Nick Elliott
Plugin URI: https://portfolio.infinityredux.net/portfolio
License: GPL3
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo "This is just a plugin, not much it can do by itself.";
	exit;
}

/** @noinspection PhpIncludeInspection */
include_once plugin_dir_path( __FILE__ ) . 'includes/InfinityRedux.php';

register_activation_hook(   __FILE__, array( 'InfinityRedux', 'activate') );
register_deactivation_hook( __FILE__, array( 'InfinityRedux', 'deactivate') );
register_uninstall_hook(    __FILE__, array( 'InfinityRedux', 'uninstall') );

InfinityRedux::init();