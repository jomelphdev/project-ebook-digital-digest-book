<?php

/*
Plugin Name: Subsolar Designs Mailchimp Widget
Plugin URI: http://www.subsolardesigns.com
Description: Adds a Mailchimp Widget and Unyson Shortcode by Subsolar Designs.
Version: 1.0.3
Author: Subsolar Designs
Author URI: http://www.subsolardesigns.com
*/	

/**
 * Require Mailchimp Widget.
 */
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'mailchimp-widget/class-widget-mailchimp.php' );

/**
 * Add Unyson Extensions
 */

add_filter('fw_extensions_locations', '_filter_ssd_unyson_extensions');

if ( !function_exists( '_filter_ssd_unyson_extensions' ) ) {
	function _filter_ssd_unyson_extensions($locations) {
		$locations[dirname(__FILE__) . '/extensions'] 
		=
		plugin_dir_url( __FILE__ ) . 'extensions';

		return $locations;
	}
}

/**
*  Enqueue Styles
*/

add_action( 'wp_enqueue_scripts', '_action_ssd_enqueue_scripts' );

if ( !function_exists( '_action_ssd_enqueue_scripts' ) ) {
	function _action_ssd_enqueue_scripts() {
		wp_enqueue_style( 'ssd-mailchimp-css', plugin_dir_url( __FILE__ ) . 'assets/css/main.css' );
		wp_register_script( 'ssd-mailchimp-js', plugin_dir_url( __FILE__ ) . 'assets/js/scripts.js' );

		// Localization
		wp_localize_script( 'ssd-mailchimp-js', 'subsolar_widget', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'subs_email_empty' => esc_html__('You have not entered an email address.', 'subsolar_widget'),
			'subs_email_error' => esc_html__('You have entered an invalid email address.', 'subsolar_widget'),
			'subs_email_add' => esc_html__('Adding your email address...', 'subsolar_widget'),
			)
		);

		wp_enqueue_script( 'ssd-mailchimp-js', '', 'jquery', '1.0', true );
	}
}

/**
*  Mailchimp API Subscribe User
*/

function mailchimpApiCall( $key, $id, $user_email, $double_opt_in ) {
	$api_key = $key;
	$email = $user_email;
	$status = $double_opt_in ? 'pending' : 'subscribed'; // subscribed, cleaned, pending
	$list_id = $id;
	$return_msg = array();
	$dc = substr($api_key,strpos($api_key,'-')+1); // us5, us8 etc

	// Check if email exists in list
	$args = array(
		'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( 'user:'. $api_key )
		)
	);
	$response_get = wp_remote_get( 'https://'.$dc.'.api.mailchimp.com/3.0/lists/'.$list_id.'/members/', $args );
	$body = json_decode( wp_remote_retrieve_body( $response_get ) );
	$emails = array();

	if ( wp_remote_retrieve_response_code( $response_get ) == 200 ) {
		foreach ( $body->members as $member ) {
			if( $member->status != 'subscribed' && $member->status != 'pending' )
				continue;
			$emails[] = $member->email_address;
		}
	}

	if ( !empty($emails) && in_array($email, $emails) ) {
		$return_msg['type'] = 'error';
		$return_msg['value'] = esc_html__('Oops! This email address is already subscribed!', 'subsolar_widget');
		
	} else {

		// Subscribe user
		$args = array(
			'method' => 'PUT',
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode( 'user:'. $api_key )
				),
			'body' => json_encode(array(
				'email_address' => $email,
				'status'        => $status
				))
			);
		$response = wp_remote_post( 'https://' . $dc . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($email)), $args );

		$body = json_decode( $response['body'] );

		if ( $response['response']['code'] == 200 && $body->status == $status ) {
			$return_msg['type'] = 'success';
			$return_msg['value'] = esc_html__( 'Success! You are signed up.', 'subsolar_widget' );
		} else {
			$return_msg['type'] = 'error';
			$return_msg['value'] = esc_html__( "Something went wrong. We couldn't sign you up.", 'subsolar_widget');
		}
	}

	return $return_msg;
}

/**
*  Subscription Widget
*/

add_action('wp_ajax__action_odrin_mailchimp_subscribe', '_action_odrin_mailchimp_subscribe');
add_action('wp_ajax_nopriv__action_odrin_mailchimp_subscribe', '_action_odrin_mailchimp_subscribe');

if ( !function_exists( '_action_odrin_mailchimp_subscribe' ) ) {
	function _action_odrin_mailchimp_subscribe() { 
		$api_key = odrin_get_option('mailchimp_api_key') ? odrin_get_option('mailchimp_api_key') : false;
		$list_id = odrin_get_option('mailchimp_list_id') ? odrin_get_option('mailchimp_list_id') : false;
		$double_opt_in = odrin_get_option('mailchimp_double_opt_in') ? odrin_get_option('mailchimp_double_opt_in') : false;
		if ( !$api_key || !$list_id ) {
			if ( current_user_can( 'edit_theme_options' ) ) {
				$error_msg = esc_html__('Mailchimp API Key or List ID are not set.', 'subsolar_widget');
			} else { 
				$error_msg = esc_html__( "Something went wrong. We couldn't sign you up.", 'subsolar_widget');
			}
			echo '<div class="alert alert-danger">' . $error_msg .'</div>';
		}
		else {
			$email = strtolower($_POST['email']);
			$result = mailchimpApiCall($api_key, $list_id,$email, $double_opt_in);
			if ( !empty($result) ) {
				if ( $result['type'] == 'success' ) {
					echo '<div class="alert alert-success">' . $result['value'] . '</div>';
				} else {
					echo '<div class="alert alert-danger">' . $result['value'] .'</div>';
				}
			} else {
				echo '<div class="alert alert-danger">' . esc_html__( "Something went wrong. We couldn't sign you up.", 'subsolar_widget') .'</div>';
			}
		}
		die();
	}
}

/**
*  Social API Check
*/

if ( !function_exists( 'odrin_api_key_check' ) ) {
	function odrin_api_key_check( $name ) { 

		$api_key = odrin_get_option('mailchimp_api_key') ? odrin_get_option('mailchimp_api_key') : false;
		$list_id = odrin_get_option('mailchimp_list_id') ? odrin_get_option('mailchimp_list_id') : false;

		// Mailchimp Api Key and List ID check
		if ($name == 'mailchimp') {
			if ( !$api_key && !$list_id ) {
				printf( esc_html__('Mailchimp API Key and List ID are not set, enter them from %s -> Social -> Mailchimp','subsolar_widget'), sprintf( '<a href="%s">%s</a>', admin_url( 'admin.php?page=fw-settings' ), esc_html__( 'Appearance -> Theme Settings', 'subsolar_widget' ) ));
			}
			elseif ( !$api_key ) {
				printf( esc_html__('Mailchimp API Key not found, enter it from %s -> Social -> Mailchimp','subsolar_widget'), sprintf( '<a href="%s">%s</a>', admin_url( 'admin.php?page=fw-settings' ), esc_html__( 'Appearance -> Theme Settings', 'subsolar_widget' ) ));
			}
			elseif ( !$list_id ) {
				printf( esc_html__('Mailchimp List ID not found, enter it from %s -> Social -> Mailchimp','subsolar_widget'), sprintf( '<a href="%s">%s</a>', admin_url( 'admin.php?page=fw-settings' ), esc_html__( 'Appearance -> Theme Settings', 'subsolar_widget' ) ));
			}
		}
	}
}