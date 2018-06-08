<?php

// Exit if file is called directly
if (! defined( 'ABSPATH' ) ){
	exit;
}

// register plugin settings
function fdm_login_logo_register_settings() {

	/*

	register_setting(
		string   $option_group,
		string   $option_name,
		callable $sanitize_callback
	);

	*/
// Register Display Options
	register_setting(
		'fdm_login_logo_options',
		'fdm_login_logo_options',
		'fdm_login_logo_validate_options'
	);

	/*

add_settings_section(
	string   $id,
	string   $title,
	callable $callback,
	string   $page
);

*/

// Add Display Options
	add_settings_section(
		'fdm_login_logo_section_admin',
		'Login Logo',
		'fdm_login_logo_callback_section_admin',
		'fdm-login-logo'
	);


	/*

		add_settings_field(
			string   $id,
			string   $title,
			callable $callback,
			string   $page,
			string   $section = 'default',
			array    $args = []
		);

		*/
// Add Field Display Options

	add_settings_field(
		'site_logo',
		esc_html__('Site Logo', 'fdm-login-logo-wp'),
		'fdm_login_logo_callback_site_logo',
		'fdm-login-logo',
		'fdm_login_logo_section_admin',
		[ 'id' => 'site_logo', 'label' => esc_html__('', 'fdm-login-logo-wp') ]
	);


}
add_action( 'admin_init', 'fdm_login_logo_register_settings' );