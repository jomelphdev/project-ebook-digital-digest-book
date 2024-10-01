<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'label'  => array(
		'label' => esc_html__( 'Button Label', 'odrin' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'odrin' ),
		'type'  => 'text',
		'value' => esc_html__( 'Button', 'odrin' ),
	),
	'button_type' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'value' => array(
			'button_type_select' => 'normal_button',
		),
		'picker' => array(
			'button_type_select' => array(
				'type'  => 'switch',
				'value' => 'normal_button',
				'label' => esc_html__('Button Type', 'odrin'),
				'desc'  => esc_html__('Select between Normal button and a Product Button', 'odrin'),
				'left-choice' => array(
					'value' => 'normal_button',
					'label' => esc_html__('Normal', 'odrin'),
				),
				'right-choice' => array(
					'value' => 'product_button',
					'label' => esc_html__('Product', 'odrin'),
				),
			)
		),
		'choices' => array(
			'normal_button' => array(
				'link' => array(
					'label' => esc_html__( 'Button Link', 'odrin' ),
					'desc'  => esc_html__( 'Where should your button link to', 'odrin' ),
					'type'  => 'text',
					'value' => '#'
				),
				'target' => array(
					'type'  => 'switch',
					'label'   => esc_html__( 'Open Link in New Window', 'odrin' ),
					'desc'    => esc_html__( 'Select to open the linked page in a new window', 'odrin' ),
					'left-choice' => array(
						'value' => '_blank',
						'label' => esc_html__('Yes', 'odrin'),
					),
					'right-choice' => array(
						'value' => '_self',
						'label' => esc_html__('No', 'odrin'),
					),
				),
			),
			'product_button' => array(
				'product' => array(
					'label'  => esc_html__( 'Book', 'odrin' ),
					'desc'  => esc_html__( 'Select a Book to link to the button.', 'odrin' ),
					'type'   => 'select',
					'choices' => odrin_get_product_names(),
				),
				'product_button_type' => array(
					'type'  => 'select',
					'value' => 'buy',
					'label' => esc_html__('Button Link Type', 'odrin'),
					'desc'  => esc_html__( 'Select the Button functionality.', 'odrin' ),
					'choices' => array(
						'view_book' => esc_html__('View Book Button', 'odrin'),
						'add_to_cart' => esc_html__('Add To Cart Button', 'odrin'),
						'read_the_book' => esc_html__('Read The Book Button', 'odrin')
					)
				),
			)
		),
		'show_borders' => false,
	),
	'color' => array(
		'type'  => 'select',
		'value' => 'normal',
		'label' => esc_html__('Color', 'odrin'),
		'choices' => array(
			'normal' => esc_html__('Default', 'odrin'),
			'color' => esc_html__('Colored', 'odrin'),
			'success' => esc_html__('Success', 'odrin'),
			'info' => esc_html__('Info', 'odrin'),
			'danger' => esc_html__('Danger', 'odrin'),
			'warning' => esc_html__('Warning', 'odrin'),
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