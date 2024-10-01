<?php if (!defined('FW')) die( 'Forbidden' ); ?>

<?php 

$tabs_style = (isset($atts['tabs_style']) && $atts['tabs_style'] == 'vertical') ? 'tabs-vertical' : 'tabs-justified tabs-horizontal';
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

<?php $tabs_id = uniqid('fw-tabs-'); ?>
<?php
/*
 * the `.fw-tabs-container` div also supports
 * a `tabs-justified` class, that strethes the tabs
 * to the width of the whole container
 */
?>
<div class="fw-tabs-container <?php echo esc_attr($tabs_style); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="<?php echo esc_attr($tabs_id); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<div class="fw-tabs">
		<ul>
			<?php foreach ($atts['tabs'] as $key => $tab) : ?>
			<li>
				<a class="font-heading element-title" href="#<?php echo esc_attr($tabs_id) . '-' . (esc_attr($key) + 1); ?>">
					<i class="<?php echo esc_attr($tab['icon']); ?> tabs-icon"></i>
					<span><?php echo do_shortcode( $tab['tab_title'] ); ?></span>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php foreach ( $atts['tabs'] as $key => $tab ) : ?>
		<div class="fw-tab-content" id="<?php echo esc_attr($tabs_id) . '-' . (esc_attr($key) + 1); ?>">
			<?php echo do_shortcode( $tab['tab_content'] ); ?>
		</div>
	<?php endforeach; ?>
</div>