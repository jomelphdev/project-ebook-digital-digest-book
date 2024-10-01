<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'id'   => array( 'type' => 'unique' ),
	'posts_number' => array(
		'type'  => 'slider',
		'value' => 3,
		'label' => esc_html__('Number of Posts To Show', 'odrin'),
		'desc' => esc_html__('Select -1 for unlimited.', 'odrin'),
		'properties' => array(  
			'min' => -1,
			'max' => 12,
			'step' => 1,
			'grid_snap' => true
		)
	),
	'columns_number' => array(
		'type'  => 'slider',
		'value' => 3,
		'label' => esc_html__('Number of Columns', 'odrin'),
		'desc' => esc_html__('Select the number of columns for the Posts.', 'odrin'),
		'properties' => array(  
			'min' => 1,
			'max' => 3,
			'step' => 1,
			'grid_snap' => true
		)
	),
	'blog_styling_picker' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'value' => array(
			'blog_styling' => 'default',
			'events_styling' => array(
				'display_date' => true,
				'display_categories' => true
			),
			'default' => array(
				'crop_images' => false
			)
		),
		'picker' => array(
			'blog_styling' => array(
				'type'  => 'select',
				'value' => 'default',
				'label' => esc_html__('Blog Style', 'odrin'),
				'desc' => esc_html__('Choose the layout of the shortcode.', 'odrin'),
				'choices' => array(
					'default' => esc_html__('Default', 'odrin'),
					'events_styling' => esc_html__('Events Styling', 'odrin'),
				)
			),
		),
		'choices' => array(
			'events_styling' => array(
				'display_date' => array(
					'type'  => 'checkbox',
					'value' => true,
					'label' => esc_html__('Display Post Date', 'odrin'),
				),
				'display_categories' => array(
					'type'  => 'checkbox',
					'value' => true,
					'label' => esc_html__('Display Post Categories', 'odrin'),
				),
			),
			'default' => array(
				'crop_images' => array(
					'type'  => 'checkbox',
					'value' => false,
					'label' => esc_html__('Crop and Align Images', 'odrin'),
				),
				'show_excerpt' => array(
					'type'  => 'checkbox',
					'value' => false,
					'label' => esc_html__('Show Excerpt', 'odrin'),
				),
				'title_alignment' => array(
					'label'  => esc_html__( 'Title Text Alignment', 'odrin' ),
					'desc'  => esc_html__('Select the text alignment of the title.', 'odrin'),
					'type'   => 'select',
					'value' => 'center',
					'choices' => array(
						'left' => esc_html__('Left', 'odrin'),
						'center' => esc_html__('Centered', 'odrin'),
						'right' => esc_html__('Right', 'odrin'),
					)
				),
				'excerpt_alignment' => array(
					'label'  => esc_html__( 'Excerpt Text Alignment', 'odrin' ),
					'desc'  => esc_html__('Select the text alignment of the excerpt.', 'odrin'),
					'type'   => 'select',
					'value' => 'center',
					'choices' => array(
						'left' => esc_html__('Left', 'odrin'),
						'center' => esc_html__('Centered', 'odrin'),
						'right' => esc_html__('Right', 'odrin'),
					)
				),
				'more_alignment' => array(
					'label'  => esc_html__( 'Read More Alignment', 'odrin' ),
					'desc'  => esc_html__('Select the Read More button alignment.', 'odrin'),
					'type'   => 'select',
					'value' => 'center',
					'choices' => array(
						'left' => esc_html__('Left', 'odrin'),
						'center' => esc_html__('Centered', 'odrin'),
						'right' => esc_html__('Right', 'odrin'),
					)
				),
			)
		),
		'show_borders' => false,
	),
	'hide_show_categories' => array(
		'type'  => 'switch',
		'value' => 'hide',
		'label' => esc_html__('Hide or Show Specific Categories', 'odrin'),
		'desc' => esc_html__('Select to Hide or Show the selected Specific Categories.', 'odrin'),
		'left-choice' => array(
			'value' => 'hide',
			'label' => esc_html__('Hide', 'odrin'),
		),
		'right-choice' => array(
			'value' => 'show',
			'label' => esc_html__('Show', 'odrin'),
		),
	),
	'hide_categories' => array(
	    'label' => esc_html__('Specific Categories', 'odrin'),
	    'desc'  => esc_html__('The specific categories to show or hide.', 'odrin'),
		'type'   => 'addable-option',
		'option' => array(
			'type'  => 'multi-select',
			'population' => 'taxonomy',
	    	'source' => 'category',
	    	'prepopulate' => false,
			'limit' => 1,
		),
	),
	'view_all' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'view_all' => 'true',
		),
		'picker' => array(
			'view_all' => array(
				'label' => esc_html__('View All', 'odrin'),
				'desc' => esc_html__('Display View All button.', 'odrin'),
				'type'  => 'switch',
				'left-choice' => array(
					'value' => 'true',
					'label' => esc_html__('Yes', 'odrin'),
				),
				'right-choice' => array(
					'value' => 'false',
					'label' => esc_html__('No', 'odrin'),
				),
			)
		),
		'choices' => array(
			'true' => array(
				'label' => array(
					'type'  => 'text',
					'label' => esc_html__('View All Button Label', 'odrin'),
					'value' => esc_html__('View All', 'odrin'),
					'desc' => wp_kses_post(__('<strong>Important</strong> Make sure than you have published one page that uses the Page Template "Blog".', 'odrin')),
				),
			),
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