<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Mailchimp Newsletter', 'odrin' ),
	'description' => esc_html__( 'Add a Mailchimp Subscription Form', 'odrin' ),
	'tab'         => esc_html__( 'Content Elements', 'odrin' ),
);