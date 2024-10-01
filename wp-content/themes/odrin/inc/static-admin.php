<?php if ( ! defined( 'ABSPATH' ) ) { die(); }
/**
 * Include static files: javascript and css
 */

if ( !is_admin() ) {	

	return;
	
}

// ACF CSS Edits
wp_enqueue_style(
	'odrin_acf-custom-css',
	get_template_directory_uri() . '/inc/admin/assets/css/acf.css',
	array(),
	'1.0'
);

// Unyson CSS Edits
wp_enqueue_style(
	'odrin_unyson-custom-css',
	get_template_directory_uri() . '/inc/admin/assets/css/unyson-edit.css',
	array(),
	'1.0'
);


// Custom scripts
wp_enqueue_script(
	'odrin_fw-theme-admin-script',
	get_template_directory_uri() . '/inc/admin/assets/js/scripts.js',
	array( 'jquery' ),
	'1.0',
	true
);


// Localization
$theme_settings_url = '<a href="' . admin_url('themes.php?page=fw-settings') . '" target="_blank">' . esc_html__('Appearance > Theme Settings > General' ,'odrin') . '</a>';

wp_localize_script( 'odrin_fw-theme-admin-script', 'odrin_admin', array(
		'gooleapi_error' => sprintf( __( 'Please enter your Google Maps API Key in the <strong>Google API Key</strong> field in %s. If the problem still persists, see the JavaScript console of your browser for technical details.', 'odrin' ), $theme_settings_url )
	)
);