<?php if ( ! defined( 'ABSPATH' ) ) { die(); }




add_action('wp_ajax__action_odrin_ajax_bookblock_function', '_action_odrin_ajax_bookblock_function');
add_action('wp_ajax_nopriv__action_odrin_ajax_bookblock_function', '_action_odrin_ajax_bookblock_function');

if(!( function_exists('_action_odrin_ajax_bookblock_function') )){

	function _action_odrin_ajax_bookblock_function(){


	$post_id = $_POST['id'];

	$output = odrin_get_book_content($post_id);

	echo do_shortcode($output);

	die();
	}
}