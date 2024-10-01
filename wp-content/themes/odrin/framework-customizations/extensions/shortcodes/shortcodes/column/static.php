<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/column');

wp_enqueue_style(
	'fw-shortcode-column',
	$uri . '/static/css/styles.css'
);


if (!function_exists('_action_odrin_shortcode_column_enqueue_dynamic_css')) {

function _action_odrin_shortcode_column_enqueue_dynamic_css($data) {
	$shortcode = 'column';
	$atts = shortcode_parse_atts( $data['atts_string'] );
	$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

	// atts
    $bg_color = '';
	if ( $atts['background_color_picker']['background_color'] == 'yes' ) {
		$bg_color = 'background-color: ' .  $atts['background_color_picker']['yes']['background_color'] . '; ';
	}

	$padding = '';
	$style_mobile = '';

	if ( $atts['custom_padding']['custom_padding'] == 'yes' ) {
		if ( ! empty( $atts['custom_padding']['yes']['padding'] ) ) {
			$padding = 'padding:' . $atts['custom_padding']['yes']['padding'] . ';';
		}

		if ( ! empty( $atts['custom_padding']['yes']['padding_mobile'] ) ) {
			$style_mobile = 'padding:' . $atts['custom_padding']['yes']['padding_mobile'] . ' !important;';
		}
	}

	if ( $bg_color || $padding ) {
		$column_style = esc_attr($bg_color . $padding);
	}
	else {
		$column_style = '';
	}

	wp_add_inline_style(
		'fw-shortcode-column',
		'#shortcode-'. $atts['id'] .' { '.
			$column_style .
		' } ' . 
		'@media only screen and (max-width: 991px) {' .
			 '#shortcode-'. $atts['id'] .' { '.
				$style_mobile .
			' } ' . 
		' } ' 
	);
}
add_action(
	'fw_ext_shortcodes_enqueue_static:column',
	'_action_odrin_shortcode_column_enqueue_dynamic_css'
);

}