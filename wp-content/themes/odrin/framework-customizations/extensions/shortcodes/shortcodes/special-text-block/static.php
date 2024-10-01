<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/special-text-block');

wp_enqueue_style(
	'fw-shortcode-special-text-block',
	$uri . '/static/css/styles.css'
);

if (!function_exists('_action_odrin_shortcode_special_text_block_enqueue_dynamic_css')) {

function _action_odrin_shortcode_special_text_block_enqueue_dynamic_css($data) {
    $shortcode = 'special-text-block';
    $atts = shortcode_parse_atts( $data['atts_string'] );
    $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

    // atts
	$image_position = '';
	if ( !empty( $atts['vertical_position'] ) && !empty( $atts['horizontal_position'] ) ) {
		$image_position = 'background-position: ' . $atts['vertical_position'] . ' ' . $atts['horizontal_position'] . ';';
	}

	if ( isset($atts['custom_styling_picker']) && $atts['custom_styling_picker']['custom_styling'] == 'yes' ) {

		$first_letter_styling = '';
		$title_styling = '';
		$subtitle_styling = '';

		if ( !empty($atts['custom_styling_picker']['yes']['first_letter_color']) ) {
			$first_letter_styling = 'color:' . $atts['custom_styling_picker']['yes']['first_letter_color'] . ';';
			$first_letter_styling .= 'border: 1px solid ' . $atts['custom_styling_picker']['yes']['first_letter_color'] . ';';
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
		if ( isset($atts['custom_styling_picker']['yes']['subtitle_typography']['size']) ) {
			$subtitle_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['subtitle_typography']['size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['subtitle_typography']['line-height']) ) {
			$subtitle_styling .= 'line-height:' . $atts['custom_styling_picker']['yes']['subtitle_typography']['line-height'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['subtitle_typography']['letter-spacing']) ) {
			$subtitle_styling .= 'letter-spacing:' . $atts['custom_styling_picker']['yes']['subtitle_typography']['letter-spacing'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['subtitle_typography']['color']) ) {
			$subtitle_styling .= 'color:' . $atts['custom_styling_picker']['yes']['subtitle_typography']['color'] . ';';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['subtitle_border']) && $atts['custom_styling_picker']['yes']['subtitle_border'] != 'none' ) {
			if ( $atts['custom_styling_picker']['yes']['subtitle_border_color'] ) {
				$subtitle_styling .= 'border-bottom: 3px ' . $atts['custom_styling_picker']['yes']['subtitle_border'] . $atts['custom_styling_picker']['yes']['subtitle_border_color'] . ';';
			} else {
				$subtitle_styling .= 'border-bottom: 3px ' . $atts['custom_styling_picker']['yes']['subtitle_border'] . ' inherit;';
			}
		}

		wp_add_inline_style(
			'fw-shortcode-special-text-block',
			'#shortcode-'. $atts['id'] .' .special-title.special-heading-letter::first-letter { '.
				$first_letter_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .special-title { '.
				$title_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .special-subtitle { '.
				$subtitle_styling .
			' } '
		);
		
	}

	wp_add_inline_style(
		'fw-shortcode-special-text-block',
		'#shortcode-'. $atts['id'] .' .bg-image { '.
			$image_position .
		' } '
		);
}
add_action(
    'fw_ext_shortcodes_enqueue_static:special_text_block',
    '_action_odrin_shortcode_special_text_block_enqueue_dynamic_css'
);

}