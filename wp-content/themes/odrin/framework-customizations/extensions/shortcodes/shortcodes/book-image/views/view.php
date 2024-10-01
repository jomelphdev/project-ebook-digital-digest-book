<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$custom_image = '';
$product_image = '';

$additional_classes = '';
$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

/**
 * @var array $atts
 */
if ( !isset($atts['book_image_type']['image_type_select'] ) ) {
	return;
}

// Custom Image
if ( $atts['book_image_type']['image_type_select'] == 'custom_image' ) {

	$custom_image = $atts['book_image_type']['custom_image'];
	$image_class = '';
	if ( !($custom_image['book_image'] ) ) {
		return;
	}
	$width  = ( is_numeric( $custom_image['width'] ) && ( $custom_image['width'] > 0 ) ) ? $custom_image['width'] : '';
	$height = ( is_numeric( $custom_image['height'] ) && ( $custom_image['height'] > 0 ) ) ? $custom_image['height'] : '';

	if ( ! empty( $width ) && ! empty( $height ) ) {
		$image = fw_resize( $custom_image['book_image']['attachment_id'], $width, $height, true );
	} else {
		$image = $custom_image['book_image']['url'];
	}

	$alt = get_post_meta($custom_image['book_image']['attachment_id'], '_wp_attachment_image_alt', true);

	$img_attributes = array(
		'src' => $image,
		'alt' => $alt ? $alt : $image
	);

	if(!empty($width)){
		$img_attributes['width'] = $width;
	}

	if(!empty($height)){
		$img_attributes['height'] = $height;
	}

// Product Image
} else if ( $atts['book_image_type']['image_type_select'] == 'product_image' ) {

	$product_image = $atts['book_image_type']['product_image'];
	if ( !($product_image['product'] ) ) {
		return;
	}
	$product_id = $product_image['product'];
	if ( function_exists('wc_get_product') ) {	
		$product = wc_get_product( $product_id );
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

if ($atts['background_image']) :
	$bg_classes = '';
	switch ($atts['layout']) {
		case 'layout_1':
		$bg_classes .= ' book-bg-type-1';
		$additional_classes .= ' text-right';
		break;
		case 'layout_2':
		$bg_classes .= ' book-bg-type-2';
		$additional_classes .= ' text-right';
		break;
		case 'layout_3':
		$bg_classes .= ' book-bg-type-3';
		$additional_classes .= ' text-left';
		break;
		case 'layout_4':
		$bg_classes .= ' book-bg-type-4';
		$additional_classes .= ' text-left';
		break;
		default:
		$bg_classes .= ' book-bg-type-1';
		$additional_classes .= ' text-left';
		break;
	}

	?>
	<div class="BookImageBackground <?php echo esc_attr($bg_classes); ?>">
		<div class="bg-image is-parallax" data-bg-image="<?php echo esc_url($atts['background_image']['url']);  ?>"></div>
	</div>
<?php endif; ?>

<div class="BookImage <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); echo esc_attr($additional_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?> >
	<?php
	if ( $custom_image ) {
		$image_class = '';
		if ( isset($custom_image['page_flip']) || $custom_image['page_flip_effect']['page_flip'] == 'yes' ) : 
			switch ($custom_image['page_flip_effect']['yes']['book_thickness']) {
				case 'none':
					$image_class = '';
					break;
				case 'thin':
					$image_class = 'has-edge has-edge-thin';
					break;
				case 'normal':
					$image_class = 'has-edge';
					break;
				case 'thick':
					$image_class = 'has-edge has-edge-thick';
					break;
				default:
					$image_class = 'has-edge';
					break;
			}
			?>
			<div class="book-image-wrapper">
				<div class="PageFlipBook">
		<?php endif;

		if ( empty( $custom_image['link'] ) ) :
			echo fw_html_tag('div', array(
				'class' => $image_class,
			), fw_html_tag('img',$img_attributes));
		else :
			echo fw_html_tag('a', array(
				'href' => $custom_image['link'],
				'target' => $custom_image['target'],
				'class' => $image_class,
			), fw_html_tag('img',$img_attributes));
		endif;
		
		if ( isset($custom_image['page_flip']) || $custom_image['page_flip_effect']['page_flip'] == 'yes' ) : ?>
				</div>
			</div>
		<?php endif;
	} else if ( $product_image ) : ?>
		<div class="book-image-wrapper SingleProductImage">
			<div class="PageFlipBook">
				<?php 
				if ( isset($product_image['book_thickness']) ) {
					switch ($product_image['book_thickness']) {
						case 'none':
						$book_class = '';
						break;
						case 'thin':
						$book_class = 'has-edge has-edge-thin';
						break;
						case 'normal':
						$book_class = 'has-edge';
						break;
						case 'thick':
						$book_class = 'has-edge has-edge-thick';
						break;
						default:
						$book_class = 'has-edge';
						break;
					}
				} else {
					$book_class = 'has-edge has-edge-thick';
				}
				?>
				<?php if ( odrin_have_rows('read_the_book_chapters', $product_id) && $product_image['show_read_book'] == 'yes' ) : ?>
					<?php $book_class .= ' is-page-flip'; ?>
					<a href="#" class="<?php echo esc_attr($book_class); ?>" data-post-id="<?php echo esc_attr($product_id); ?>">
						<?php 
						if ( odrin_get_field('read_the_book_text', $product_id) ) {
							$read_the_book_text = odrin_get_field('read_the_book_text', $product_id);
						} else {
							$read_the_book_text = esc_html__('Read the Book', 'odrin');
						}
						?>
						<div class="page-flip-book-ribbon"><span><?php echo wp_kses_post($read_the_book_text); ?></span></div>
						<img src="<?php echo get_the_post_thumbnail_url( $product_id, 'odrin_medium_soft' ); ?>" class="wp-post-image">
					</a>
				<?php else : ?>
				<a href="<?php echo esc_url(get_post_permalink( $product_id )); ?>" class="<?php echo esc_attr($book_class); ?>">
					<img src="<?php echo get_the_post_thumbnail_url( $product_id, 'odrin_medium_soft' ); ?>" class="wp-post-image">
				</a>
				<?php endif; ?>
				<?php if ( isset($product) && $product_image['show_price'] == 'yes' && $product ) : ?>
				<div class="single-product-price">
					<span class="price-text font-heading"><?php echo wp_kses_post($product->get_price_html()); ?></span>
				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</div><!-- end BookImage -->
