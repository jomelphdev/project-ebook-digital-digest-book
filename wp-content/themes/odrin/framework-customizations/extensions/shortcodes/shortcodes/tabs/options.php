<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs_style' => array(
		'type'  => 'switch',
		'value' => 'horizontal',
		'label' => esc_html__('Horizontal', 'odrin'),
		'desc'  => esc_html__('Select the style of the tabs.', 'odrin'),
		'left-choice' => array(
			'value' => 'horizontal',
			'label' => esc_html__('Horizontal', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'vertical',
			'label' => esc_html__('Vertical', 'odrin'),
		),
	),
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'odrin' ),
		'popup-title'   => esc_html__( 'Add/Edit Tab', 'odrin' ),
		'desc'          => esc_html__( 'Create your tabs', 'odrin' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'icon' => array(
				'type'  => 'icon-select',
				'value' => '',
				'label' => esc_html__('Select an Icon', 'odrin'),
			),
			'tab_title' => array(
				'type'  => 'text',
				'label' => esc_html__('Title', 'odrin')
			),
			'tab_content' => array(
				'type'   => 'wp-editor',
				'wpautop' => true,
				'shortcodes' => true,
				'label' => esc_html__('Content', 'odrin')
			)
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