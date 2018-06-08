<?php

// Exit if file is called directly
if (! defined( 'ABSPATH' ) ){
	exit;
}

// Site Logo
function fdm_login_logo_site_logo( $url ) {

	$options = get_option( 'fdm_login_logo_options', fdm_login_logo_options_default() );

	if ( isset( $options['site_logo'] ) && ! empty( $options['site_logo'] ) ) {

		$url = esc_url( $options['site_logo'] );

	}

	return $url;

}
add_action( 'wp_footer', 'fdm_login_logo_site_logo' );