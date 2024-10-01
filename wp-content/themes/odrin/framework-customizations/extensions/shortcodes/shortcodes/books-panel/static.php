<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/books-panel');

wp_enqueue_style(
	'fw-shortcode-books-panel',
	$uri . '/static/css/styles.css'
);

if (!function_exists('_action_odrin_shortcode_books_panel_enqueue_dynamic_css')) {

function _action_odrin_shortcode_books_panel_enqueue_dynamic_css($data) {
    $shortcode = 'books-panel';
    $atts = shortcode_parse_atts( $data['atts_string'] );
    $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

    // atts
	if ( isset($atts['custom_styling_picker']) && $atts['custom_styling_picker']['custom_styling'] == 'yes' ) {
		$book_thumb_styling = '';
		$title_styling = '';
		$column_styling = '';
		$row_styling = '';

		if ( isset($atts['custom_styling_picker']['yes']['column_spacing']) ) {
			$column_styling = 'padding: 0' . $atts['custom_styling_picker']['yes']['column_spacing'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['row_spacing']) ) {
			$row_styling = 'margin-bottom:' . $atts['custom_styling_picker']['yes']['row_spacing'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['book_thumb_typography']['size']) ) {
			$book_thumb_styling = 'font-size:' . $atts['custom_styling_picker']['yes']['book_thumb_typography']['size'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['book_thumb_typography']['line-height']) ) {
			$book_thumb_styling .= 'line-height:' . $atts['custom_styling_picker']['yes']['book_thumb_typography']['line-height'] . 'px;';
		}
		if ( isset($atts['custom_styling_picker']['yes']['book_thumb_typography']['letter-spacing']) ) {
			$book_thumb_styling .= 'letter-spacing:' . $atts['custom_styling_picker']['yes']['book_thumb_typography']['letter-spacing'] . 'px;';
		}
		if ( !empty($atts['custom_styling_picker']['yes']['book_thumb_typography']['color']) ) {
			$book_thumb_styling .= 'color:' . $atts['custom_styling_picker']['yes']['book_thumb_typography']['color'] . ';';
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

		wp_add_inline_style(
			'fw-shortcode-books-panel',
			'#shortcode-'. $atts['id'] .' .books-panel-item { '.
				$column_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .books-panel-item-wrap { '.
				$row_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .book-thumb-title { '.
				$book_thumb_styling .
			' } ' .
			'#shortcode-'. $atts['id'] .' .book-panel-info-title { '.
				$title_styling .
			' } '
		);
	}
}
add_action(
    'fw_ext_shortcodes_enqueue_static:books_panel',
    '_action_odrin_shortcode_books_panel_enqueue_dynamic_css'
);

}