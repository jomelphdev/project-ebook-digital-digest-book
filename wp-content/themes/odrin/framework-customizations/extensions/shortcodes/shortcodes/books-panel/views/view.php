<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); } ?>

<?php 
$read_book_btn = $atts['show_read_book'];
$columns_num = $atts['columns'] ? $atts['columns'] : 3;

// The default 3 columns
$column_class = 'col-sm-4 col-xs-6';
if ( $columns_num == 2 ) {
	$column_class =  'col-sm-6 col-xs-6';
} else if  ( $columns_num == 1 ) {
	$column_class =  'col-sm-12 col-xs-12';
}

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

<div class="BooksPanel <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	
	<div class="books-panel-container mt-40 row">

	<?php 
	$post_ids = array();

	if ($atts['books']) :

		foreach ($atts['books'] as $array) {
			if (isset($array[0])){
				array_push($post_ids, $array[0]);
			}
		}

		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
			'post__in' => $post_ids,
			'orderby' => 'post__in'
		);
		$the_query = new WP_Query($args);

		$post_number = 0;

		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
		?>

		<div class="books-panel-item <?php echo esc_attr($column_class); ?>">
			<a href="<?php the_permalink(); ?>" class="books-panel-item-wrap is-book-panel-trigger" data-panel-show="<?php echo esc_attr(get_the_ID()); ?>">
				<?php 
				if ( has_post_thumbnail() ) :
				?>
				<?php 
				switch ($atts['book_thickness']) {
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

				if ( odrin_get_field('remove_thumbnail_3d_effect') ) {
					$book_class .= ' book-thumb--no-flip';
				}
				?>
				<div class="book-thumb-img-wrap <?php echo esc_attr($book_class); ?>">
					<?php if ( $columns_num == 3 ) {
						the_post_thumbnail('odrin_small_soft');
					} else {
						the_post_thumbnail('odrin_medium_soft');
					}
					?>
				</div>
				<?php endif; ?>
				<h2 class="book-thumb-title"><?php the_title(); ?></h2>
			</a>
		</div><!-- end books-panel-item -->

		<?php endwhile; ?>
			
		</div><!-- end books-panel-container -->


		<div class="books-panel-info is-sticky-kit">

			<?php $the_query->rewind_posts(); ?>

			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

			<?php if ( odrin_woocommerce() ) : ?>

			<div class="books-panel-info-inner mt-80" data-panel-id="<?php echo esc_attr(get_the_ID()); ?>">
				<?php 
					$product = wc_get_product( get_the_ID() );
				?>
				<a href="<?php the_permalink() ?>"><h2 class="book-panel-info-title"><?php the_title(); ?></h2></a>
				<?php echo wc_get_product_category_list( get_the_ID(), ', ', '<div class="book-panel-info-categories dash-left dash-dark">', '</div>' ); ?>
				<div class="book-panel-info-description">
				
					<?php 
						global $post;
						echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );
					?>
					
					<?php if ( $product->get_price() ) : ?>
						<div class="book-panel-price mt-40 mb-40">
							<span class="price-text font-heading"><?php echo wp_kses_post($product->get_price_html()); ?></span>
						</div>
					<?php endif; ?>
					<?php
					if ( $read_book_btn == "true" && odrin_have_rows('read_the_book_chapters',  get_the_ID()) ) : ?>
						<?php 
						if ( odrin_get_field('read_the_book_text', get_the_ID()) ) {
								$read_the_book_text = odrin_get_field('read_the_book_text', get_the_ID());
							} else {
								$read_the_book_text = esc_html__('Read the Book', 'odrin');
							}
						?>
						<button type="button" class="btn is-page-flip" data-post-id="<?php the_ID(); ?>"><i class="icon-book-open"></i><?php echo wp_kses_post($read_the_book_text); ?></button>
					<?php endif; ?>
					<a href="<?php the_permalink() ?>" class="special-link"><?php esc_html_e('View Book', 'odrin') ?></a>
					<?php if ( $atts['show_add_to_cart'] == "true" ) :
					do_action( 'woocommerce_after_shop_loop_item' );
					endif; ?>
				</div>
			</div><!-- end books-panel-info-inner -->

		<?php endif; // odrin_woocommerce ?>

			<?php endwhile; ?>

		</div><!-- end books-panel-info -->

		<?php 
		wp_reset_postdata();
		endif; 
	
	endif; // end $atts['books']
	?>
	
</div> <!-- end BooksPanel -->