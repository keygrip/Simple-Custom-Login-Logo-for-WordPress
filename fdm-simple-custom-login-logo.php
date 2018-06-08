<?php

/*
Plugin Name: Simple Custom Login Logo
Plugin URI:   https://flyingdonutmedia.com
Description: Adds the ability to add your own logo on the login page.
Version: 1.0.1
Author: Flying Donut Media
Author URI: https://flyingdonutmedia.com
License: GPL-3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: fdm-login-logo-wp
Domain Path:  /languages
*/

// Exit if file is called directly
if (! defined( 'ABSPATH' ) ){
	exit;
}

// load text domain
function fdm_login_logo_load_textdomain() {

	load_plugin_textdomain( 'fdm-login-logo-wp', false, plugin_dir_path( __FILE__ ) . 'languages/' );

}
add_action( 'plugins_loaded', 'fdm_login_logo_load_textdomain' );

// Enqueue Admin scripts and styles
function fdm_login_logo_admin_scripts() {

	wp_enqueue_media();

	wp_enqueue_script( 'fdm_login_logo_js', plugin_dir_url( __FILE__ ) . 'admin/js/admin-main.js', array(), null, true );
}
add_action( 'admin_enqueue_scripts', 'fdm_login_logo_admin_scripts' );

// if Admin Area
if ( is_admin() ){
	// include plugin dependencies
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
}

// Include dependencies: admin and public sections of site.
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';

// Add settings link to plugin on plugins page
function fdm_login_logo_add_settings_link ( $links ) {
	$settingsLink = array(
		'<a href="' . admin_url( 'themes.php?page=fdm-login-logo' ) . '">Settings</a>',
	);
	return array_merge( $links, $settingsLink );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'fdm_login_logo_add_settings_link' );

// default plugin options
function fdm_login_logo_options_default() {

	return array(
		'site_logo'             => '',
	);

}

/**
 * Custom Login Logo.
 */
function custom_admin_logo() {
	$option = get_option( 'fdm_login_logo_options', fdm_login_logo_options_default() );
	$img_logo = $option['site_logo'] ? $option['site_logo'] : '';
	echo '<style type="text/css">
	        h1 a
			{ 
				background-image:url('.$img_logo.')!important;
				width:300px !important;
				height:150px !important;
				background-size: contain !important;
				background-position: center top !important;
				margin: 0 auto !important;
			}
	    </style>';

}
add_action('login_head', 'custom_admin_logo');