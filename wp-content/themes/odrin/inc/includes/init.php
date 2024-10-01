<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }


/**
 * ACF FontIconPicker Init
 */
if ( function_exists('get_field') ) {
	include_once( get_theme_file_path('/inc/includes/acf-fonticonpicker/fonticonpicker-v5.php'));
}
/**
 * ACF Fields
 */
function odrin_include_acf_fields(){
	include_once( get_theme_file_path('/inc/includes/acf-fields/acf-fields.php'));
}

add_action('init', 'odrin_include_acf_fields', 20);