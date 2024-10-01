<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'id'   => array( 'type' => 'unique' ),
	'info' => array(
		'type'  => 'html',
		'label' => esc_html__('Notice:', 'odrin'),
		'html'  => __( '<strong>Important</strong> In order to use the Mailchimp Newsletter Shortcode you need to set the Mailchimp API Key and List ID in Appearance > Theme Settings > Social.', 'odrin' ),
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
	'text_content' => array(
		'type'  => 'textarea',
		'value' => '',
		'label' => esc_html__('Content', 'odrin'),
	),
	'position' => array(
		'type'  => 'select',
		'value' => 'center',
		'label' => esc_html__('Select Content Position', 'odrin'),
		'choices' => array(
			'center' => esc_html__('Centered', 'odrin'),
			'left' => esc_html__('Left', 'odrin'),
			'right' => esc_html__('Right', 'odrin'),
		)
	),
	'button_text' => array(
		'type'  => 'text',
		'value' => esc_html__('Subscribe', 'odrin'),
		'label' => esc_html__('Subscribe Button Text', 'odrin'),
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
				'desc'  => 'Animate element when it is scrolled in view.',
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