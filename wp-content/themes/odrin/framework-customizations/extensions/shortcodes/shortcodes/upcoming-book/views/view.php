<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

$content_alignment = isset($atts['content_alignment']) ? 'text-' . $atts['content_alignment'] : 'text-center';
$show_countdown = $atts['show_countdown'];
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

<div id="shortcode-<?php echo esc_attr($atts['id']); ?>" class="UpcomingBookWrapper pos-r <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" <?php echo wp_kses_post($wow_data); ?>>


	<?php if ( $atts['book_image'] && (!isset($atts['book_image_type']['custom_image']['book_image']) && !isset($atts['book_image_type']['product_image']['product'])) ) { ?>

		<div class="upcoming-book-image">
			<img src="<?php echo esc_url($atts['book_image']['url']); ?>">

	<?php 
	// Custom Image
	} else if ( $atts['book_image_type']['image_type_select'] == 'custom_image' ) {
		$custom_image = $atts['book_image_type']['custom_image'];
		$image_class = '';
		if ( !($custom_image['book_image'] ) ) {
			return;
		}
		$image = $custom_image['book_image']['url'];
		$alt = get_post_meta($custom_image['book_image']['attachment_id'], '_wp_attachment_image_alt', true);
		$img_attributes = array(
			'src' => $image,
			'alt' => $alt ? $alt : $image
		); ?>
		<div class="upcoming-book-image">
		<?php	
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
		if ( empty( $custom_image['link'] ) ) {
			echo fw_html_tag('div', array(
				'class' => $image_class,
			), fw_html_tag('img',$img_attributes));
		} else {
			echo fw_html_tag('a', array(
				'href' => $custom_image['link'],
				'target' => $custom_image['target'],
				'class' => $image_class,
			), fw_html_tag('img',$img_attributes));
		}

		if ( isset($custom_image['page_flip']) || $custom_image['page_flip_effect']['page_flip'] == 'yes' ) : ?>
				</div>
			</div>
		<?php endif;

	// Product Image
	} else if ( $atts['book_image_type']['image_type_select'] == 'product_image' ) {

		$product_image = $atts['book_image_type']['product_image'];
		if ( !($product_image['product'] ) ) {
			return;
		}
		$product_id = $product_image['product'];
		if ( function_exists('wc_get_product') ) {	
			$product = wc_get_product( $product_id );
		} ?>
		<div class="upcoming-book-image upcoming-product-image">
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
					<?php if ( odrin_have_rows('read_the_book_chapters',  $product_id) && $product_image['show_read_book'] == 'yes' ) : ?>
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
					<a href="<?php echo esc_url(get_post_permalink( $product_id )); ?>" class="single-has-edge has-edge has-edge-thick">
						<img src="<?php echo get_the_post_thumbnail_url( $product_id, 'odrin_medium_soft' ); ?>" class="wp-post-image">
					</a>
					<?php endif; ?>
					<?php if ( isset($product) && $product_image['show_price'] == 'yes' && $product->get_price() ) : ?>
					<div class="single-product-price">
						<span class="price-text font-heading"><?php echo wp_kses_post($product->get_price_html()); ?></span>
					</div>
					<?php endif; ?>
				</div>
			</div>
	<?php 
	} 
	?>
	</div> <!-- end upcoming-book-image -->

	<div class="upcoming-book-content <?php echo esc_attr($content_alignment); ?>">
		<?php if ( $atts['above_title_text'] ) : ?>
		<div class="special-link mb-60"><?php echo wp_kses_post($atts['above_title_text']); ?></div>
		<?php endif; ?>
		<?php if ( $atts['book_title'] ) : ?>
		<div class="ElementHeading">
			<h2 class="element-title"><?php echo wp_kses_post($atts['book_title']); ?></h2>
		</div>
		<?php endif; ?>
		<?php if ( $atts['book_short_description'] ) : ?>
		<div class="upcoming-book-description mb-60">
			<?php echo do_shortcode($atts['book_short_description']); ?>
		</div>
		<?php endif; ?>
		<div class="upcoming-book-release-date">
			<?php if ( $show_countdown['show_countdown'] == 'true' ) : ?>
				<?php 
				$release_date = new DateTime($show_countdown['true']['release_datetime']);
				$parm_release_date = $release_date->format('Y/m/d H:i:s');
				?>
				<div class="is-countdown" data-release-date="<?php echo esc_attr($parm_release_date); ?>"></div>
				<?php if ( $show_countdown['true']['expired_text'] ) : ?>
					<span class="countdown-expired-text countdown-text font-subheading"><?php echo do_shortcode($show_countdown['true']['expired_text']); ?></span>
				<?php endif; ?>
			<?php elseif ( $show_countdown['show_countdown'] == 'false' && $show_countdown['false']['release_text'] ) : ?>
				<span class="countdown-text font-heading"><?php echo wp_kses_post($show_countdown['false']['release_text']); ?></span>
			<?php endif; ?>
		</div>

	</div> <!-- end upcoming-book-content -->

</div><!-- end UpcomingBookWrapper -->