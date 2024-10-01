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

<div class="BoxIcon box-icon-<?php echo esc_attr($atts['box_style']); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<div class="box-icon-header-wrapper pos-r">
		<?php if ( $atts['box_style'] == 'vertical' ) : ?>
			<?php if ( $atts['box_title'] ) : ?>
				<h4 class="box-icon-title"><?php echo wp_kses_post($atts['box_title']); ?></h4>
			<?php endif; ?>
			<?php if ( $atts['icon'] ) : ?>
				<i class="<?php echo esc_attr($atts['icon']); ?>"></i>
			<?php endif; ?>
	</div>
		<div class="box-icon-content">
		<?php else : // not $atts['box_style'] == 'vertical'?>
			<?php if ( $atts['icon'] ) : ?>
				<i class="<?php echo esc_attr($atts['icon']); ?>"></i>
			<?php endif; ?>
	</div>
	<div class="box-icon-content">
			<?php if ( $atts['box_title'] ) : ?>
				<h4 class="box-icon-title"><?php echo wp_kses_post($atts['box_title']); ?></h4>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( $atts['box_content'] ) : ?>
		<div class="box-icon-text"><?php echo wp_kses_post($atts['box_content'])?></div>
		<?php endif; ?>
	</div>
</div><!-- end BoxIcon -->
