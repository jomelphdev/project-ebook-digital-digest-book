<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/box-icon');

wp_enqueue_style(
	'fw-shortcode-box-icon',
	$uri . '/static/css/styles.css'
);

if (!function_exists('_action_odrin_shortcode_box_icon_enqueue_dynamic_css')) {

function _action_odrin_shortcode_box_icon_enqueue_dynamic_css($data) {
	$shortcode = 'box-icon';
	$atts = shortcode_parse_atts( $data['atts_string'] );
	$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

	// atts
	if ( isset($atts['custom_styling_picker']) && $atts['custom_styling_picker']['custom_styling'] == 'yes' ) {
		$icon_styling = '';
		$title_styling = '';
		$content_styling = '';

		if ( isset($atts['custom_styling_picker']['yes']['icon_size']) ) {
			$icon_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['icon_size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['icon_color']) ) {
			$icon_styling .= 'color:' . $atts['custom_styling_picker']['yes']['icon_color'] . ';';
		}
		if ( isset($atts['custom_styling_picker']['yes']['title_typography']['size']) ) {
			$title_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['title_typography']['size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['title_typography']['line-height']) ) {
			$title_styling .= 'line-height:' . $atts['custom_styling_picker']['yes']['title_typography']['line-height'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['title_typography']['letter-spacing']) ) {
			$title_styling .= 'letter-spacing:' . $atts['custom_styling_picker']['yes']['title_typography']['letter-spacing'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['title_typography']['color']) ) {
			$title_styling .= 'color:' . $atts['custom_styling_picker']['yes']['title_typography']['color'] . ';';
		}
		if ( isset($atts['custom_styling_picker']['yes']['content_typography']['size']) ) {
			$content_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['content_typography']['size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['content_typography']['line-height']) ) {
			$content_styling .= 'line-height:' . $atts['custom_styling_picker']['yes']['content_typography']['line-height'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['content_typography']['letter-spacing']) ) {
			$content_styling .= 'letter-spacing:' . $atts['custom_styling_picker']['yes']['content_typography']['letter-spacing'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['content_typography']['color']) ) {
			$content_styling .= 'color:' . $atts['custom_styling_picker']['yes']['content_typography']['color'] . ';';
		}

		wp_add_inline_style(
			'fw-shortcode-box-icon',
			'#shortcode-'. $atts['id'] .' .box-icon-header-wrapper i { '.
				$icon_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .box-icon-header-wrapper .box-icon-title { '.
				$title_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .box-icon-content { '.
				$content_styling .
			' } '
		);
	}
}

add_action(
	'fw_ext_shortcodes_enqueue_static:box_icon',
	'_action_odrin_shortcode_box_icon_enqueue_dynamic_css'
);

}