<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'id'   => array( 'type' => 'unique' ),
	'type' => array(
		'type'  => 'switch',
		'value' => 'hello',
		'label' => esc_html__('Type', 'odrin'),
		'left-choice' => array(
			'value' => 'light',
			'label' => esc_html__('Light', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'color',
			'label' => esc_html__('Color', 'odrin'),
		),
	),
	'title' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Title', 'odrin'),
	),
	'subtitle' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Subtitle', 'odrin'),
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
				'first_letter_color' => array(
					'label'  => esc_html__( 'First Letter Color', 'odrin' ),
					'desc'  => esc_html__('Select the first letter color. Special First Letter has to be activated from Theme Settings.', 'odrin'),
					'type'   => 'color-picker',
					'value' => '#222'
				),
				'title_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 52,
						'line-height' => 73,
						'letter-spacing' => 2,
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
				'subtitle_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 12,
						'line-height' => 29,
						'letter-spacing' => 4,
						'color' => '#333'
					),
					'components' => array(
						'family'         => false,
						'size'           => true,
						'line-height'    => true,
						'letter-spacing' => true,
						'color'          => true
					),
					'label' => __('Subtitle Typography', 'odrin'),
					'desc'  => esc_html__('Specify the subtitle typography. Numbers are in pixels.', 'odrin'),
				),
				'subtitle_border' => array(
					'label'  => esc_html__( 'Subtitle Border', 'odrin' ),
					'desc'  => esc_html__('Select the subtitle border type.', 'odrin'),
					'type'   => 'select',
					'value' => 'dotted',
					'choices' => array(
						'none' => esc_html__('None', 'odrin'),
						'solid' => esc_html__('Solid', 'odrin'),
						'dashed' => esc_html__('Dashed', 'odrin'),
						'dotted' => esc_html__('Dotted', 'odrin'),
					)
				),
				'subtitle_border_color' => array(
					'label'  => esc_html__( 'Subtitle Border Color', 'odrin' ),
					'desc'  => esc_html__('Select the subtitle border color.', 'odrin'),
					'type'   => 'color-picker',
					'value' => '#333'
				),
			)
		),
		'show_borders' => false,
	),
	'text_content' => array(
		'type'  => 'wp-editor',
		'wpautop' => true,
		'shortcodes' => true,
		'value' => '',
		'label' => esc_html__('Content', 'odrin'),
		'reinit' => true,
	),
	'image' => array(
		'label'   => esc_html__('Image', 'odrin'),
		'desc'    => esc_html__('Please select the image', 'odrin'),
		'value'   => '',
		'type'    => 'upload',
		'images_only' => true,
	),
	'vertical_position' => array(
		'type'  => 'radio',
		'label' => esc_html__('Vertical Image Position', 'odrin'),
		'desc'    => esc_html__('Select which part of the image to be displayed with a priority.', 'odrin'),
		'value'   => 'center',
		'choices' => array(
			'top'  => esc_html__('Top', 'odrin'),
			'center' => esc_html__('Center', 'odrin'),
			'bottom'  => esc_html__('Bottom', 'odrin'),
			),
		'inline' => true,
	),
	'horizontal_position' => array(
		'type'  => 'radio',
		'label' => esc_html__('Horizontal Image Position', 'odrin'),
		'desc'    => esc_html__('Select which part of the image to be displayed with a priority.', 'odrin'),
		'value'   => 'center',
		'choices' => array(
			'left'  => esc_html__('Left', 'odrin'),
			'center' => esc_html__('Center', 'odrin'),
			'right'  => esc_html__('Right', 'odrin'),
			),
		'inline' => true,
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