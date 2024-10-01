<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} 

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
<div class="MailchimpNewsletter <?php echo esc_attr($section_extra_classes) ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>

	<?php if ( $atts['title'] ||$atts['subtitle'] ) ?>
	<div class="mailchimp-newsletter-header">
		<?php if ( !empty($atts['title']) ) : ?>
		<div class="SpecialHeading mb-40">
			<h3 class="special-title"><?php echo wp_kses_post($atts['title']); ?></h3>
			<?php if ( $atts['subtitle'] ) : ?>
				<div class="special-subtitle"><?php echo wp_kses_post($atts['subtitle']); ?></div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="mailchimp-newsletter-content-wrapper">
		<div class="mailchimp-newsletter-content mb-20"><?php echo wp_kses_post($atts['text_content']); ?></div>
		<form method="post" class="is-mailchimp-shortcode-subscribe">
			<fieldset>
				<input type="email" class="is-mailchimp-email" name="email" placeholder="<?php esc_attr_e('Your e-mail address', 'odrin'); ?>" value="">
				<button class="btn btn-icon is-signup-button" type="submit"><span><?php echo wp_kses_post($atts['button_text']); ?></span></button>
			</fieldset>
		</form>
		<div class="mailchimp-shortcode-message"></div>
	</div>

</div>