<?php

/*
Plugin Name: Subsolar Designs Extras
Plugin URI: http://www.subsolardesigns.com
Description: Adds Custom Post Types and Widgets for themes by Subsolar Designs.
Version: 2.1.0
Author: Subsolar Designs
Author URI: http://www.subsolardesigns.com
*/	

/**
 * Require post type file.
 */
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'cpt.php' );

function ssd_register_extras(){
	
	( current_theme_supports('subsolar-theme') ) ? $subsolar_theme = true : $subsolar_theme = false;
	
	/**
	 * Register Custom Post Types
	 */
	if( current_theme_supports('subsolar-deal') || !$subsolar_theme ){
		add_action( 'init', 'ssd_register_deal' );
		add_action( 'init', 'ssd_create_deal_taxonomies' );
	}
	if( current_theme_supports('subsolar-portfolio') || !$subsolar_theme ){
		add_action( 'init', 'ssd_register_portfolio' );
		add_action( 'init', 'ssd_create_portfolio_taxonomies' );
	}
	if( current_theme_supports('subsolar-event') || !$subsolar_theme ){
		add_action( 'init', 'ssd_register_event' );
		add_action( 'init', 'ssd_create_event_taxonomies' );
	}
}
add_action('after_setup_theme', 'ssd_register_extras', 15);