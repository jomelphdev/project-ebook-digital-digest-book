<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>


	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	
	<div class="single-product-meta">
		<span class="meta-title"><?php esc_html_e('Category: ', 'odrin'); ?></span>
		<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="meta-text">', '</span>' ); ?>
	</div>

	<div class="single-product-meta">
		<span class="meta-title"><?php esc_html_e('Tags: ', 'odrin'); ?></span>
		<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="meta-text">', '</span>' ); ?>
	</div>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		
		<div class="single-product-meta">
			<span class="meta-title"><?php esc_html_e( 'SKU:', 'odrin' ); ?></span>
			<span class="meta-text"><?php echo ( esc_attr($product->get_sku()) ) ? esc_attr($product->get_sku()) : esc_html__( 'N/A', 'odrin' ); ?></span>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>


