<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Tabs', 'odrin' ),
	'description' => esc_html__( 'Add some Tabs', 'odrin' ),
	'tab'         => esc_html__( 'Content Elements', 'odrin' ),
);