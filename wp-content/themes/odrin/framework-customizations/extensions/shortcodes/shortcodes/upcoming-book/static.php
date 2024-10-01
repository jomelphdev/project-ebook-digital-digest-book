<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/upcoming-book');

wp_enqueue_style(
	'fw-shortcode-upcoming-book',
	$uri . '/static/css/styles.css'
);

if (!function_exists('_action_odrin_shortcode_upcoming_book_enqueue_dynamic_css')) {

function _action_odrin_shortcode_upcoming_book_enqueue_dynamic_css($data) {
	$shortcode = 'upcoming-book';
	$atts = shortcode_parse_atts( $data['atts_string'] );
	$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);


	// atts
	if ( isset($atts['custom_styling_picker']) && $atts['custom_styling_picker']['custom_styling'] == 'yes' ) {
		$bg_color = '';
		$above_title_styling = '';
		$title_styling = '';
		$title_accent = '';
		$countdown_styling = '';
		$content_styling = '';
		$content_mobile_styling = '';

		if ( isset($atts['custom_styling_picker']['yes']['above_title_typography']['size']) ) {
			$above_title_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['above_title_typography']['size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['above_title_typography']['line-height']) ) {
			$above_title_styling .= 'line-height:' . $atts['custom_styling_picker']['yes']['above_title_typography']['line-height'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['above_title_typography']['letter-spacing']) ) {
			$above_title_styling .= 'letter-spacing:' . $atts['custom_styling_picker']['yes']['above_title_typography']['letter-spacing'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['above_title_typography']['color']) ) {
			$above_title_styling .= 'color:' . $atts['custom_styling_picker']['yes']['above_title_typography']['color'] . ';';
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
		if ( $atts['custom_styling_picker']['yes']['title_accent'] == 'no' ) {
			$title_accent = 'display: none;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['countdown_number_size']) ) {
			$countdown_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['countdown_number_size'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['padding']) ) {
			$content_styling = 'padding:' . $atts['custom_styling_picker']['yes']['padding'] . ';';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['padding_mobile']) ) {
			$content_mobile_styling = 'padding:' . $atts['custom_styling_picker']['yes']['padding_mobile'] . ';';
		}

		wp_add_inline_style(
			'fw-shortcode-upcoming-book',
			'#shortcode-'. $atts['id'] .' .upcoming-book-content .special-link { '.
				$above_title_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .ElementHeading .element-title { '.
				$title_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .ElementHeading:before { '.
				$title_accent .
			' } ' .
			'#shortcode-'. $atts['id'] .' .upcoming-book-content { '.
				$content_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .upcoming-book-release-date .countdown-item .countdown-number { '.
				$countdown_styling .
			' } ' .
			'@media only screen and (max-width: 768px) {' .
				'#shortcode-'. $atts['id'] .' .upcoming-book-content { '.
					$content_mobile_styling .
				' } ' .
			' } '
		);
	}

	if ( isset($atts['content_background_color']) && $atts['content_background_color'] != '' ) {
		$bg_color = 'background-color: ' .  $atts['content_background_color'] . ';';
	} else {
		$bg_color = 'background-color: transparent;';
	}

	if ( $bg_color ) {
		$section_style = esc_attr($bg_color);
	}
	else {
		$section_style = '';
	}

	wp_add_inline_style(
		'fw-shortcode-upcoming-book',
		'#shortcode-'. $atts['id'] .' .upcoming-book-content { '.
			$section_style .
		' } '
	);
}
add_action(
	'fw_ext_shortcodes_enqueue_static:upcoming_book',
	'_action_odrin_shortcode_upcoming_book_enqueue_dynamic_css'
);

}