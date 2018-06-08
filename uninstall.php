<?php
// exit if uninstall constant is not defined
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {

	exit;

}

// get selection from Remove Data on Uninstall in Admin
delete_option( 'fdm_login_logo_options' );
delete_transient( 'fdm_login_logo_options' );