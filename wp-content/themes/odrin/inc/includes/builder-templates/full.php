<?php if (!defined('FW')) die('Forbidden');

$templates_list = array(
	'about_me' =>  esc_html__('About Me', 'odrin'),
	'books_panel' =>  esc_html__('Books Panel', 'odrin'),
	'coming_soon' =>  esc_html__('Coming Soon', 'odrin'),
	'contact_me' =>  esc_html__('Contact Me', 'odrin'),
	'home_1' =>  esc_html__('Home 1', 'odrin'),
	'how_i_write' =>  esc_html__('How I Write', 'odrin'),
	'my_books' =>  esc_html__('My Books', 'odrin'),
	'shop_without_sidebar' =>  esc_html__('Shop No Sidebar', 'odrin'),
	'two_books' =>  esc_html__('Two Books', 'odrin'),
	'who_am_i' =>  esc_html__('Who am I', 'odrin'),
	'workshop' =>  esc_html__('Workshop', 'odrin'),
);

$json_dir = get_template_directory() .'/inc/includes/builder-templates/';
$json_files = glob($json_dir . '*.json');

foreach ($json_files as $key => $value) {
	$match = array();
	preg_match('/\/([\w]+)\.json/', $value, $match);
	$list_key = $templates_list[$match[1]];

	if ( $list_key ) {
		$json_file = get_template_directory_uri() .'/inc/includes/builder-templates/' . $match[1] . '.json';
		$json = wp_remote_fopen($json_file);

		$template_item = array(
			'title' => $list_key,
			'json'  => $json
			);
		$templates[$match[1]] = $template_item;
	}
}