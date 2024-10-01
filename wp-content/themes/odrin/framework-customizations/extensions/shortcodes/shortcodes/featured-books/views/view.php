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

<div class="FeaturedBooks <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	
	<div class="featured-books-container">

	<?php 
	$books_array = array_map('end', $atts['featured_books']);
	$books_string = join(', ', $books_array);

	$number_columns = $atts['number_columns'] ? $atts['number_columns'] : 4;

	echo do_shortcode('[products ids="' . $books_string . '" columns="' . $number_columns . '" orderby="post__in"]'); 
	?>
		
	</div><!-- end featured-books-container -->
	
</div> <!-- end FeaturedBooks -->