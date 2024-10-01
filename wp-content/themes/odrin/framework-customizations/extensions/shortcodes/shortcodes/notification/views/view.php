<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>

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

<div class="fw-alert fw-alert-<?php echo esc_attr($atts['type']); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<?php
	switch ( $atts['type'] ) {
		case 'success' :
			echo '<i class="icon-happy alert-icon"></i>';
			break;
		case 'info' :
			echo '<i class=" icon-lightbulb alert-icon"></i>';
			break;
		case 'warning' :
			echo '<i class="icon-flag alert-icon"></i>';
			break;
		case 'danger' :
			echo '<i class="icon-caution alert-icon"></i>';
			break;
	}	
	?>
	<div class="fw-alert-message">
		<?php echo wp_kses_post($atts['message']); ?>
	</div>
</div>