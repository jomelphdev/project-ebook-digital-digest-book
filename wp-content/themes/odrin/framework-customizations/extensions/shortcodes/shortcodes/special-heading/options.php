<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'title'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Heading Title', 'odrin' ),
		'desc'  => esc_html__( 'Write the heading title content', 'odrin' ),
	),
	'subtitle' => array(
		'type'  => 'text',
		'label' => esc_html__( 'Heading Subtitle', 'odrin' ),
		'desc'  => esc_html__( 'Write the heading subtitle content', 'odrin' ),
	),
	'heading_color_picker' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'heading_color' => 'no',
		),
		'picker' => array(
			'heading_color' => array(
				'type'  => 'switch',
				'value' => 'no',
				'label' => esc_html__('Custom Heading Styling', 'odrin'),
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
					'desc'  => esc_html__('Select the first letter color', 'odrin'),
					'type'   => 'color-picker',
					'value' => '#222'
				),
				'title_color' => array(
					'label'  => esc_html__( 'Title Color', 'odrin' ),
					'desc'  => esc_html__('Select the title color', 'odrin'),
					'type'   => 'color-picker',
					'value' => '#222'
				),
				'title_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 64,
						'line-height' => 90,
						'letter-spacing' => 2
					),
					'components' => array(
						'family'         => false,
						'size'           => true,
						'line-height'    => true,
						'letter-spacing' => true,
						'color'          => false
					),
					'label' => __('Title Typography', 'odrin'),
					'desc'  => esc_html__('Specify the title typography. Numbers are in pixels.', 'odrin'),
				),
				'subtitle_typography' => array(
					'type' => 'typography-v2',
					'value' => array(
						'size' => 12,
						'line-height' => 29,
						'letter-spacing' => 4
					),
					'components' => array(
						'family'         => false,
						'size'           => true,
						'line-height'    => true,
						'letter-spacing' => true,
						'color'          => false
					),
					'label' => __('Subitle Typography', 'odrin'),
					'desc'  => esc_html__('Specify the subtitle typography. Numbers are in pixels.', 'odrin'),
				),
				'subtitle_color' => array(
					'label'  => esc_html__( 'Subtitle Color', 'odrin' ),
					'desc'  => esc_html__('Select the subtitle color', 'odrin'),
					'type'   => 'color-picker',
					'value' => '#333'
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
	'heading' => array(
		'type'    => 'select',
		'label'   => esc_html__('Heading Size', 'odrin'),
		'attr'  => array( 'class' => 'special-title'),
		'choices' => array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		)
	),
	'position' => array(
		'type'  => 'select',
		'value' => 'center',
		'label' => esc_html__('Select Heading Position', 'odrin'),
		'choices' => array(
			'center' => esc_html__('Centered', 'odrin'),
			'left' => esc_html__('Left', 'odrin'),
			'right' => esc_html__('Right', 'odrin'),
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