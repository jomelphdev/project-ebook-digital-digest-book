<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */

$text_classes = ( odrin_get_option('special_paragraph_letter') ) ? ' special-first-letter' : '';

$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="SingleProductInfoBox">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<?php if ( $key == 'description' ) : ?>
			<div class="info-box-panel info-box-panel-<?php echo esc_attr( $key ); ?><?php echo esc_attr($text_classes); ?> entry-content" id="info-box-<?php echo esc_attr( $key ); ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ); ?>
			</div>
			<?php else : ?>
			<div class="info-box-panel info-box-panel-<?php echo esc_attr( $key ); ?> entry-content" id="info-box-<?php echo esc_attr( $key ); ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ); ?>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>

<?php endif; ?>
