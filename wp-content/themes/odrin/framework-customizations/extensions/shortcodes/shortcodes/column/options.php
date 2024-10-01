<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'custom_padding' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'custom_padding' => 'no',
		),
		'picker' => array(
			'custom_padding' => array(
				'type'  => 'switch',
				'value' => 'no',
				'label' => esc_html__('Custom Padding', 'odrin'),
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
				'padding' => array(
					'label'	=> esc_html__( 'Padding', 'odrin' ),
					'type' 	=> 'text',
					'value' => '0 25px 0 25px',
					'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content. For example 50px 20px 50px 20px', 'odrin' ),
					),
				'padding_mobile' => array(
					'label'	=> esc_html__( 'Mobile Padding', 'odrin' ),
					'type' 	=> 'text',
					'value' => '',
					'desc' => esc_html__( 'Specify the top, right, bottom and left padding around the content for mobile. For example 30px 10px 30px 10px', 'odrin' ),
					),
			)
		),
		'show_borders' => false,
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
	'text_position' => array(
		'type'  => 'select',
		'value' => 'left',
		'label' => esc_html__('Select Text and Buttons Position', 'odrin'),
		'choices' => array(
			'left' => esc_html__('Left', 'odrin'),
			'center' => esc_html__('Centered', 'odrin'),
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
);