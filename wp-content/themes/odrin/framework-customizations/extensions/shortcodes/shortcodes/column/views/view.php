<?php if (!defined('FW')) die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');


if ( ( $atts['text_position'] ) ) {
	$class .= ' text-' . $atts['text_position'];
}

$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';
?>
<div id="shortcode-<?php echo esc_attr($atts['id']); ?>" class="<?php echo esc_attr($class) . ' ' . esc_attr($mobile_classes); ?>" >
	<?php echo do_shortcode($content); ?>
</div>
