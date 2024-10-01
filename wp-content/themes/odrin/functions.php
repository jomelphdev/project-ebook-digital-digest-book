<?php if ( ! defined( 'ABSPATH' ) ) { die(); }

/**
 * Theme Includes
 */
require_once(get_theme_file_path('/inc/init.php'));

/**
 * TGM Plugin Activation
 */
{
	require_once(get_theme_file_path('/TGM-Plugin-Activation/class-tgm-plugin-activation.php'));
	
	/** @internal */
	function _action_odrin_register_required_plugins() {
		tgmpa( array(
			array(
				'name'      			=> esc_html__('Unyson (Subsolar Designs Fork)', 'odrin'),
				'slug'      			=> 'unyson-subsolar',
				'source'    			=> get_template_directory() . '/TGM-Plugin-Activation/plugins/unyson-subsolar.zip',
				'required'  			=> true,
				'version' 				=> '2.9.1',
			),
			array(
				'name'      			=> esc_html__('Advanced Custom Fields Pro', 'odrin'),
				'slug'      			=> 'advanced-custom-fields-pro',
				'source'    			=> get_template_directory() . '/TGM-Plugin-Activation/plugins/advanced-custom-fields-pro.zip',
				'required'  			=> true,
				'version' 				=> '6.2.1.1',
			),
			array(
				'name'     				=> esc_html__('Envato Market', 'odrin'),
				'slug'     				=> 'envato-market',
				'source'   				=> get_template_directory() . '/TGM-Plugin-Activation/plugins/envato-market.zip',
				'required' 				=> false,
				'version' 				=> '',
				'external_url' 			=> ''
			),
			array(
				'name'					=> esc_html__('WooCommerce', 'odrin'),
				'slug'					=> 'woocommerce',
				'required' 				=> false,
				'version' 				=> '',
				'external_url' 			=> ''
			),
			array(
				'name'     				=> esc_html__('Subsolar Designs Extras', 'odrin'),
				'slug'     				=> 'subsolar-extras',
				'source'   				=> get_template_directory() . '/TGM-Plugin-Activation/plugins/subsolar-extras.zip',
				'required' 				=> true,
				'version' 				=> '',
				'external_url' 			=> ''
			),
			array(
				'name'     				=> esc_html__('Classic Editor', 'odrin'),
				'slug'     				=> 'classic-editor',
				'required' 				=> false,
				'version' 				=> '',
				'external_url' 			=> ''
			),
			array(
				'name'     				=> esc_html__('Contact Form 7', 'odrin'),
				'slug'     				=> 'contact-form-7',
				'required' 				=> false,
				'version' 				=> '',
				'external_url' 			=> ''
			),
			array(
				'name'     				=> esc_html__('Subsolar Twitter Widget', 'odrin'),
				'slug'     				=> 'subsolar-twitter-widget',
				'source'   				=> get_template_directory() . '/TGM-Plugin-Activation/plugins/subsolar-twitter-widget.zip',
				'required' 				=> false,
				'version' 				=> '1.0',
				'external_url' 			=> ''
			),
			array(
				'name'     				=> esc_html__('Subsolar Mailchimp Widget', 'odrin'),
				'slug'     				=> 'subsolar-mailchimp-widget',
				'source'   				=> get_template_directory() . '/TGM-Plugin-Activation/plugins/subsolar-mailchimp-widget.zip',
				'required' 				=> false,
				'version' 				=> '1.0.3',
				'external_url' 			=> ''
			),
			array(
				'name'     				=> esc_html__('Odrin Functionalities', 'odrin'),
				'slug'     				=> 'odrin-functionalities',
				'source'   				=> get_template_directory() . '/TGM-Plugin-Activation/plugins/odrin-functionalities.zip',
				'required' 				=> false,
				'version' 				=> '1.0.4',
				'external_url' 			=> ''
			),
			array(
				'name'     				=> esc_html__('Elementor', 'odrin'),
				'slug'     				=> 'elementor',
				'required' 				=> false,
				'version' 				=> '',
				'external_url' 			=> ''
			),

		) );

	}
	add_action( 'tgmpa_register', '_action_odrin_register_required_plugins' );
}

/**
*  Content Width
*/

if ( ! isset( $content_width ) ) {
	$content_width = 2000;
}
