<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'content_slider' => array(
		'type'  => 'addable-box',
		'label' => esc_html__('Item', 'odrin'),
		'desc'  => esc_html__('Add an Item', 'odrin'),
		'box-options' => array(
			'item_image' => array( 
				'type'  => 'upload',
				'images_only' => true,
				'value' => '',
				'label' => esc_html__('Image', 'odrin'),
			),
			'item_title' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Heading Title', 'odrin'),
			),
			'item_subtitle' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Heading Subtitle', 'odrin'),
			),
			'item_content' => array(
				'type'  => 'wp-editor',
				'value' => '',
				'editor_height' => 400,
				'wpautop' => true,
				'shortcodes' => true,
				'editor_type' => false,
				'label' => esc_html__('Item Content', 'odrin'),
			),
		),
		'template' => '{{- item_title }}',
		'limit' => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__('Add Item', 'odrin'),
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
						'size' => 40,
						'line-height' => 62,
						'letter-spacing' => 1,
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
						'size' => 13,
						'line-height' => 24,
						'letter-spacing' => 1,
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
				'subtitle_accent' => array(
					'type'  => 'switch',
					'value' => 'yes',
					'label' => esc_html__( 'Subtitle Accent Line', 'odrin' ),
					'desc'  => esc_html__('Display accent line before the subtitle.', 'odrin'),
					'left-choice' => array(
						'value' => 'yes' ,
						'label' => esc_html__('Yes', 'odrin'),
					),
					'right-choice' => array(
						'value' => 'no',
						'label' => esc_html__('No', 'odrin'),
					),
				),
				'subtitle_border' => array(
					'label'  => esc_html__( 'Subtitle Border', 'odrin' ),
					'desc'  => esc_html__('Select the subtitle border type.', 'odrin'),
					'type'   => 'select',
					'value' => 'none',
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
				'padding' => array(
					'label'	=> esc_html__( 'Content Padding', 'odrin' ),
					'type' 	=> 'text',
					'value' => '30px 5% 0 13%',
					'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content. For example 50px 20px 50px 20px', 'odrin' ),
				),
				'padding_mobile' => array(
					'label'	=> esc_html__( 'Content Mobile Padding', 'odrin' ),
					'type' 	=> 'text',
					'value' => '30px 6% 0',
					'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content for mobile. For example 30px 10px 30px 10px', 'odrin' ),
				),
			)
		),
		'show_borders' => false,
	),
	'images_lightbox' => array(
		'type'  => 'switch',
		'value' => 'false',
		'label' => esc_html__('Enable Images Lightbox', 'odrin'),
		'desc'  => esc_html__('Open images in a lightbox on click.', 'odrin'),
		'left-choice' => array(
			'value' => 'true',
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'false',
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'auto_height' => array(
		'type'  => 'switch',
		'value' => "false",
		'label' => esc_html__('Slider Auto-Height', 'odrin'),
		'desc'  => esc_html__('Dinamically change each slider height, depending on the content height.', 'odrin'),
		'left-choice' => array(
			'value' => "true",
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => "false",
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'equal_height' => array(
		'type'  => 'switch',
		'value' => "true",
		'label' => esc_html__('Equal Image and Content Height', 'odrin'),
		'desc'  => esc_html__('Make the content and image of equal height.', 'odrin'),
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