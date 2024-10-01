<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/special-heading');

wp_enqueue_style(
	'fw-shortcode-special-heading',
	$uri . '/static/css/styles.css'
);

if (!function_exists('_action_odrin_shortcode_special_heading_enqueue_dynamic_css')) {

	function _action_odrin_shortcode_special_heading_enqueue_dynamic_css($data) {
		$shortcode = 'special-heading';
		$atts = shortcode_parse_atts( $data['atts_string'] );
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		// atts
		$first_letter_color = '';
		$first_letter_border_color = '';
		$title_styling = '';
		$subtitle_styling = '';
		if ( $atts['heading_color_picker']['heading_color'] == 'yes' ) {

			if ( ! empty( $atts['heading_color_picker']['yes']['first_letter_color'] ) ) {
				$first_letter_color = 'color:' . $atts['heading_color_picker']['yes']['first_letter_color'] . ';';
				$first_letter_border_color = 'border: 1px solid ' . $atts['heading_color_picker']['yes']['first_letter_color'] . ';';
			}
			if ( isset($atts['heading_color_picker']['yes']['title_typography']['size']) ) {
				$title_styling = 'font-size:' . $atts['heading_color_picker']['yes']['title_typography']['size'] . 'px;';
			}
			if ( isset($atts['heading_color_picker']['yes']['title_typography']['line-height']) ) {
				$title_styling .= 'line-height:' . $atts['heading_color_picker']['yes']['title_typography']['line-height'] . 'px;';
			}
			if ( isset($atts['heading_color_picker']['yes']['title_typography']['letter-spacing']) ) {
				$title_styling .= 'letter-spacing:' . $atts['heading_color_picker']['yes']['title_typography']['letter-spacing'] . 'px;';
			}
			if ( ! empty( $atts['heading_color_picker']['yes']['title_color'] ) ) {
				$title_styling .= 'color:' . $atts['heading_color_picker']['yes']['title_color'] . '; ';
			}
			if ( isset($atts['heading_color_picker']['yes']['subtitle_typography']['size']) ) {
				$subtitle_styling = 'font-size:' . $atts['heading_color_picker']['yes']['subtitle_typography']['size'] . 'px;';
			}
			if ( isset($atts['heading_color_picker']['yes']['subtitle_typography']['line-height']) ) {
				$subtitle_styling .= 'line-height:' . $atts['heading_color_picker']['yes']['subtitle_typography']['line-height'] . 'px;';
			}
			if ( isset($atts['heading_color_picker']['yes']['subtitle_typography']['letter-spacing']) ) {
				$subtitle_styling .= 'letter-spacing:' . $atts['heading_color_picker']['yes']['subtitle_typography']['letter-spacing'] . 'px;';
			}
			if ( ! empty( $atts['heading_color_picker']['yes']['subtitle_color'] ) ) {
				$subtitle_styling .= 'color:' . $atts['heading_color_picker']['yes']['subtitle_color'] . '; ';
			}
			if ( !empty($atts['heading_color_picker']['yes']['subtitle_border']) && $atts['heading_color_picker']['yes']['subtitle_border'] != 'none' ) {
				if ( $atts['heading_color_picker']['yes']['subtitle_border_color'] ) {
					$subtitle_styling .= 'border-bottom: 3px ' . $atts['heading_color_picker']['yes']['subtitle_border'] . $atts['heading_color_picker']['yes']['subtitle_border_color'] . ';';
				} else {
					$subtitle_styling .= 'border-bottom: 3px ' . $atts['heading_color_picker']['yes']['subtitle_border'] . ' inherit;';
				}
			} else {
				$subtitle_styling .= 'border-bottom: none;';
			}

			wp_add_inline_style(
				'fw-shortcode-special-heading',
				'#shortcode-'. $atts['id'] .' .special-title.special-heading-letter::first-letter { '.
					$first_letter_color . $first_letter_border_color .
				' } ' .
				'#shortcode-'. $atts['id'] .' .special-title { '.
					$title_styling .
				' } ' .
				'#shortcode-'. $atts['id'] .' .special-subtitle { '.
					$subtitle_styling .
				' } '
			);
			
		}

	}
}
add_action(
	'fw_ext_shortcodes_enqueue_static:special_heading',
	'_action_odrin_shortcode_special_heading_enqueue_dynamic_css'
);