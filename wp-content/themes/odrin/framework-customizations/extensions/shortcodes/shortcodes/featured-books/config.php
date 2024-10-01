<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Featured Books', 'odrin' ),
	'description' => esc_html__( 'Add shop that shows the selected WooCommerce Books.', 'odrin' ),
	'tab'         => esc_html__( 'Content Elements', 'odrin' ),
);