<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Blog', 'odrin' ),
	'description' => esc_html__( 'Add Latest Blog Posts', 'odrin' ),
	'tab'         => esc_html__( 'Content Elements', 'odrin' ),
);