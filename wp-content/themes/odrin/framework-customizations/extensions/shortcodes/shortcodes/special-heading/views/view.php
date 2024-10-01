<?php if (!defined('FW')) die( 'Forbidden' );

$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

$section_extra_classes  = '';

if ( ( $atts['position'] ) ) {
	$section_extra_classes .= ' text-' . $atts['position'];
}

// WOW Animation
$wow_classes = '';
$wow_data = '';

if ( isset($atts['animation_on_scroll']) && $atts['animation_on_scroll']['animation_enable'] == 'yes') {
	$wow_classes = 'is-wow ' . $atts['animation_on_scroll']['yes']['animation_type'];

	if ( isset($atts['animation_on_scroll']['yes']['animation_delay']) ) {
		$wow_data =  'data-wow-delay="' . ($atts['animation_on_scroll']['yes']['animation_delay'] / 1000) . 's"';
	}
	
}
?>
<div class="SpecialHeading fw-heading <?php echo esc_attr($section_extra_classes) ?> mt-20 mb-60 <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<?php if ( odrin_get_option('special_heading_letter') ) : ?>
		<?php $heading = "<{$atts['heading']} class=\"special-title special-heading-letter\">{$atts['title']}</{$atts['heading']}>"; ?>
	<?php else : ?>
		<?php $heading = "<{$atts['heading']} class=\"special-title\">{$atts['title']}</{$atts['heading']}>"; ?>
	<?php endif; ?>
	<?php echo wp_kses_post(do_shortcode($heading)); ?>
	<?php if (!empty($atts['subtitle'])) : ?>
	<div class="special-subtitle"><?php echo wp_kses_post($atts['subtitle']); ?></div>
	<?php endif; ?>
</div>