<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/featured-books');

wp_enqueue_style(
	'fw-shortcode-featured-books',
	$uri . '/static/css/styles.css'
);

if (!function_exists('_action_odrin_shortcode_featured_books_enqueue_dynamic_css')) {

function _action_odrin_shortcode_featured_books_enqueue_dynamic_css($data) {
    $shortcode = 'featured-books';
    $atts = shortcode_parse_atts( $data['atts_string'] );
    $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

    // atts
	$image_position = '';
	if ( !empty( $atts['vertical_position'] ) && !empty( $atts['horizontal_position'] ) ) {
		$image_position = 'background-position: ' . $atts['vertical_position'] . ' ' . $atts['horizontal_position'] . ';';
	}

	wp_add_inline_style(
		'fw-shortcode-featured-books',
		'#shortcode-'. $atts['id'] .' .bg-image { '.
			$image_position .
		' } '
		);
}
add_action(
    'fw_ext_shortcodes_enqueue_static:featured_books',
    '_action_odrin_shortcode_featured_books_enqueue_dynamic_css'
);

}