<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Text Block', 'odrin' ),
	'description' => esc_html__( 'Add a Text Block', 'odrin' ),
	'tab'         => esc_html__( 'Content Elements', 'odrin' ),
	'popup_size' => 'medium', // can be large, medium or small
);
