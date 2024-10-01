<?php if (!defined('FW')) die( 'Forbidden' ); ?>

<?php 
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

<blockquote id="shortcode-<?php echo esc_attr($atts['id']); ?>" class="<?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<i class="blockquote-icon"></i>
	<i class="blockquote-icon"></i>
	<div class="blockquote-content font-subheading">
		<p><?php echo wp_kses_post($atts['content']) ?></p>
	</div>
	<?php if ( $atts['cite'] ) : ?>
	<footer><cite><?php echo wp_kses_post($atts['cite']) ?></cite></footer>
	<?php endif; ?>
</blockquote>