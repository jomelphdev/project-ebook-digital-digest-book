<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/text-block');

wp_enqueue_style(
	'fw-shortcode-text-block',
	$uri . '/static/css/styles.css'
);