<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Books Panel', 'odrin' ),
	'description' => esc_html__( 'Add panel with thumbnails and text for each of them.', 'odrin' ),
	'tab'         => esc_html__( 'Content Elements', 'odrin' ),
);