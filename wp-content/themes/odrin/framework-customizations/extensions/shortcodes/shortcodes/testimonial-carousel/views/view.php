<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php 
$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

$content_alignment = isset($atts['content_alignment']) ? 'text-' . $atts['content_alignment'] : 'text-center';

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

<div class="TestimonialCarousel <?php echo esc_attr($content_alignment); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<?php 
		$client_count = count($atts['testimonial_carousel']);
		$slide_count = 0;
	?>
	<?php if ( $client_count == 1 ) : ?>
		<?php $value = $atts['testimonial_carousel'][0]; ?>
	<?php else : ?>
		<div class="testimonial-carousel owl-carousel" data-owl-autoheight="<?php echo esc_attr($atts['auto_height']); ?>">
	<?php endif; ?>
		<?php foreach ($atts['testimonial_carousel'] as $key => $value) : ?>
			<?php $slide_count++; ?>
			<div class="Testimonial" data-dot="<span><?php echo sprintf("%02d", esc_attr($slide_count)); ?></span>">
				<div class="testimonial-meta">
					<?php if ( !empty($value['testimonial_author']) ) : ?>
						<div class="testimonial-author font-heading">
							<?php echo wp_kses_post($value['testimonial_author']); ?>
						</div>
					<?php endif; 
					if ( !empty($value['testimonial_company']) ) {
						if ( !empty($value['testimonial_link']) ) : ?>
						<a href="<?php echo esc_url($value['testimonial_link']) ?>" class="testimonial-company"><?php echo wp_kses_post($value['testimonial_company']); ?></a>
						<?php else : ?>
							<div class="testimonial-company"><?php echo wp_kses_post($value['testimonial_company']); ?></div>
						<?php endif; ?>
					<?php } ?>
				</div>
				<div class="testimonial-text-wrapper">
					<div class="testimonial-text font-subheading">
						<p><?php echo wp_kses_post($value['testimonial_text']); ?></p>
					</div>
				</div>
			</div> <!-- end Testimonial -->
		<?php endforeach; ?>
		<?php if ( $client_count != 1 ) : ?>
		</div> <!-- end owl-carousel -->
		<?php endif; ?>
		
</div> <!-- end TestimonialCarousel -->