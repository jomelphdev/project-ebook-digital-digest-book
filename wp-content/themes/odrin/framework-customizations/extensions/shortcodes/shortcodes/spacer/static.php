<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/spacer');

wp_enqueue_style(
	'fw-shortcode-spacer',
	$uri . '/static/css/styles.css'
);


if (!function_exists('_action_odrin_shortcode_spacer_enqueue_dynamic_css')) {

function _action_odrin_shortcode_spacer_enqueue_dynamic_css($data) {
	$shortcode = 'spacer';
	$atts = shortcode_parse_atts( $data['atts_string'] );
	$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

	// atts
	$style = ( isset( $atts['height'] ) ) ? 'height: ' . esc_attr($atts['height']) . ';' : '';
	$style_mobile = ( isset( $atts['height_mobile'] ) ) ? 'height: ' . esc_attr($atts['height_mobile']) . ';' : '';

	wp_add_inline_style(
		'fw-shortcode-spacer',
		'#shortcode-'. $atts['id'] .' { '.
			$style .
		' } ' . 
		'@media only screen and (max-width: 991px) {' .
			 '#shortcode-'. $atts['id'] .' { '.
				$style_mobile .
			' } ' . 
		' } ' 
	);
}
add_action(
	'fw_ext_shortcodes_enqueue_static:spacer',
	'_action_odrin_shortcode_spacer_enqueue_dynamic_css'
);

}