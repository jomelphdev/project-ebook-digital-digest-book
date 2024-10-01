<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_59119c43b31c4',
	'title' => __('Page', 'odrin'),
	'fields' => array(
		array(
			'key' => 'field_59119c4bf9881',
			'label' => __('Full Width', 'odrin'),
			'name' => 'full_width',
			'type' => 'true_false',
			'instructions' => __('Remove the spacing added on the left and right of the page content.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => __('Enable', 'odrin'),
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_59b063ec2156a',
			'label' => __('Hide Title', 'odrin'),
			'name' => 'hide_title',
			'type' => 'true_false',
			'instructions' => __('Hide the Page Title', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => __('Hide Title', 'odrin'),
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'default',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'modified' => 1505504648,
));

acf_add_local_field_group(array(
	'key' => 'group_599441736429d',
	'title' => __('Product Category', 'odrin'),
	'fields' => array(
		array(
			'key' => 'field_599441c5fba4d',
			'label' => __('Header Image', 'odrin'),
			'name' => 'header_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_599444a190d2d',
			'label' => __('Header Text Color', 'odrin'),
			'name' => 'header_text_color',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'dark' => __('Dark', 'odrin'),
				'light' => __('Light', 'odrin'),
			),
			'default_value' => array(
				0 => 'dark',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'product_cat',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_591edc754bf1c',
	'title' => __('Single Event', 'odrin'),
	'fields' => array(
		array(
			'key' => 'field_593694e5bff96',
			'label' => __('Event Date', 'odrin'),
			'name' => 'event_date',
			'type' => 'date_time_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y g:i a',
			'return_format' => 'Y-m-d H:i:s',
			'first_day' => 1,
		),
		array(
			'key' => 'field_5b2a5e783b718',
			'label' => __('Event End Date', 'odrin'),
			'name' => 'event_end_date',
			'type' => 'date_time_picker',
			'instructions' => __('Leave empty, if it is a one day event.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y g:i a',
			'return_format' => 'Y-m-d H:i:s',
			'first_day' => 1,
		),
		array(
			'key' => 'field_591ef0246a09d',
			'label' => __('Event Image', 'odrin'),
			'name' => 'event_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_591edd0578a38',
			'label' => __('Event Location', 'odrin'),
			'name' => 'event_location',
			'type' => 'text',
			'instructions' => __('Enter the location of the event', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_591edd2d78a39',
			'label' => __('Event Location URL', 'odrin'),
			'name' => 'event_location_url',
			'type' => 'url',
			'instructions' => __('Enter the website of the location/venue/event if there is any.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_591ee0d79b2e4',
			'label' => __('Event Map Location', 'odrin'),
			'name' => 'event_map_location',
			'type' => 'google_map',
			'instructions' => __('Add a map to the event with the exact spot of the location.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'center_lat' => '',
			'center_lng' => '',
			'zoom' => '',
			'height' => 300,
		),
		array(
			'key' => 'field_591ee2721978a',
			'label' => __('Additional Information', 'odrin'),
			'name' => 'additional_information',
			'type' => 'repeater',
			'instructions' => __('Add fields with additional information about the event.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => __('Add Field', 'odrin'),
			'sub_fields' => array(
				array(
					'key' => 'field_591ee2b71978b',
					'label' => __('Label', 'odrin'),
					'name' => 'label',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_591ee2cc1978c',
					'label' => __('Text', 'odrin'),
					'name' => 'text',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_591ee32a1978d',
					'label' => __('Text URL', 'odrin'),
					'name' => 'text_url',
					'type' => 'url',
					'instructions' => __('Add URL for the text.', 'odrin'),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'event',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'modified' => 1529504029,
));

acf_add_local_field_group(array(
	'key' => 'group_57c80b1059dd7',
	'title' => __('Template - Contact', 'odrin'),
	'fields' => array(
		array(
			'key' => 'field_595e2d52164e2',
			'label' => __('Subtitle', 'odrin'),
			'name' => 'subtitle',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_57c94f2a1c5c8',
			'label' => __('Contact Form 7 Shortcode', 'odrin'),
			'name' => 'contact_form_7_shortcode',
			'type' => 'text',
			'instructions' => 'Insert your Contact Form 7 shortcode. You can create one in <a href="http://localhost/odrin/wp-admin/admin.php?page=wpcf7">Contact &gt; Contact Forms</a>',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '[contact-form-7 id="XX" title="XXXX"]',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5b0bfad65d8cb',
			'label' => __('Show Map', 'odrin'),
			'name' => 'show_map',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => __('Show Google Map', 'odrin'),
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_57c80b27af100',
			'label' => __('Location', 'odrin'),
			'name' => 'location',
			'type' => 'google_map',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b0bfad65d8cb',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'center_lat' => '',
			'center_lng' => '',
			'zoom' => '',
			'height' => '',
		),
		array(
			'key' => 'field_57c81a17a5541',
			'label' => __('Map Zoom', 'odrin'),
			'name' => 'map_zoom',
			'type' => 'number',
			'instructions' => __('Enter map zoom level from 1 to 20.', 'odrin'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b0bfad65d8cb',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 15,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 20,
			'step' => '',
		),
		array(
			'key' => 'field_57c94426bcf0d',
			'label' => __('Marker', 'odrin'),
			'name' => 'marker',
			'type' => 'image',
			'instructions' => __('Upload custom marker image.', 'odrin'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b0bfad65d8cb',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-contact.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'modified' => 1527511871,
));

acf_add_local_field_group(array(
	'key' => 'group_592d55d80a318',
	'title' => __('Template Blog', 'odrin'),
	'fields' => array(
		array(
			'key' => 'field_592d5d475108e',
			'label' => __('Header Subtitle', 'odrin'),
			'name' => 'header_subtitle',
			'type' => 'text',
			'instructions' => __('Subtitle below the Title.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_592d5d695108f',
			'label' => __('Show Search Field', 'odrin'),
			'name' => 'show_search',
			'type' => 'true_false',
			'instructions' => __('Show the Search Field in the header.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'message' => __('Show', 'odrin'),
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5b2cb95339aa0',
			'label' => __('Background Image', 'odrin'),
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => __('Background Image for the Header.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5b2cb96f39aa1',
			'label' => __('Header Color Overlay', 'odrin'),
			'name' => 'header_color_overlay',
			'type' => 'select',
			'instructions' => __('Apply a color overlay over the image.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'none' => __('None', 'odrin'),
				'light' => __('Light', 'odrin'),
				'dark' => __('Dark', 'odrin'),
			),
			'default_value' => array(
				0 => 'none',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5b2cb99d39aa2',
			'label' => __('Header Text Color', 'odrin'),
			'name' => 'header_text_color',
			'type' => 'select',
			'instructions' => __('Select the color of the text in the header - light or dark', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'light' => __('Light Text', 'odrin'),
				'dark' => __('Dark Text', 'odrin'),
			),
			'default_value' => array(
				0 => 'dark',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-blog.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'modified' => 1529657824,
));

acf_add_local_field_group(array(
	'key' => 'group_5926a5c4b3457',
	'title' => __('Template Events', 'odrin'),
	'fields' => array(
		array(
			'key' => 'field_59282590fffe4',
			'label' => __('Header Style', 'odrin'),
			'name' => 'header_style',
			'type' => 'select',
			'instructions' => __('Select the type of the page header - display the Page Title, Featured Event or create a Custom Header.', 'odrin'),
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'title' => __('Title', 'odrin'),
				'featured_event' => __('Featured Event', 'odrin'),
				'custom_header' => __('Custom Header', 'odrin'),
				'no_header' => __('No Header', 'odrin'),
			),
			'default_value' => array(
				0 => 'title',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5928278efffe7',
			'label' => __('Featured Event', 'odrin'),
			'name' => 'featured_event',
			'type' => 'post_object',
			'instructions' => __('Select a Featured Event', 'odrin'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_59282590fffe4',
						'operator' => '==',
						'value' => 'featured_event',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'event',
			),
			'taxonomy' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'id',
			'ui' => 1,
		),
		array(
			'key' => 'field_592c141bb717f',
			'label' => __('Background Image', 'odrin'),
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => __('Background Image for the Header.', 'odrin'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_59282590fffe4',
						'operator' => '==',
						'value' => 'custom_header',
					),
				),
			),
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_592c1441b7180',
			'label' => __('Header Color Overlay', 'odrin'),
			'name' => 'header_color_overlay',
			'type' => 'select',
			'instructions' => __('Apply a color overlay over the image', 'odrin'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_59282590fffe4',
						'operator' => '==',
						'value' => 'custom_header',
					),
				),
			),
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'light' => __('Light', 'odrin'),
				'dark' => __('Dark', 'odrin'),
			),
			'default_value' => array(
				0 => 'dark',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_592c255aba7fb',
			'label' => __('Header Text Color', 'odrin'),
			'name' => 'header_text_color',
			'type' => 'select',
			'instructions' => __('Select the color of the text in the header - light or dark', 'odrin'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_59282590fffe4',
						'operator' => '==',
						'value' => 'custom_header',
					),
				),
			),
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'light' => __('Light Text', 'odrin'),
				'dark' => __('Dark Text', 'odrin'),
			),
			'default_value' => array(
				0 => 'light',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5926a5d90831e',
			'label' => __('Show Date Filter', 'odrin'),
			'name' => 'show_filter',
			'type' => 'true_false',
			'instructions' => __('Display the date filter for events.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => '',
			),
			'message' => __('Show', 'odrin'),
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5b2a06b5b95b7',
			'label' => __('Show Category Filter', 'odrin'),
			'name' => 'show_category_filter',
			'type' => 'true_false',
			'instructions' => __('Display the category filter for events.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => '',
			),
			'message' => __('Show', 'odrin'),
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5926cb5ec00cd',
			'label' => __('Filter Text', 'odrin'),
			'name' => 'filter_text',
			'type' => 'text',
			'instructions' => __('The text for the filter.', 'odrin'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5926a5d90831e',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Filter Events:',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5b1fb79e9b0e3',
			'label' => __('Hide or Show Categories', 'odrin'),
			'name' => 'hide_show_categories',
			'type' => 'radio',
			'instructions' => __('Select to Hide or Show the selected Specific Categories.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'hide' => __('Hide Categories', 'odrin'),
				'show' => __('Show Categories', 'odrin'),
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'hide',
			'layout' => 'vertical',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5adc52903161d',
			'label' => __('Specific Categories', 'odrin'),
			'name' => 'hide_categories',
			'type' => 'repeater',
			'instructions' => __('Select the categories that you want show/hide from the current events page.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '66.666',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5adc52a33161e',
					'label' => __('Category', 'odrin'),
					'name' => 'category',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'event_category',
					'field_type' => 'select',
					'allow_null' => 0,
					'add_term' => 1,
					'save_terms' => 0,
					'load_terms' => 0,
					'return_format' => 'object',
					'multiple' => 0,
				),
			),
		),
		array(
			'key' => 'field_5b1fb7399b0e2',
			'label' => __('Number of Columns', 'odrin'),
			'name' => 'number_of_columns',
			'type' => 'number',
			'instructions' => __('Select the number of columns for the Events - 1 to 3.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => 2,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 3,
			'step' => 1,
		),
		array(
			'key' => 'field_5926ba710fab6',
			'label' => __('Events Per Page', 'odrin'),
			'name' => 'events_per_page',
			'type' => 'number',
			'instructions' => __('How many events to be displayed in a page. Leave blank if you want all events in one page.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50.333',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5add9f37cac44',
			'label' => __('Show Past Events', 'odrin'),
			'name' => 'show_past_events',
			'type' => 'true_false',
			'instructions' => __('Display events that already ended.', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'message' => __('Show', 'odrin'),
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5bd08b5b35dfc',
			'label' => __('Past Events Number', 'odrin'),
			'name' => 'past_events_number',
			'type' => 'number',
			'instructions' => __('How many past events to be displayed. Leave blank if you want all past events to be shown.', 'odrin'),
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5add9f37cac44',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => 4,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5b1fb8369b0e4',
			'label' => __('Display Events Year', 'odrin'),
			'name' => 'display_events_year',
			'type' => 'true_false',
			'instructions' => __('Show the events year next to the day and month', 'odrin'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => __('Show Year', 'odrin'),
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-events.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'modified' => 1540394133,
));

acf_add_local_field_group(array(
	'key' => 'group_591d48592fbe9',
	'title' => __('Product', 'odrin'),
	'fields' => array(
		array(
			'key' => 'field_5a1d161b82272',
			'label' => __('"Read the Book" Text', 'odrin'),
			'name' => 'read_the_book_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '80',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Read the Book',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5d9708cd86ce7',
			'label' => __('Remove "Thumbnail 3D Effect"', 'odrin'),
			'name' => 'remove_thumbnail_3d_effect',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '20',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_591d4869d4ad4',
			'label' => __('Product short description - Sidebar', 'odrin'),
			'name' => 'description_sidebar',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_593e98054417f',
			'label' => __('"Read the Book" Chapters', 'odrin'),
			'name' => 'read_the_book_chapters',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5947d810b2481',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => __('Add Chapter', 'odrin'),
			'sub_fields' => array(
				array(
					'key' => 'field_5947d810b2481',
					'label' => __('Title', 'odrin'),
					'name' => 'title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5947d74b176c5',
					'label' => __('Chapter', 'odrin'),
					'name' => 'chapter',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			),
		),
	),
	'menu_order' => 9999,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;