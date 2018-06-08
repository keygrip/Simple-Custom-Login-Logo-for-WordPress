<?php // Admin Menu

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// add sub-level administrative menu
function fdm_login_logo_add_sublevel_menu() {

	/*

	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);

	*/

	add_submenu_page(
		'themes.php',
		'Login Logo Settings',
		'Login Logo',
		'manage_options',
		'fdm-login-logo',
		'fdm_login_logo_settings_page'
	);

}
add_action( 'admin_menu', 'fdm_login_logo_add_sublevel_menu' );