<?php if ( ! defined( 'ABSPATH' ) ) { die(); }
/**
 * Register menus
 */

register_nav_menus( array(
	'main-navigation-left'   => esc_html__( 'Main Navigation Left', 'odrin' ),
	'main-navigation-right'   => esc_html__( 'Main Navigation Right', 'odrin' ),
) );