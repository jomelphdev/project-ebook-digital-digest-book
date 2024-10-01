<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/content-slider');

wp_enqueue_script(
	'fw-shortcode-content-slider',
	$uri . '/static/js/scripts.js',
	false,
	true
);
wp_enqueue_style(
	'fw-shortcode-content-slider',
	$uri . '/static/css/styles.css'
);

if (!function_exists('_action_odrin_shortcode_content_slider_enqueue_dynamic_css')) {

function _action_odrin_shortcode_content_slider_enqueue_dynamic_css($data) {
    $shortcode = 'content-slider';
    $atts = shortcode_parse_atts( $data['atts_string'] );
    $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

    // atts
	if ( isset($atts['custom_styling_picker']) && $atts['custom_styling_picker']['custom_styling'] == 'yes' ) {

		$first_letter_styling = '';
		$title_styling = '';
		$subtitle_styling = '';
		$subtitle_accent = '';
		$content_styling = '';
		$content_mobile_styling = '';

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
		if ( $atts['custom_styling_picker']['yes']['subtitle_accent'] == 'no' ) {
			$subtitle_styling .= 'padding-left: 0px;';
			$subtitle_accent = 'display: none;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['subtitle_border']) && $atts['custom_styling_picker']['yes']['subtitle_border'] != 'none' ) {
			if ( $atts['custom_styling_picker']['yes']['subtitle_border_color'] ) {
				$subtitle_styling .= 'border-bottom: 3px ' . $atts['custom_styling_picker']['yes']['subtitle_border'] . $atts['custom_styling_picker']['yes']['subtitle_border_color'] . ';';
			} else {
				$subtitle_styling .= 'border-bottom: 3px ' . $atts['custom_styling_picker']['yes']['subtitle_border'] . ' inherit;';
			}
		}
		if ( !empty($atts['custom_styling_picker']['yes']['padding']) ) {
			$content_styling = 'padding:' . $atts['custom_styling_picker']['yes']['padding'] . ';';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['padding_mobile']) ) {
			$content_mobile_styling = 'padding:' . $atts['custom_styling_picker']['yes']['padding_mobile'] . ';';
		}

		wp_add_inline_style(
			'fw-shortcode-content-slider',
			'#shortcode-'. $atts['id'] .' .special-title-small.special-heading-letter::first-letter { '.
				$first_letter_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .special-title-small { '.
				$title_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .special-subtitle-type-2:before { '.
				$subtitle_accent .
			' } ' .
			'#shortcode-'. $atts['id'] .' .special-subtitle-type-2 { '.
				$subtitle_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .content-slider .content-slider-content { '.
				$content_styling .
			' } ' .
			'@media only screen and (max-width: 768px) and (min-width: 481px) {' .
				'#shortcode-'. $atts['id'] .' .content-slider .content-slider-content { '.
					$content_mobile_styling .
				' } ' . 
			' } '
		);
	}

}
add_action(
    'fw_ext_shortcodes_enqueue_static:content_slider',
    '_action_odrin_shortcode_content_slider_enqueue_dynamic_css'
);

}
