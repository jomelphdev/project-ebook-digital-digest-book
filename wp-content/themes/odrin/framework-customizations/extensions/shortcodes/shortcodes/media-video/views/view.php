<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

/**
 * @var array $atts
 */

global $wp_embed;

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '300';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '200';
$iframe = $wp_embed->run_shortcode( '[embed  width="' . $width . '" height="' . $height . '"]' . trim( $atts['url'] ) . '[/embed]' );

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
<div class="video-wrapper shortcode-container <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<?php 
		$iframe = wp_oembed_get(trim( $atts['url'] ), array( 'width' => $width, 'height' => $height ));
	?>
	<?php echo do_shortcode( $iframe ); ?>
</div>
