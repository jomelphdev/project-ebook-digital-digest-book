<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'odrin' ),
		'type'    => 'tab',
		'options' => array(
			'google_api' => array(
				'type'  => 'gmap-key',
				'label' => esc_html__('Google API Key*', 'odrin'),
				'desc' => wp_kses_post(__('<strong>Important</strong>	Google have changed their Google Maps policies and now an API Key has to be present for Google Maps to work. Google Maps is used in the Maps Shortcode. You can find more information about acquiring a key from <a href="https://developers.google.com/maps/documentation/android-api/signup">here</a>.', 'odrin')),
			),
			'logo_name'    => array(
				'label' => esc_html__( 'Logo Name', 'odrin' ),
				'desc'  => esc_html__( 'Write your website logo name', 'odrin' ),
				'type'  => 'text',
				'value' => get_bloginfo( 'name' )
			),
			'logo_image' => array(
				'label' => esc_html__( 'Logo Image', 'odrin' ),
				'desc'  => esc_html__( 'Upload the logo image', 'odrin' ),
				'type'  => 'upload',
				'images_only' => true
			),
			'navigation_text_type' => array(
				'label' => esc_html__( 'Navigation Text Type', 'odrin' ),
				'desc'  => esc_html__( 'Choose the color of the navigation menu text.', 'odrin' ),
				'type'  => 'switch',
				'value' => 'dark',
				'left-choice' => array(
					'value' => 'light',
					'label' => esc_html__('Light', 'odrin'),
				),
				'right-choice' => array(
					'value' => 'dark',
					'label' => esc_html__('Dark', 'odrin'),
				),
			),
			'navigation_color' => array(
				'label'  => esc_html__( 'Navigation Background Color', 'odrin' ),
				'type'   => 'color-picker',
				'value' => '#fafafa',
				'desc'  => esc_html__( 'Default: #FAFAFA', 'odrin' ),
			),
			'footer_text'    => array(
				'label' => esc_html__( 'Footer Text', 'odrin' ),
				'desc'  => esc_html__( 'Write your website footer text', 'odrin' ),
				'type'  => 'wp-editor',
				'value' => '© ' . get_bloginfo( 'name' ) . ' ' .  date('Y')
			),
			'footer_text_type' => array(
				'label' => esc_html__( 'Footer Text Type', 'odrin' ),
				'desc'  => esc_html__( 'Choose the color of the footer text.', 'odrin' ),
				'type'  => 'switch',
				'value' => 'dark',
				'left-choice' => array(
					'value' => 'light',
					'label' => esc_html__('Light', 'odrin'),
				),
				'right-choice' => array(
					'value' => 'dark',
					'label' => esc_html__('Dark', 'odrin'),
				),
			),
			'footer_color' => array(
				'label'  => esc_html__( 'Footer Background Color', 'odrin' ),
				'type'   => 'color-picker',
				'value' => '#ffffff',
			),
			'footer_pattern' => array(
			    'type'  => 'image-picker',
			    'value' => 'pattern-3',
			    'label' => esc_html__('Background Pattern', 'odrin'),
			    'choices' => array(
			        'pattern-1' => array(
			        	'small' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_1.png',
			        		'height' => 70
			        	),
			        	'large' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_1.png',
			        		'height' => 200
			        	),
			        ),
			        'pattern-2' => array(
			        	'small' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_2.png',
			        		'height' => 70
			        	),
			        	'large' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_2.png',
			        		'height' => 200
			        	),
			        ),
			        'pattern-3' => array(
			        	'small' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_3.png',
			        		'height' => 70
			        	),
			        	'large' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_3.png',
			        		'height' => 200
			        	),
			        ),
			        'pattern-4' => array(
			        	'small' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_4.png',
			        		'height' => 70
			        	),
			        	'large' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_4.png',
			        		'height' => 200
			        	),
			        ),
			        'pattern-5' => array(
			        	'small' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_5.png',
			        		'height' => 70
			        	),
			        	'large' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_5.png',
			        		'height' => 200
			        	),
			        ),
			        'pattern-6' => array(
			        	'small' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_6.png',
			        		'height' => 70
			        	),
			        	'large' => array(
			        		'src' => get_template_directory_uri() .'/assets/images/patterns/pattern_6.png',
			        		'height' => 200
			        	),
			        ),
			    ),
			    'blank' => true
			),
			'footer_image' => array(
				'label' => esc_html__( 'Footer Background Image', 'odrin' ),
				'desc'  => esc_html__( 'This will overwrite the Background Pattern above.', 'odrin' ),
				'type'  => 'upload'
			),
		),
	),
	'colors' => array(
		'title'   => esc_html__( 'Styling and Layout', 'odrin' ),
		'type'    => 'tab',
		'options' => array(
			'special_heading_letter' => array(
				'type'  => 'switch',
				'value' => true,
				'label' => esc_html__('Show Heading Special First Letter', 'odrin'),
				'desc' => esc_html__('Display the special bordered first letter for the headings.', 'odrin'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('No', 'odrin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Yes', 'odrin'),
				),
			),
			'special_paragraph_letter' => array(
				'type'  => 'switch',
				'value' => true,
				'label' => esc_html__('Show Paragraph Special First Letter', 'odrin'),
				'desc' => esc_html__('Display the special first letter (dropcap) for the book preview and description paragraphs.', 'odrin'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('No', 'odrin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Yes', 'odrin'),
				),
			),
			'404_image' => array(
				'label' => esc_html__( '404 Background Image', 'odrin' ),
				'desc'  => esc_html__( 'Upload the background image', 'odrin' ),
				'type'  => 'upload',
				'images_only' => true
			),
			'404_text_color' => array(
				'label' => esc_html__( '404 Page Text Color', 'odrin' ),
				'desc'  => esc_html__( 'Select the color for the text message.', 'odrin' ),
				'type'  => 'select',
				'value' => 'dark',
				'choices' => array(
					'light' => esc_html__('Light Color', 'odrin'),
					'dark' => esc_html__('Dark Color', 'odrin'),
				),
			),
			'404_background_color' => array(
				'label' => esc_html__( '404 Page Background Color', 'odrin' ),
				'desc'  => esc_html__( 'The background color of the 404 Page, if there is no image.', 'odrin' ),
				'type'  => 'color-picker'
			),
			'color_main' => array(
				'type'  => 'color-picker',
				'value' => '#FAAB9F',
				'label' => esc_html__('Main Color', 'odrin'),
				'desc' => esc_html__('Default: #FAAB9F', 'odrin'),
			),
			'color_secondary' => array(
				'type'  => 'color-picker',
				'value' => '#D38D45',
				'label' => esc_html__('Secondary Color', 'odrin'),
				'desc' => esc_html__('Default: #D38D45', 'odrin'),
			),
			'custom_css' => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => esc_html__('Custom CSS', 'odrin'),
				'desc'  => esc_html__('Paste your custom CSS here.', 'odrin'),
			)
		)
	),
	'woocommerce_tab' => array(
		'title'   => esc_html__( 'WooCommerce', 'odrin' ),
		'type'    => 'tab',
		'options' => array(
			'shop_header_image' => array(
				'label' => esc_html__( 'Shop Page Header Image', 'odrin' ),
				'desc'  => esc_html__( 'Upload Shop Page Header background image', 'odrin' ),
				'type'  => 'upload',
				'images_only' => true
			),
			'shop_header_text_type' => array(
				'type'  => 'switch',
				'value' => 'dark',
				'label' => esc_html__('Shop Header Text Color', 'odrin'),
				'desc' => esc_html__( 'Changes the text color of the Shop title.', 'odrin' ),
				'left-choice' => array(
					'value' => 'light',
					'label' => esc_html__('Light', 'odrin'),
					),
				'right-choice' => array(
					'value' => 'dark',
					'label' => esc_html__('Dark', 'odrin'),
					),
				),
			'hide_nav_menu_profle' => array(
				'type'  => 'switch',
				'value' => false,
				'label' => esc_html__('Hide Navigation Menu Profile Item', 'odrin'),
				'desc' => esc_html__('Hides the Profile/Login/Register item from the navigation menu.', 'odrin'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('No', 'odrin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Yes', 'odrin'),
				),
			),
			'always_show_cart_button' => array(
				'type'  => 'switch',
				'value' => false,
				'label' => esc_html__('Always Show Cart Button', 'odrin'),
				'desc' => esc_html__('Always show the cart button, even when the cart is empty.', 'odrin'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('No', 'odrin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Yes', 'odrin'),
				),
			),
			'show_read_book_button_in_product' => array(
				'type'  => 'switch',
				'value' => true,
				'label' => esc_html__('Show Read the Book Button on Product Page', 'odrin'),
				'desc'  => esc_html__('Display the button next to the Add To Cart Button.', 'odrin'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('No', 'odrin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Yes', 'odrin'),
				),
			)
		)
	),
	'typography' => array(
		'title'   => esc_html__( 'Typography', 'odrin' ),
		'type'    => 'tab',
		'options' => array(
			'heading_font'  => array(
				'type'  => 'typography-v2',
				'value' => array(
					'family' => 'Cinzel Decorative',
					'variation'  => 'regular'
				),
				'components' => array(
					'family'         => true,
					'size'           => false,
					'line-height'    => false,
					'letter-spacing' => false,
					'color'          => false,
					),
				'label' => esc_html__('Heading Font', 'odrin'),
			),
			'subheading_font'  => array(
				'type'  => 'typography-v2',
				'value' => array(
					'family' => 'Gentium Book Basic',
					'variation'  => 'regular'
				),
				'components' => array(
					'family'         => true,
					'size'           => false,
					'line-height'    => false,
					'letter-spacing' => false,
					'color'          => false,
					),
				'label' => esc_html__('Subheading Font', 'odrin'),
			),
			'body_font'  => array(
				'type'  => 'typography-v2',
				'value' => array(
					'family' => 'Muli',
					'variation'  => 'regular'
				),
				'components' => array(
					'family'         => true,
					'size'           => false,
					'line-height'    => false,
					'letter-spacing' => false,
					'color'          => false,
					),
				'label' => esc_html__('Body Font', 'odrin'),
			),
		)
	),
	'social' => array(
		'title'   => esc_html__( 'Social', 'odrin' ),
		'type'    => 'tab',
		'options' => array( 
			'mailchimp_section' => array(
				'title'   => __( 'Mailchimp', 'odrin' ),
				'type'    => 'box',
				'options' => array(

					'mailchimp_api_key'    => array(
						'type'  => 'text',
						'label' => esc_html__( 'API Key', 'odrin' ),
						'desc'  => esc_html__( 'Write your Mailchimp API key.', 'odrin' ),
						'desc' => wp_kses_post(__('Write your Mailchimp API key. You can read more on how to acquire an API Key <a href="https://kb.mailchimp.com/integrations/api-integrations/about-api-keys#Find-or-Generate-Your-API-Key">here</a>.', 'odrin')),
						'value' => ''
					),
					'mailchimp_list_id' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Mailchimp Subscription List ID', 'odrin' ),
						'desc'  => esc_html__( 'The Mailchimp Subscription List ID that you want the users to be subscribed to. You can find it when you click your list in Mailchimp and go to Settings > List name and defaults.', 'odrin' ),
						'value' => ''
					),
					'mailchimp_double_opt_in' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Mailchimp Double Opt-In', 'odrin'),
						'desc' => esc_html__('Should the subscriber be asked via email to confirm the subscription.', 'odrin'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__('No', 'odrin'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__('Yes', 'odrin'),
						),
					),
				)
			), //mailchimp_section
		),
	), // social



);