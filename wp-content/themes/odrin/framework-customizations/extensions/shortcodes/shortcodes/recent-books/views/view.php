<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); } ?>

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

<div class="RecentBooks <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	
	<div class="recent-books-container">

	<?php 
	$number_products = $atts['number_products'] ? $atts['number_products'] : -1;
	$number_columns = $atts['number_columns'] ? $atts['number_columns'] : 4;

	if ( $atts['show_specific_category'] ) {

		$product_category = get_term_by('id', $atts['show_specific_category'], 'product_cat');

		if ( !empty( $product_category ) && ! is_wp_error( $product_category ) ) {	
			echo do_shortcode('[product_category per_page="' . $number_products . '" columns="' . $number_columns . '" category="' . $product_category->slug . '"]'); 
		}

	} else {
		echo do_shortcode('[recent_products per_page="' . $number_products . '" columns="' . $number_columns . '"]'); 
	}
	?>
		
	</div><!-- end recent-books-container -->
	
</div> <!-- end RecentBooks -->