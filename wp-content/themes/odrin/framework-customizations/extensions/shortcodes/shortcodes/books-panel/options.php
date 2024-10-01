<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'id'   => array( 'type' => 'unique' ),
	'books' => array(
		'label'  => esc_html__( 'Books', 'odrin' ),
		'type'   => 'addable-option',
		'option' => array(
			'type'  => 'multi-select',
			'population' => 'array',
			'choices' => odrin_get_product_names(),
			'prepopulate' => false,
			'limit' => 1,
			),
		'desc'   => esc_html__( 'Add Books that will appear in the carousel.', 'odrin' ),
	),
	'book_thickness' => array(
		'type'  => 'select',
		'value' => 'normal',
		'label' => esc_html__('Book Thickness', 'odrin'),
		'choices' => array(
			'none' => esc_html__('None', 'odrin'),
			'thin' => esc_html__('Thin', 'odrin'),
			'normal' => esc_html__('Normal', 'odrin'),
			'thick' => esc_html__('Thick', 'odrin')
		)
	),
	'show_read_book' => array(
		'type'  => 'switch',
		'value' => 'false',
		'label' => esc_html__('Show Read The Book Button', 'odrin'),
		'desc' => esc_html__('Show Read The Book Button in Book Description', 'odrin'),
		'left-choice' => array(
			'value' => 'true',
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'false',
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'show_add_to_cart' => array(
		'type'  => 'switch',
		'value' => 'false',
		'label' => esc_html__('Show Add to Cart Button', 'odrin'),
		'desc' => esc_html__('Show Add to Cart Button in Book Description', 'odrin'),
		'left-choice' => array(
			'value' => 'true',
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'false',
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'columns' => array(
	    'type'  => 'slider',
	    'value' => 3,
	    'properties' => array(  
	        'min' => 2,
	        'max' => 3,
	        'step' => 1,
	        'grid_snap' => true
	    ),
	    'label' => esc_html__('Columns', 'odrin'),
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
				'column_spacing' => array(
					'label'  => esc_html__( 'Column Spacing', 'odrin' ),
					'desc'  => esc_html__('Select the column spacing between items.', 'odrin'),
					'type'   => 'slider',
					'properties' => array(	
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
					'value' => 25
				),
				'row_spacing' => array(
					'label'  => esc_html__( 'Row Spacing', 'odrin' ),
					'desc'  => esc_html__('Select the row spacing between items.', 'odrin'),
					'type'   => 'slider',
					'properties' => array(	
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
					'value' => 50
				),
				'book_thumb_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 16,
						'line-height' => 22,
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
					'label' => __('Book Thumbnail Typography', 'odrin'),
					'desc'  => esc_html__('Specify the book thumbnail title typography. Numbers are in pixels.', 'odrin'),
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
			)
		),
		'show_borders' => false,
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