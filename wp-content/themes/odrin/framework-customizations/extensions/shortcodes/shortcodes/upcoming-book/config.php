<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Upcoming Book', 'odrin' ),
	'description' => esc_html__( 'Add an Upcoming Book.', 'odrin' ),
	'tab'         => esc_html__( 'Content Elements', 'odrin' ),
);