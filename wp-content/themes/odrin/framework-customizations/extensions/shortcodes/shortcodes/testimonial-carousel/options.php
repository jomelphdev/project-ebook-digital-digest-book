<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'testimonial_carousel' => array(
		'type'  => 'addable-box',
		'label' => esc_html__('Testimonial', 'odrin'),
		'desc'  => esc_html__('Add a Testimonial', 'odrin'),
		'box-options' => array(
			'testimonial_text' => array( 
				'type' => 'textarea',
				'value' => '',
				'label' => esc_html__('Testimonial Text', 'odrin'),
			),
			'testimonial_author' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Name', 'odrin'),
			),
			'testimonial_company' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Company Name', 'odrin'),
			),
			'testimonial_link' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Testimonial URL', 'odrin'),
			),
		),
	'template' => '{{- testimonial_author }}',
	'limit' => 0, // limit the number of boxes that can be added
	'add-button-text' => esc_html__('Add Testimonial', 'odrin'),
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
				'name_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 14,
						'line-height' => 29,
						'letter-spacing' => 0.7,
						'color' => '#222'
					),
					'components' => array(
						'family'         => false,
						'size'           => true,
						'line-height'    => true,
						'letter-spacing' => true,
						'color'          => true
					),
					'label' => __('Name Typography', 'odrin'),
					'desc'  => esc_html__('Specify the name typography. Numbers are in pixels.', 'odrin'),
				),
				'company_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 13,
						'line-height' => 29,
						'letter-spacing' => 0.65,
						'color' => '#222'
					),
					'components' => array(
						'family'         => false,
						'size'           => true,
						'line-height'    => true,
						'letter-spacing' => true,
						'color'          => true
					),
					'label' => __('Company Typography', 'odrin'),
					'desc'  => esc_html__('Specify the company typography. Numbers are in pixels.', 'odrin'),
				),
				'content_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 24,
						'line-height' => 40,
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
					'label' => __('Content Typography', 'odrin'),
					'desc'  => esc_html__('Specify the content typography. Numbers are in pixels.', 'odrin'),
				),
				'padding' => array(
					'label'	=> esc_html__( 'Content Padding', 'odrin' ),
					'type' 	=> 'text',
					'value' => '40px 10% 50px',
					'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content. For example 50px 20px 50px 20px', 'odrin' ),
				),
				'padding_mobile' => array(
					'label'	=> esc_html__( 'Content Mobile Padding', 'odrin' ),
					'type' 	=> 'text',
					'value' => '',
					'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content for mobile. For example 30px 10px 30px 10px', 'odrin' ),
				),
			)
		),
		'show_borders' => false,
	),
	'auto_height' => array(
		'type'  => 'switch',
		'value' => "false",
		'label' => esc_html__('Carousel Auto-Height', 'odrin'),
		'left-choice' => array(
			'value' => "true",
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => "false",
			'label' => esc_html__('No', 'odrin'),
		),
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