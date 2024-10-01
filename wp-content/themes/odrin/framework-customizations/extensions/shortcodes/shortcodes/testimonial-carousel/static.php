<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/testimonial-carousel');

wp_enqueue_script(
	'fw-shortcode-testimonial-carousel',
	$uri . '/static/js/scripts.js',
	false,
	true
);
wp_enqueue_style(
	'fw-shortcode-testimonial-carousel',
	$uri . '/static/css/styles.css'
);

if (!function_exists('_action_odrin_shortcode_testimonial_carousel_enqueue_dynamic_css')) {

function _action_odrin_shortcode_testimonial_carousel_enqueue_dynamic_css($data) {
	$shortcode = 'testimonial-carousel';
	$atts = shortcode_parse_atts( $data['atts_string'] );
	$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

	// atts
	if ( isset($atts['custom_styling_picker']) && $atts['custom_styling_picker']['custom_styling'] == 'yes' ) {
		$name_styling = '';
		$company_styling = '';
		$testimonial_text_styling = '';
		$element_styling = '';
		$content_styling = '';
		$content_mobile_styling = '';

		if ( isset($atts['custom_styling_picker']['yes']['name_typography']['size']) ) {
			$name_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['name_typography']['size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['name_typography']['line-height']) ) {
			$name_styling .= 'line-height:' . $atts['custom_styling_picker']['yes']['name_typography']['line-height'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['name_typography']['letter-spacing']) ) {
			$name_styling .= 'letter-spacing:' . $atts['custom_styling_picker']['yes']['name_typography']['letter-spacing'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['name_typography']['color']) ) {
			$name_styling .= 'color:' . $atts['custom_styling_picker']['yes']['name_typography']['color'] . ';';
		}
		if ( isset($atts['custom_styling_picker']['yes']['company_typography']['size']) ) {
			$company_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['company_typography']['size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['company_typography']['line-height']) ) {
			$company_styling .= 'line-height:' . $atts['custom_styling_picker']['yes']['company_typography']['line-height'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['company_typography']['letter-spacing']) ) {
			$company_styling .= 'letter-spacing:' . $atts['custom_styling_picker']['yes']['company_typography']['letter-spacing'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['company_typography']['color']) ) {
			$company_styling .= 'color:' . $atts['custom_styling_picker']['yes']['company_typography']['color'] . ';';
		}
		if ( isset($atts['custom_styling_picker']['yes']['content_typography']['size']) ) {
			$content_typography = 'font-size:' . $atts['custom_styling_picker']['yes']['content_typography']['size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['content_typography']['line-height']) ) {
			$content_typography .= 'line-height:' . $atts['custom_styling_picker']['yes']['content_typography']['line-height'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['content_typography']['letter-spacing']) ) {
			$content_typography .= 'letter-spacing:' . $atts['custom_styling_picker']['yes']['content_typography']['letter-spacing'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['content_typography']['color']) ) {
			$content_typography .= 'color:' . $atts['custom_styling_picker']['yes']['content_typography']['color'] . ';';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['padding']) ) {
			$element_styling = 'padding:' . $atts['custom_styling_picker']['yes']['padding'] . ';';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['padding']) ) {
			$content_styling = 'padding:' . $atts['custom_styling_picker']['yes']['padding'] . ';';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['padding_mobile']) ) {
			$content_mobile_styling = 'padding:' . $atts['custom_styling_picker']['yes']['padding_mobile'] . ';';
		}

		wp_add_inline_style(
			'fw-shortcode-testimonial-carousel',
			'#shortcode-'. $atts['id'] .' .testimonial-meta .testimonial-author { '.
				$name_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .testimonial-meta .testimonial-company { '.
				$company_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .testimonial-text-wrapper .testimonial-text { '.
				$content_typography .
			' } ' .
			'#shortcode-'. $atts['id'] .' .testimonial-text-wrapper { '.
				$content_styling .
			' } ' .
			'@media only screen and (max-width: 768px) {' .
				'#shortcode-'. $atts['id'] .' .testimonial-text-wrapper { '.
					$content_mobile_styling .
				' } ' .
			' } '
		);
	}

}
add_action(
	'fw_ext_shortcodes_enqueue_static:testimonial_carousel',
	'_action_odrin_shortcode_testimonial_carousel_enqueue_dynamic_css'
);

}
