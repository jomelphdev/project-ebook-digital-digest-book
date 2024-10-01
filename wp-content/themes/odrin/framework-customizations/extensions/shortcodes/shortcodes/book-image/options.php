<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/book-image');

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'layout' => array(
	    'type'  => 'image-picker',
	    'value' => 'layout_1',
	    'label' => esc_html__('Layout', 'odrin'),
	    'choices' => array(
	        'layout_1' => $uri .'/static/img/layout1.jpg',
	        'layout_2' => $uri .'/static/img/layout2.jpg',
	        'layout_3' => $uri .'/static/img/layout3.jpg',
	        'layout_4' => $uri .'/static/img/layout4.jpg',
	    ),
	    'blank' => false,
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
				'desc'  => esc_html__('Select between custom image or a Product Image.', 'odrin'),
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
				'size' => array(
					'type'    => 'group',
					'options' => array(
						'width'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Width', 'odrin' ),
							'desc'  => esc_html__( 'Set image width', 'odrin' ),
							'value' => 450
						),
						'height' => array(
							'type'  => 'text',
							'label' => esc_html__( 'Height', 'odrin' ),
							'desc'  => esc_html__( 'Set image height', 'odrin' ),
							'value' => ''
						)
					)
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
	'background_image' => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Background Image', 'odrin' ),
		'desc'  => esc_html__( 'The image that will be positioned behind your book.', 'odrin' )
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

