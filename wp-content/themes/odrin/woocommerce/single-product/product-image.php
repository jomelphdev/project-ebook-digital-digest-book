<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 9.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images'
) );
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="woocommerce-product-gallery__image-wrapper SingleProductImage">
		<?php
		$attributes = array(
			'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
			'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
			'data-src'                => $full_size_image[0],
			'data-large_image'        => $full_size_image[0],
			'data-large_image_width'  => $full_size_image[1],
			'data-large_image_height' => $full_size_image[2],
		);

		if ( has_post_thumbnail() ) {
			$page_flip_class = '';
			if ( !odrin_get_field('remove_thumbnail_3d_effect') ) {
				$page_flip_class .= ' single-has-edge has-edge has-edge-thick';
			}
			if( odrin_have_rows('read_the_book_chapters',  get_the_ID()) ) {
				$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image PageFlipBook"><a href="#" class="is-page-flip' . $page_flip_class . '" data-post-id="' .  get_the_ID() . '">';

				if ( odrin_get_field('read_the_book_text', $post->ID) ) {
					$read_the_book_text = odrin_get_field('read_the_book_text', $post->ID);
				} else {
					$read_the_book_text = esc_html__('Read the Book', 'odrin');
				}
				
				$html .= '<div class="page-flip-book-ribbon"><span>' . wp_kses_post($read_the_book_text) . '</span></div>';
			} else {
				$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image">';
			}
			
			$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
			if( odrin_have_rows('read_the_book_chapters',  get_the_ID()) ) {
				$html .= '</a></div>';
			} else {
				$html .= '</div>';
			}
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'odrin' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );
		?>
		<?php do_action( '_action_odrin_wc_single_product_after_image' ); ?>
	</div>
	<div class="woocommerce-product-gallery__thumbnails_wrapper is-lightbox-gallery">
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
	</div>
</div>
