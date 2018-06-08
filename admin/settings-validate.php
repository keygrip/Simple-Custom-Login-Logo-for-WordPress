<?php

// Exit if file is called directly
if (! defined( 'ABSPATH' ) ){
	exit;
}

// validate plugin settings
function fdm_login_logo_validate_options($input) {

	// Site Logo
	if ( isset( $input['site_logo'] ) ) {

		$input['site_logo'] = esc_url( $input['site_logo'] );

	}

	return $input;

}