<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'custom_id' => array(
		'label'	=> esc_html__( 'Custom Section ID', 'odrin' ),
		'desc' => esc_html__( 'Add a Section ID, which can be used as a link from the navigation menu. For example: "about-me"', 'odrin' ),
		'type' 	=> 'text',
		'value' => '',
	),
	'padding' => array(
		'label'	=> esc_html__( 'Padding', 'odrin' ),
		'type' 	=> 'text',
		'value' => '100px 0px 100px 0px',
		'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content. For example 50px 20px 50px 20px', 'odrin' ),
	),
	'padding_mobile' => array(
		'label'	=> esc_html__( 'Mobile Padding', 'odrin' ),
		'type' 	=> 'text',
		'value' => '',
		'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content for mobile. For example 30px 10px 30px 10px', 'odrin' ),
	),
	'background_color_picker' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'background_color' => 'no',
		),
		'picker' => array(
			'background_color' => array(
				'type'  => 'switch',
				'value' => 'no',
				'label' => esc_html__('Background Color', 'odrin'),
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
				'background_color' => array(
					'label'  => esc_html__( 'Choose Color', 'odrin' ),
					'desc'  => esc_html__('Please select the background color', 'odrin'),
					'type'   => 'color-picker',
					'value' => '#ffffff'
					),
			)
		),
		'show_borders' => false,
	),
	'full_height' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'full_height' => 'no',
		),
		'picker' => array(
			'full_height' => array(
				'type'  => 'switch',
				'label' => esc_html__('Full Height', 'odrin'),
				'desc' => esc_html__( 'If enabled, will make the section take the full height of the viewport.', 'odrin' ),
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
				'vertical_center' => array(
					'type'  => 'switch',
					'value' => 'yes',
					'label' => esc_html__('Center Content Vertically', 'odrin'),
					'desc'  => esc_html__('Centers the items in the section vertically.', 'odrin'),
					'left-choice' => array(
						'value' => 'yes',
						'label' => esc_html__('Yes', 'odrin'),
					),
					'right-choice' => array(
						'value' => 'no',
						'label' => esc_html__('No', 'odrin'),
					),
				),
				'display_arrow' => array(
					'type'  => 'switch',
					'value' => 'yes',
					'label' => esc_html__('Display Arrow', 'odrin'),
					'desc'  => esc_html__('Display an arrow, which scrolls the section on click.', 'odrin'),
					'left-choice' => array(
						'value' => 'yes',
						'label' => esc_html__('Yes', 'odrin'),
					),
					'right-choice' => array(
						'value' => 'no',
						'label' => esc_html__('No', 'odrin'),
					),
				),
			)
		),
		'show_borders' => false,
	),
	'full_width' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Full Width', 'odrin'),
		'desc'  => esc_html__('If enabled, will remove the left and right padding of the columns in this section.', 'odrin'),
		'left-choice' => array(
			'value' => true,
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => false,
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'match_height' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Equal Columns Height', 'odrin'),
		'desc'  => esc_html__('Will make all inner columns heights equal to the highest one.', 'odrin'),
		'left-choice' => array(
			'value' => true,
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => false,
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'text_type' => array(
		'type'  => 'switch',
		'value' => 'dark',
		'label' => esc_html__('Text Color', 'odrin'),
		'desc' => esc_html__( 'Changes the text color of the elements in the section.', 'odrin' ),
		'left-choice' => array(
			'value' => 'light',
			'label' => esc_html__('Light', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'dark',
			'label' => esc_html__('Dark', 'odrin'),
		),
	),
	'background_image' => array(
		'label'   => esc_html__('Background Image', 'odrin'),
		'desc'    => esc_html__('Please select the background image', 'odrin'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'background_repeat' => array(
		'type'  => 'switch',
		'value' => 'no',
		'label' => esc_html__('Background Repeat', 'odrin'),
		'desc'    => esc_html__('Enable if your background is a repeatable pattern.', 'odrin'),
		'left-choice' => array(
			'value' => 'yes' ,
			'label' => esc_html__('Yes', 'odrin'),
			),
		'right-choice' => array(
			'value' => 'no',
			'label' => esc_html__('No', 'odrin'),
			),
	),
	'filter_image' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'filter_image' => 'no',
		),
		'picker' => array(
			'filter_image' => array(
				'type'  => 'switch',
				'label' => esc_html__('Filter', 'odrin'),
				'desc' => esc_html__( 'Color filter over the background image or video.', 'odrin' ),
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
				'filter_color' => array(
					'label'  => esc_html__( 'Filter Color', 'odrin' ),
					'type'   => 'color-picker',
					'value' => '#000',
					'desc'   => esc_html__( 'Apply a color for the filter on the image or video.', 'odrin' ),
					),
				'opacity' => array(
					'label'  => esc_html__( 'Filter Opacity', 'odrin' ),
					'type'   => 'slider',
					'value' => 50,
					'properties' => array(
						'min' => 0,
						'max' => 100,
						'sep' => 1,
						'grid_snap' => true
						)
					),
			)
		),
		'show_borders' => false,
	),
	'parallax' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Parallax Image', 'odrin'),
		'left-choice' => array(
			'value' => true,
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => false,
			'label' => esc_html__('No', 'odrin'),
		),
	),
	'video' => array(
		'label' => esc_html__('Background Video', 'odrin'),
		'desc'  => esc_html__('Insert Video URL to embed this video. Note that the video is not displayed on mobile, it uses the background image instead.', 'odrin'),
		'type'  => 'text',
	),
	'background_video_sound' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Background Video Sound', 'odrin'),
		'left-choice' => array(
			'value' => true,
			'label' => esc_html__('Yes', 'odrin'),
		),
		'right-choice' => array(
			'value' => false,
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
