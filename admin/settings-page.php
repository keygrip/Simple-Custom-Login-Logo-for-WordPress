<?php // settings page

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// display the plugin settings page
function fdm_login_logo_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<form action="options.php" method="post">
			<?php



				settings_fields( 'fdm_login_logo_options' );
				do_settings_sections( 'fdm-login-logo' );


			// submit button
			submit_button();

			?>
		</form>
	</div>

	<?php

}

// display default admin notice
function fdm_login_logo_add_settings_errors() {

	settings_errors();

}
add_action('admin_notices', 'fdm_login_logo_add_settings_errors');