<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'book_image' => array(
		'type'  => 'upload',
		'images_only' => true,
		'value' => '',
		'label' => esc_html__('Book Image', 'odrin'),
	),
	'book_image_type' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'value' => array(
			'image_type_select' => 'custom_image',
		),
		'picker' => array(
			'image_type_select' => array(
				'type'  => 'switch',
				'value' => 'custom_image',
				'label' => esc_html__('Book Image Type', 'odrin'),
				'desc'  => esc_html__('Select between custom image or a Product Image. Note: Since Odrin 1.1.2 you can select between image and product(book).', 'odrin'),
				'left-choice' => array(
					'value' => 'custom_image',
					'label' => esc_html__('Custom Image', 'odrin'),
				),
				'right-choice' => array(
					'value' => 'product_image',
					'label' => esc_html__('Product Image', 'odrin'),
				),
			)
		),
		'choices' => array(
			'custom_image' => array(
				'book_image' => array(
					'type'  => 'upload',
					'images_only' => true,
					'label' => esc_html__( 'Book Image', 'odrin' ),
					'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'odrin' )
				),
				'page_flip_effect' => array(
					'type'  => 'multi-picker',
					'label' => false,
					'value' => array(
						'page_flip' => 'no',
						'yes' => array(
							'book_thickness' => 'thick'
						)
					),
					'picker' => array(
						'page_flip' => array(
							'type'  => 'switch',
							'value' => 'no',
							'label' => esc_html__( 'Add Page Flip Effect', 'odrin' ),
							'desc' => esc_html__( 'Add a rotating effect to the image.', 'odrin' ),
							'left-choice' => array(
								'value' => 'no',
								'label' => esc_html__('No', 'odrin'),
							),
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__('Yes', 'odrin'),
							),
						)
					),
					'choices' => array(
						'yes' => array(
							'book_thickness' => array(
								'type'  => 'select',
								'value' => 'thick',
								'label' => esc_html__('Book Thickness', 'odrin'),
								'choices' => array(
									'none' => esc_html__('None', 'odrin'),
									'thin' => esc_html__('Thin', 'odrin'),
									'normal' => esc_html__('Normal', 'odrin'),
									'thick' => esc_html__('Thick', 'odrin')
								)
							)
						)
					),
					'show_borders' => false,
				),
				'image-link-group' => array(
					'type'    => 'group',
					'options' => array(
						'link'   => array(
							'type'  => 'text',
							'label' => esc_html__( 'Image Link', 'odrin' ),
							'desc'  => esc_html__( 'Where should your image link to?', 'odrin' )
						),
						'target' => array(
							'type'         => 'switch',
							'label'        => esc_html__( 'Open Link in New Window', 'odrin' ),
							'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'odrin' ),
							'right-choice' => array(
								'value' => '_blank',
								'label' => esc_html__( 'Yes', 'odrin' ),
							),
							'left-choice'  => array(
								'value' => '_self',
								'label' => esc_html__( 'No', 'odrin' ),
							),
						),
					)
				)
			),
			'product_image' => array(
				'product' => array(
					'label'  => esc_html__( 'Book', 'odrin' ),
					'type'   => 'select',
					'choices' => odrin_get_product_names(),
				),
				'book_thickness' => array(
					'type'  => 'select',
					'value' => 'thick',
					'label' => esc_html__('Book Thickness', 'odrin'),
					'choices' => array(
						'none' => esc_html__('None', 'odrin'),
						'thin' => esc_html__('Thin', 'odrin'),
						'normal' => esc_html__('Normal', 'odrin'),
						'thick' => esc_html__('Thick', 'odrin')
					)
				),
				'show_read_book' => array(
					'type'         => 'switch',
					'label'        => esc_html__( 'Show Read The Book Button', 'odrin' ),
					'desc'         => esc_html__( 'Show Read The Book Button over the image.', 'odrin' ),
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'odrin' ),
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'odrin' ),
					),
				),
				'show_price' => array(
					'type'         => 'switch',
					'label'        => esc_html__( 'Show Price', 'odrin' ),
					'desc'         => esc_html__( 'Show Price over the image.', 'odrin' ),
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'odrin' ),
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'odrin' ),
					),
				),
			)
		),
		'show_borders' => false,
	),
	'content_background_color' => array(
		'label'  => esc_html__( 'Content Background Color', 'odrin' ),
		'desc'  => esc_html__('Leave empty for transparent', 'odrin'),
		'type'   => 'color-picker',
		'value' => '#f7f7fa'
	),
	'content_alignment' => array(
		'label'  => esc_html__( 'Content Text Alignment', 'odrin' ),
		'desc'  => esc_html__('Select the text alignment of the content.', 'odrin'),
		'type'   => 'select',
		'value' => 'center',
		'choices' => array(
			'left' => esc_html__('Left', 'odrin'),
			'center' => esc_html__('Centered', 'odrin'),
			'right' => esc_html__('Right', 'odrin'),
		)
	),
	'above_title_text' => array(
		'type'  => 'text',
		'value' => esc_html__('Coming Soon', 'odrin'),
		'label' => esc_html__('Above Title Text', 'odrin'),
	),
	'book_title' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Book Title', 'odrin'),
	),
	'book_short_description' => array(
		'type'  => 'wp-editor',
		'editor_height' => 400,
		'wpautop' => true,
		'value' => '',
		'shortcodes' => true,
		'label' => esc_html__('Book Short Description', 'odrin'),
	),
	'custom_styling_picker' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'custom_styling' => 'no',
		),
		'picker' => array(
			'custom_styling' => array(
				'type'  => 'switch',
				'value' => 'no',
				'label' => esc_html__('Custom Styling', 'odrin'),
				'desc'  => esc_html__('Enables more customization options.', 'odrin'),
				'left-choice' => array(
					'value' => 'yes' ,
					'label' => esc_html__('Yes', 'odrin'),
					),
				'right-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'odrin'),
					),
				),
		),
		'choices' => array(
			'yes' => array(
				'above_title_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 20,
						'line-height' => 33,
						'letter-spacing' => 12,
						'color' => '#222'
					),
					'components' => array(
						'family'         => false,
						'size'           => true,
						'line-height'    => true,
						'letter-spacing' => true,
						'color'          => true
					),
					'label' => __('Above Title Typography', 'odrin'),
					'desc'  => esc_html__('Specify the above title typography. Numbers are in pixels.', 'odrin'),
				),
				'title_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 46,
						'line-height' => 64,
						'letter-spacing' => 0,
						'color' => '#222'
					),
					'components' => array(
						'family'         => false,
						'size'           => true,
						'line-height'    => true,
						'letter-spacing' => true,
						'color'          => true
					),
					'label' => __('Book Title Typography', 'odrin'),
					'desc'  => esc_html__('Specify the book title typography. Numbers are in pixels.', 'odrin'),
				),
				'title_accent' => array(
					'type'  => 'switch',
					'value' => 'yes',
					'label' => esc_html__( 'Title Background Accent', 'odrin' ),
					'desc'  => esc_html__('Display the pattern accent behind the title.', 'odrin'),
					'left-choice' => array(
						'value' => 'yes' ,
						'label' => esc_html__('Yes', 'odrin'),
					),
					'right-choice' => array(
						'value' => 'no',
						'label' => esc_html__('No', 'odrin'),
					),
				),
				'countdown_number_size' => array(
					'label'  => esc_html__( 'Countdown Numbers Size', 'odrin' ),
					'desc'  => esc_html__('Select the font size of the countdown numbers.', 'odrin'),
					'type'   => 'slider',
					'properties' => array(	
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
					'value' => 76
				),
				'padding' => array(
					'label'	=> esc_html__( 'Content Padding', 'odrin' ),
					'type' 	=> 'text',
					'value' => '5% 6% 7% 8%',
					'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content. For example 50px 20px 50px 20px', 'odrin' ),
				),
				'padding_mobile' => array(
					'label'	=> esc_html__( 'Content Mobile Padding', 'odrin' ),
					'type' 	=> 'text',
					'value' => '5% 6% 6%',
					'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content for mobile. For example 30px 10px 30px 10px', 'odrin' ),
				),
			)
		),
		'show_borders' => false,
	),
	'show_countdown' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'show_countdown' => 'true',
		),
		'picker' => array(
			'show_countdown' => array(
				'label' => esc_html__('Show Countdown', 'odrin'),
				'desc' => esc_html__('Display a Countdown or text for the book release.', 'odrin'),
				'type'  => 'switch',
				'value'  => 'true',
				'left-choice' => array(
					'value' => 'true',
					'label' => esc_html__('Yes', 'odrin'),
				),
				'right-choice' => array(
					'value' => 'false',
					'label' => esc_html__('No', 'odrin'),
				),
			)
		),
		'choices' => array(
			'true' => array(
				'release_datetime' => array(
					'type'  => 'datetime-picker',
					'value' => '',
					'label' => esc_html__('Release Date', 'odrin'),
					'desc' => esc_html__('Enter the Release Date of the book.', 'odrin'),
					'datetime-picker' => array(
						'format'      => 'd-m-Y H:i',
						'maxDate'     => false,
						'minDate'     => true,
						'timepicker'  => true,
						'datepicker'  => true,
						'defaultTime' => '12:00'
					),
				),
				'expired_text' => array(
					'type'  => 'wp-editor',
					'wpautop' => true,
					'shortcodes' => true,
					'value' => esc_html__('OUT NOW', 'odrin'),
					'label' => esc_html__('Expired Text', 'odrin'),
					'desc' => esc_html__('Enter the text that will be displayed when the timer expires.', 'odrin'),
				),
			),
			'false' => array(
				'release_text' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__('Release Date Text', 'odrin'),
					'desc' => esc_html__('Enter text for the Release Date of the book.', 'odrin'),
				),
			),
		)
	),
	'hide_on_desktop' => array(
		'type'  => 'switch',
		'value' => 'false',
		'label' => esc_html__('Hide on Desktop', 'odrin'),
		'desc' => esc_html__('Hide the shortcode when the display width is higher or equal to 991px', 'odrin'),
		'left-choice' => array(
			'value' => 'true',
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'false',
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'hide_on_mobile' => array(
		'type'  => 'switch',
		'value' => 'false',
		'label' => esc_html__('Hide on Mobile', 'odrin'),
		'desc' => esc_html__('Hide the shortcode when the display width is lower than 991px', 'odrin'),
		'left-choice' => array(
			'value' => 'true',
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'false',
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'animation_on_scroll' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'value' => array(
			'animation_enable' => 'no',
			'yes' => array(
				'animation_type' => 'fadeIn'
				)
			),
		'picker' => array(
			'animation_enable' => array(
				'type'  => 'switch',
				'value' => 'yes',
				'label' => esc_html__('Animation on Scroll', 'odrin'),
				'desc'  => esc_html__('Animate element when it is scrolled in view.', 'odrin'),
				'left-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'odrin'),
					),
				'right-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'odrin'),
					),
				)
			),
		'choices' => array(
			'yes' => array(
				'animation_type' => array(
					'type'  => 'select',
					'value' => 'fadeIn',
					'label' => esc_html__('Animation Type', 'odrin'),
					'choices' => array(
						'fadeIn' => esc_html__('fadeIn', 'odrin'),
						'fadeInUp' => esc_html__('fadeInUp', 'odrin'),
						'fadeInLeft' => esc_html__('fadeInLeft', 'odrin'),
						'fadeInRight' => esc_html__('fadeInRight', 'odrin'),
						'fadeInDown' => esc_html__('fadeInDown', 'odrin'),
						'flipInX' => esc_html__('flipInX', 'odrin'),
						'flipInY' => esc_html__('flipInY', 'odrin'),
						'zoomIn' => esc_html__('zoomIn', 'odrin')
					)
				),
				'animation_delay' => array(
					'type'  => 'text',
					'value' => 0,
					'label' => esc_html__('Delay (in miliseconds)', 'odrin'),
				)
			)
		),
		'show_borders' => false,
	),
);
