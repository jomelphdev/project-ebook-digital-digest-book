<?php if (!defined('FW')) die( 'Forbidden' ); ?>

<?php 
$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

$btn_class = '';
$btn_atts = '';

/**
 * @var array $atts
 */
if ( !isset($atts['button_type']['button_type_select'] ) ) {
	return;
}


if ( $atts['color'] ) {

	if ( $atts['color'] ) {
		$btn_class .= 'btn-' . $atts['color'];
	}
	
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

<?php 

// Normal Button
if ( $atts['button_type']['button_type_select'] == 'normal_button' ) : ?>
	<?php $btn_atts = $atts['button_type']['normal_button']; ?>
	<a href="<?php echo esc_url($btn_atts['link']) ?>" target="<?php echo esc_attr($btn_atts['target']) ?>" class="shortcode-button btn <?php echo esc_attr($btn_class); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
		<span><?php echo wp_kses_post($atts['label']); ?></span>
	</a>
<?php  

// Product Button
elseif ( $atts['button_type']['button_type_select'] == 'product_button' ) : ?>
	<?php 
	$btn_atts = $atts['button_type']['product_button'];
	if ( !($btn_atts['product'] ) ) {
		return;
	}
	$product_id = $btn_atts['product'];
	switch ($btn_atts['product_button_type']) {
		case 'view_book': ?>
		<a href="<?php echo esc_url(get_post_permalink($product_id)) ?>" class="shortcode-button btn <?php echo esc_attr($btn_class); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
			<span><?php echo wp_kses_post($atts['label']); ?></span>
		</a>
		<?php break;
		case 'add_to_cart': 
		$button_link = do_shortcode('[add_to_cart_url id="'. $product_id .'"]'); 
		if ( $button_link ) : ?>
		<a href="<?php echo esc_url($button_link) ?>" class="shortcode-button btn <?php echo esc_attr($btn_class); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
			<span><?php echo wp_kses_post($atts['label']); ?></span>
		</a>
		<?php endif; ?>
		<?php break;
		case 'read_the_book': ?>
		<?php if ( odrin_have_rows('read_the_book_chapters',  $product_id) ) : ?>
		<button type="button" class="shortcode-button btn is-page-flip <?php echo esc_attr($btn_class); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" data-post-id="<?php echo esc_attr($product_id); ?>"><i class="icon-book-open"></i><span><?php echo wp_kses_post($atts['label']); ?></span></button>
		<?php endif; ?>
		<?php break;
		default:
		break;
	}
endif;
?>

