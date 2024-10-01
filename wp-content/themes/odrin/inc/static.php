<?php if ( ! defined( 'ABSPATH' ) ) { die(); }
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */

// Font Awesome CSS
wp_enqueue_style(
	'fontawesome',
	get_template_directory_uri() . '/assets/css/font-awesome.min.css',
	array(),
	'1.0'
);

// Owl Carousel CSS
wp_enqueue_style(
	'owl-carousel',
	get_template_directory_uri() . '/assets/css/owl.carousel.min.css',
	array(),
	'1.0'
);

// ET-Line CSS
wp_enqueue_style(
	'et-line',
	get_template_directory_uri() . '/assets/css/et-line.css',
	array(),
	'1.0'
);


// animate CSS
wp_enqueue_style(
	'animatecss',
	get_template_directory_uri() . '/assets/css/animate.custom.css',
	array(),
	'1.0'
);


// simple Lightbox CSS
wp_enqueue_style(
	'simplelightbox',
	get_template_directory_uri() . '/assets/css/simpleLightbox.min.css',
	array(),
	'1.0'
);

// Perfect Scrollbar
wp_enqueue_style(
	'perfect-scrollbar',
	get_template_directory_uri() . '/assets/css/perfect-scrollbar.custom.css',
	array(),
	'1.0'
);

// bookBlock CSS
wp_enqueue_style(
	'bookblock',
	get_template_directory_uri() . '/assets/css/bookblock.css',
	array(),
	'1.0'
);


// Theme Styles
wp_enqueue_style(
	'odrin_master-css',
	get_template_directory_uri() . '/assets/css/master.css',
	array(),
	'1.0'
);

// Custom Styles
wp_enqueue_style(
	'odrin_custom-css',
	get_template_directory_uri() . '/assets/css/custom.css',
	array(),
	'1.0'
);

// Bootstrap JS
wp_enqueue_script(
	'bootstrap',
	get_template_directory_uri() . '/assets/js/bootstrap.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// ResizeSensor JS
wp_enqueue_script(
	'resize-sensor',
	get_template_directory_uri() . '/assets/js/ResizeSensor.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Throttledresize Resize JS
wp_enqueue_script(
	'jquery-throttledresize',
	get_template_directory_uri() . '/assets/js/jquery.throttledresize.js',
	array( 'jquery' ),
	'1.0',
	true
);

// WP Comment Reply
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

// matchHeight JS
wp_enqueue_script(
	'jquery-matchheight',
	get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// WOW JS
wp_enqueue_script(
	'wow-js',
	get_template_directory_uri() . '/assets/js/wow.min.js',
	array( 'jquery' ),
	'1.0',
	true
);


// Countdown JS
wp_enqueue_script(
	'countdown-js',
	get_template_directory_uri() . '/assets/js/jquery.countdown.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// simpleLightbox
wp_enqueue_script(
	'jquery-simplelightbox',
	get_template_directory_uri() . '/assets/js/simpleLightbox.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Isotope JS
wp_enqueue_script(
	'isotope',
	get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Slicknav JS
wp_enqueue_script(
	'jquery-slicknav',
	get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Owl Carousel
wp_enqueue_script(
	'owl-carousel',
	get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Sticky Kit
wp_enqueue_script(
	'sticky-kit',
	get_template_directory_uri() . '/assets/js/sticky-kit.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Perfect Scrollbar
wp_enqueue_script(
	'perfect-scrollbar',
	get_template_directory_uri() . '/assets/js/perfect-scrollbar.jquery.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Bookblock
wp_enqueue_script(
	'bookblock',
	get_template_directory_uri() . '/assets/js/jquery.bookblock.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

// jQuery++
wp_enqueue_script(
	'jqueryppcustom',
	get_template_directory_uri() . '/assets/js/jquerypp.custom.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Modernizr
wp_enqueue_script(
	'modernizr',
	get_template_directory_uri() . '/assets/js/modernizr.js',
	array( 'jquery' ),
	'1.0',
	false
);

if ( is_page_template( 'template-contact.php' ) || ( is_singular('event') ) ) {
	wp_enqueue_script(
		'ssd_gmapsapi', 
		'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key='. odrin_get_option('google_api'),
		'jquery',
		'1.0',
		false
		);

	wp_enqueue_script(
		'ssd_google-map-js',
		get_template_directory_uri() . '/assets/js/google-map.js',
		'jquery',
		'1.0',
		false
		);
}


// ImagesLoaded
wp_enqueue_script('imagesloaded');

// hoverIntent
wp_enqueue_script('hoverIntent');

// Custom scripts
wp_enqueue_script(
	'odrin_fw-theme-script',
	get_template_directory_uri() . '/assets/js/scripts.js',
	array( 'jquery' ),
	'1.0',
	true
);


// Localization
wp_localize_script( 'odrin_fw-theme-script', 'odrin', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce('ajax-nonce'),
		'month' => esc_html__('Month', 'odrin'),
		'months' => esc_html__('Months', 'odrin'),
		'day' => esc_html__('Day', 'odrin'),
		'days' => esc_html__('Days', 'odrin'),
		'showChapters' => esc_html__('Show Chapters', 'odrin'),
		'hideChapters' => esc_html__('Hide Chapters', 'odrin'),
		'loading' => esc_html__('Loading', 'odrin'),
	)
);