<?php

// Exit if file is called directly
if (! defined( 'ABSPATH' ) ){
	exit;
}

// callback: display section
function fdm_login_logo_callback_section_admin() {

	echo '<p>Add your logo below to replace the default WordPress logo on the main login page.</p>';
}

// callback: Site Logo
function fdm_login_logo_callback_site_logo( $args ) {

	$options = get_option( 'fdm_login_logo_options', fdm_login_logo_options_default() );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

	if( empty( $value ) ) {
		$clearbutton = '';
		$image = '';
	} else {
		$clearbutton = ' <input type="button" value="Remove Image" class="button" id="reset-site-logo-uploader" />';
		$image = '<br/><span id="logo-image"><img src="'.$value.'" style="width: 100%; max-width: 200px;"/></span>';
	}
	echo '
        <form method="post" id="site-logo-uploader">
  			<input id="fdm_login_logo_options'. $id .'" name="fdm_login_logo_options['. $id .']" type="text" size="40" value="'. $value .'">
  			<input id="upload-button" type="button" class="button" value="Upload Image" />'.$clearbutton.'
		</form>
    ';
	echo '<label for="fdm_login_logo_options'. $id .'">'. $label .'</label>';

	if( !empty( $value ) ){
		echo $image;
	}
}