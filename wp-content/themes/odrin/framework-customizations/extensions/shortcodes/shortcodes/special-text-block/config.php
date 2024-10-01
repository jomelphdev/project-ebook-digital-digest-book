<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Special Text Block', 'odrin' ),
	'description' => esc_html__( 'Add text block with title, subtitle and an image', 'odrin' ),
	'tab'         => esc_html__( 'Content Elements', 'odrin' ),
);