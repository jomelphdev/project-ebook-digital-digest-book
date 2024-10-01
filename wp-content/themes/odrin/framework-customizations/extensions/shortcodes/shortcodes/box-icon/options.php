<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'box_style' => array(
		'type'  => 'switch',
		'value' => 'vertical',
		'label' => esc_html__('Box Style', 'odrin'),
		'desc'  => esc_html__('Choose between horizontal and vertical layout.', 'odrin'),
		'left-choice' => array(
			'value' => 'horizontal',
			'label' => esc_html__('Horizontal', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'vertical',
			'label' => esc_html__('Vertical', 'odrin'),
		),
	),
	'icon' => array(
		'type'  => 'icon-select',
		'value' => '',
		'label' => esc_html__('Select an Icon', 'odrin'),
	),
	'box_title' => array( 
		'type' => 'text' ,
		'label' => esc_html__('Box Title', 'odrin'),
	),
	'box_content' => array( 
		'type' => 'textarea' ,
		'label' => esc_html__('Box Content', 'odrin'),
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
				'icon_size' => array(
					'label'  => esc_html__( 'Icon Size', 'odrin' ),
					'desc'  => esc_html__('Select the icon size.', 'odrin'),
					'type'   => 'slider',
					'properties' => array(	
						'min' => 0,
						'max' => 150,
						'step' => 1,
					),
					'value' => 90
				),
				'icon_color' => array(
					'label'  => esc_html__( 'Icon Color', 'odrin' ),
					'desc'  => esc_html__('Select the icon color', 'odrin'),
					'type'   => 'color-picker',
					'value' => '#222'
				),
				'title_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 28,
						'line-height' => 39,
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
					'label' => __('Title Typography', 'odrin'),
					'desc'  => esc_html__('Specify the title typography. Numbers are in pixels.', 'odrin'),
				),
				'content_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 16,
						'line-height' => 29,
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
					'desc'  => esc_html__('Specify the content typography. Numbers are in pixels.', 'odrin'),
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