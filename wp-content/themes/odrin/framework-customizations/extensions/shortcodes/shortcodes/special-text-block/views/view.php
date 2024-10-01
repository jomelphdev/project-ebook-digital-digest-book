<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); } ?>

<?php 
$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';

$styles = '';
$atts['type'] == 'color' ? $styles .= ' special-text-block-color' : '';
$atts['image'] ? $styles .= ' special-text-block-has-image' : '';

$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

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

<div class="SpecialTextBlock<?php echo esc_attr($styles); ?> pos-r <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	
	<?php if (!empty($atts['title'])) : ?>
	<div class="SpecialHeading fw-heading mb-40">
		<h2 class="special-title<?php echo esc_attr($title_classes); ?>"><?php echo wp_kses_post($atts['title']); ?></h2>
		<?php if (!empty($atts['subtitle'])) : ?>
		<div class="special-subtitle"><?php echo wp_kses_post($atts['subtitle']); ?></div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php if ($atts['image']) : ?>
	<div class="special-text-block-image">		
		<div class="bg-image" data-bg-image="<?php echo esc_url($atts['image']['url']);  ?>"></div>
	</div>
	<?php endif; ?>
	<?php if ($atts['text_content']) : ?>
		<?php if ( $atts['type'] == 'color' ) : ?>
		<div class="special-text-block-content section-light font-subheading">
		<?php else : ?>
		<div class="special-text-block-content font-subheading">
		<?php endif; ?>
		<?php echo do_shortcode( $atts['text_content'] ); ?>
	</div>
	<?php endif; ?>
	
</div> <!-- end SpecialTextBlock -->