<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php 
$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';

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

<div id="shortcode-<?php echo esc_attr($atts['id']); ?>" class="ContentSliderWrapper <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<?php 
		$items_count = count($atts['content_slider']);
	?>

	<?php if ( $atts['images_lightbox'] == 'true' ) : ?>
	<div class="content-slider-images owl-carousel is-lightbox-gallery">
	<?php else : ?>
	<div class="content-slider-images owl-carousel">
	<?php endif; ?>

	<?php foreach ($atts['content_slider'] as $key => $value) : ?>
		<?php if ( $value['item_image'] ) : ?>
			<?php if ( $atts['images_lightbox'] == 'true' ) : ?>
			<a href="<?php echo esc_url($value['item_image']['url']);  ?>" class="content-slider-image">
				<?php if ( $atts['equal_height'] == 'true' ) : ?>
					<div class="bg-image" data-bg-image="<?php echo esc_url($value['item_image']['url']);  ?>"></div>
				<?php else : ?>
					<img src="<?php echo esc_url($value['item_image']['url']);  ?>">
				<?php endif; ?>
			</a>
			<?php else : ?>
			<div class="content-slider-image">
				<?php if ( $atts['equal_height'] == 'true' ) : ?>
					<div class="bg-image" data-bg-image="<?php echo esc_url($value['item_image']['url']);  ?>"></div>
				<?php else : ?>
					<img src="<?php echo esc_url($value['item_image']['url']);  ?>">
				<?php endif; ?>
			</div>
			<?php endif; ?>
		<?php else : ?>
			<div class="content-slider-image">
				<div class="bg-color"></div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>

	</div>
	<div class="content-slider owl-carousel" data-owl-autoheight="<?php echo esc_attr($atts['auto_height']); ?>">

	<?php foreach ($atts['content_slider'] as $key => $value) : ?>
		<div class="content-slider-content-wrapper">
			<?php if ( !empty($value['item_title']) ) : ?>
				<div class="SpecialHeading">
					<h2 class="special-title-small<?php echo esc_attr($title_classes); ?> font-subheading"><?php echo wp_kses_post($value['item_title']); ?></h2>
				</div>
			<?php endif; 
			if ( !empty($value['item_subtitle']) ) : ?>
				<div class="special-subtitle-type-2 mb-20"><?php echo wp_kses_post($value['item_subtitle']); ?></div>
			<?php endif; ?>
			<?php if ( !empty($value['item_content']) ) : ?>
			<div class="content-slider-content">
				<?php echo do_shortcode($value['item_content']); ?>
			</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>

	</div> <!-- end owl-carousel -->
		
</div> <!-- end ContentSlider -->