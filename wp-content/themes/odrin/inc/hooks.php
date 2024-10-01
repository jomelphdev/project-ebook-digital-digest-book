<?php if ( ! defined( 'ABSPATH' ) ) { die( ); }


/**
 * Filters and Actions
 */

add_action( 'init', '_action_odrin_theme_setup');

if ( ! function_exists( '_action_odrin_theme_setup' ) ) {
	function _action_odrin_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'odrin', get_template_directory() . '/lang' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_image_size( 'odrin_landscape_small', 300, 225, true );
		add_image_size( 'odrin_landscape_medium', 1000, 600, true );
		add_image_size( 'odrin_landscape_large', 2000, 1100, true );
		add_image_size( 'odrin_landscape_wide', 1500, 300, true );
		add_image_size( 'odrin_square_small', 100, 100, true );
		add_image_size( 'odrin_portrait', 400, 550, true );
		add_image_size( 'odrin_small_soft', 400, 400, false );
		add_image_size( 'odrin_medium', 700, 700, true );
		add_image_size( 'odrin_medium_soft', 700, 700, false );
		add_image_size( 'odrin_large', 1300, 1300, true );
		add_image_size( 'odrin_large_soft', 1300, 1300, false );

		set_post_thumbnail_size( 50, 50, true );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
			) );
	}
}

add_action( 'admin_init', '_action_odrin_theme_admin_setup' );

if ( ! function_exists( '_action_odrin_theme_admin_setup' ) ) {
	function _action_odrin_theme_admin_setup() {
		add_editor_style();
	}
}

/**
*  Declare theme supports. These are used by the Subsolar Designs Extras plugin to
*  register the needed custom post types and widgets for the theme. If the plugin is activated
* on non-Subsolar Designs theme, it will activate everything.
*/

if(!( function_exists('_action_odrin_declare_theme_support') )){

	add_action('after_setup_theme', '_action_odrin_declare_theme_support', 10);

	function _action_odrin_declare_theme_support() {
		add_theme_support('subsolar-theme');
		add_theme_support('subsolar-event');
	}
}

/**
 * Register widget areas.
 */
if(!( function_exists('_action_odrin_theme_widgets_init') )){
	function _action_odrin_theme_widgets_init() {
		// Sidebars
		register_sidebar(
			array(
				'id' => 'main-sidebar',
				'name' => esc_html__( 'Main Sidebar', 'odrin' ),
				'description' => esc_html__( 'Add a sidebar for the blog and blog posts.', 'odrin' ),
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title'  => '<h3 class="widget-title dash-left">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'id' => 'shop-sidebar',
				'name' => esc_html__( 'Shop Sidebar', 'odrin' ),
				'description' => esc_html__( 'Add a sidebar for the WooCommerce Shop Page.', 'odrin' ),
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title'  => '<h3 class="widget-title  dash-left">',
				'after_title'   => '</h3>',
			)
		);

		// Footer Columns
		register_sidebar(
			array(
				'id' => 'footer1',
				'name' => esc_html__( 'Footer Column 1', 'odrin' ),
				'description' => esc_html__( 'If this is set, your footer will be 1 column', 'odrin' ),
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				)
			);
		register_sidebar(
			array(
				'id' => 'footer2',
				'name' => esc_html__( 'Footer Column 2', 'odrin' ),
				'description' => esc_html__( 'If this and Footer Column 1 are set, your footer will be 2 columns.', 'odrin' ),
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				)
			);	
		register_sidebar(
			array(
				'id' => 'footer3',
				'name' => esc_html__( 'Footer Column 3', 'odrin' ),
				'description' => esc_html__( 'If this Footer Column 1 and Footer Column 2 are set, your footer will be 3 columns.', 'odrin' ),
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				)
			);
		register_sidebar(
			array(
				'id' => 'footer4',
				'name' => esc_html__( 'Footer Column 4', 'odrin' ),
				'description' => esc_html__( 'If this Footer Column 1, Footer Column 2 and Footer Column 3 are set, your footer will be 4 columns.', 'odrin' ),
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				)
			);
	}
}


add_action( 'widgets_init', '_action_odrin_theme_widgets_init' );


/**
 *  Hide not needed Unyson Extensions
 */

if (defined('FW')) {

	add_action('admin_print_scripts', '_action_odrin_hide_extensions_from_the_list');
	
	if( !function_exists('_action_odrin_hide_extensions_from_the_list') ) {
		
		function _action_odrin_hide_extensions_from_the_list() {
			if (fw_current_screen_match(array('only' => array('id' => 'toplevel_page_fw-extensions')))) {
				echo '
				<style type="text/css">
			#fw-ext-analytics, #fw-ext-megamenu, #fw-ext-portfolio, #fw-ext-styling, #fw-ext-seo, #fw-ext-feedback, #fw-ext-events, #fw-ext-learning, #fw-ext-social, #fw-ext-translation, #fw-ext-slider, #fw-ext-sidebars, #fw-ext-breadcrumbs { display: none !important; }
				</style>';
			}
		}

	}

}

if (defined('FW')) {

	add_filter( 'fw_github_api_url', '_filter_odrin_unyson_github_api_url', 999 );

	if( !function_exists('_filter_odrin_unyson_github_api_url') ) {
		function _filter_odrin_unyson_github_api_url( $url ) {
			return 'https://api.github.com';
		}
	}

}
/**
*  Unyson Builder Templates
*/

add_filter(
    'fw_ext_builder:predefined_templates:page-builder:full',
    '_filter_odrin_page_builder_predefined_templates_full'
);

if( !function_exists('_filter_odrin_page_builder_predefined_templates_full') ) {

	function _filter_odrin_page_builder_predefined_templates_full($templates) {

		$variables = fw_get_variables_from_file(
			get_template_directory() .'/inc/includes/builder-templates/full.php',
			array('templates' => array())
			);

		return array_merge($templates, $variables['templates']);
	}
}


/**
 *  Remove default sliders from Slider Extension
 */

add_filter( 'fw_ext_backup_after_import_demo_content' , '_filter_odrin_theme_flush_rewrite');

if( !function_exists('_filter_odrin_theme_flush_rewrite') ) {
	function _filter_odrin_theme_flush_rewrite(){ 

		flush_rewrite_rules() ;
	}
}

/**
 *  Remove default Shortcodes
 */

if ( defined('FW') ) {

	add_filter('fw_ext_shortcodes_disable_shortcodes', '_filter_odrin_disable_default_shortcodes');

	if( !function_exists('_filter_odrin_disable_default_shortcodes') ) {

		function _filter_odrin_disable_default_shortcodes($to_disable) {
			$to_disable = array( 'calendar', 'testimonials', 'contact_form', 'table', 'icon_box', 'icon',  'call_to_action', 'team_member');
			return $to_disable;
		}

	}

}


/**
*  ACF Save JSON
*/

add_filter('acf/settings/save_json', '_filter_ssd_acf_json_save_point');

if( !( function_exists('_filter_ssd_acf_json_save_point')) ){
	function _filter_ssd_acf_json_save_point( $path ) {

		$path = get_template_directory() . '/acf-json';
		return $path;

	}
}


/**
*  ACF Load JSON
*/

add_filter('acf/settings/load_json', '_filter_ssd_acf_json_load_point');

if( !( function_exists('_filter_ssd_acf_json_load_point')) ){
	function _filter_ssd_acf_json_load_point( $paths ) {

		unset($paths[0]);
		$paths[] = get_template_directory() . '/acf-json';
		return $paths;

	}
}


/**
*  ACF Show in Admin
*/

// add_filter('acf/settings/show_admin', '__return_false');

/**
*  ACF Show Updates
*/

add_filter('acf/settings/show_updates', '__return_false');

/**
*  ACF Localization
*/

add_filter('acf/settings/l10n_textdomain', '_filter_odrin_acf_localization');

if( !function_exists('_filter_odrin_acf_localization') ) {

	function _filter_odrin_acf_localization() {
		return 'odrin';
	}
}

add_filter('acf/settings/l10n_field', '_filter_odrin_acf_localization_fields');

if( !function_exists('_filter_odrin_acf_localization_fields') ) {

	function _filter_odrin_acf_localization_fields() {
		return array('label', 'instructions', 'choices', 'message');
	}
}

/**
*  ACF Google Maps API
*/

add_action('acf/init', '_action_odrin_acf_google_api_key');

if( !( function_exists('_action_odrin_acf_google_api_key')) ){
	function _action_odrin_acf_google_api_key() {
		acf_update_setting('google_api_key', odrin_get_option('google_api'));
	}
}

/**
*  ACF Dynamic Fields
*/

add_filter('acf/load_field/name=contact_form_7_shortcode', '_action_odrin_acf_load_field');

if( !( function_exists('_action_odrin_acf_load_field')) ){
	function _action_odrin_acf_load_field($field) {

		if ( class_exists('WPCF7_ContactForm') ) {
			$field['instructions'] = wp_kses_post(__( 'Insert your Contact Form 7 shortcode. You can create one in ', 'odrin' ) . '<a href="'. admin_url('admin.php?page=wpcf7') . '">Contact > Contact Forms</a>');
		} else {
			$field['instructions'] = wp_kses_post(__( '<strong>It seems Contact Form 7 plugin is not installed!</strong> Please install and activate it to use this field.', 'odrin'));
		}

		return $field;
	}
}

/**
*  Unyson Datetime Dequeue
*/
add_action( 'wp_print_scripts', '_action_odrin_unyson_dequeue_datetime', 40 );

if( !( function_exists('_action_odrin_unyson_dequeue_datetime')) ){
	function _action_odrin_unyson_dequeue_datetime() {
		if ( function_exists('get_current_screen')) {  
			global $pagenow;
			$screen = get_current_screen();

			if ( $pagenow == 'post.php' && $screen->post_type != 'event' ) {
				return;
			}

			wp_dequeue_script( 'fw-option-datetime-picker-lib-js');
			wp_dequeue_script( 'fw-option-datetime-picker-main-js');
		}
	}
}

/**
*  Unyson Icon Select Field
*/

add_action('fw_option_types_init', '_action_odrin_include_custom_option_types');

if( !function_exists('_action_odrin_include_custom_option_types') ) {

	function _action_odrin_include_custom_option_types() {
		require_once get_theme_file_path('/inc/includes/option-types/icon-select/class-fw-option-type-icon-select.php');
	}

}

/**
*  Unyson Fix Session Already Started
*/

remove_action( 'current_screen', '_action_fw_flash_message_backend_prepare', 9999 );
add_action( 'current_screen', '_action_odrin_flash_message_backend_prepare', 9999 );

if( !function_exists('_action_odrin_flash_message_backend_prepare') ) {

	function _action_odrin_flash_message_backend_prepare() {
		if ( apply_filters( 'fw_use_sessions', true ) && ! session_id()  ) {
			// We close the session just after reading the information to avoid loopback error.	
			session_start(['read_and_close' => true, ]); 
		}
	}

}

remove_action( 'send_headers', '_action_fw_flash_message_frontend_prepare', 9999 );
add_action( 'send_headers', '_action_odrin_flash_message_frontend_prepare', 9999 );

if( !function_exists('_action_odrin_flash_message_frontend_prepare') ) {

	function _action_odrin_flash_message_frontend_prepare() {
		if (
			apply_filters( 'fw_use_sessions', true )
			&&
			/**
			 * In ajax it's not possible to call flash message after headers were sent,
			 * so there will be no "headers already sent" warning.
			 * Also in the Backups extension, are made many internal ajax request,
			 * each creating a new independent request that don't remember/use session cookie from previous request,
			 * thus on server side are created many (not used) new sessions.
			 */
			! ( defined( 'DOING_AJAX' ) && DOING_AJAX )
			&&
			! session_id()
		) {
			session_start();
		}
	}

}

/**
*  ACF Sanitization
*/

// add_filter('acf/update_value/type=wysiwyg', '_filter_odrin_acf_update_value', 10, 3);

if( !function_exists('_filter_odrin_acf_update_value') ) {

	function _filter_odrin_acf_update_value( $value, $post_id, $field  )
	{
		return wp_kses_post($value);
	}

}


/**
*  Google Fonts Link in Header
*/

add_action('fw_settings_form_saved', '_action_odrin_process_google_fonts', 999, 2);

if( !function_exists('_action_odrin_process_google_fonts') ) {

	function _action_odrin_process_google_fonts()
	{
		$include_from_google = array();
		$google_fonts = fw_get_google_fonts();

		$body_font = fw_get_db_settings_option('body_font');
		$heading_font = fw_get_db_settings_option('heading_font');
		$subheading_font = fw_get_db_settings_option('subheading_font');

        // if is google font
		if( isset($google_fonts[$body_font['family']]) ){
			$include_from_google[$body_font['family']] =  $google_fonts[$body_font['family']];
		}

		if( isset($google_fonts[$heading_font['family']]) ){
			$include_from_google[$heading_font['family']] =  $google_fonts[$heading_font['family']];
		}
		
		if( isset($google_fonts[$subheading_font['family']]) ){
			$include_from_google[$subheading_font['family']] =  $google_fonts[$subheading_font['family']];
		}

		$google_fonts_links = odrin_get_remote_fonts($include_from_google);
        // set a option in db for save google fonts link
		update_option( 'odrin_google_fonts_link', $google_fonts_links );
	}
	
}

/**
*  Print Google Fonts link
*/

add_action( 'wp_enqueue_scripts', '_action_odrin_print_google_fonts_link' );

if ( !function_exists('_action_odrin_print_google_fonts_link') ) {

	function _action_odrin_print_google_fonts_link() {
		$google_fonts_link = get_option('odrin_google_fonts_link', '');
		if($google_fonts_link != ''){
			wp_enqueue_style( 'odrin_fonts', $google_fonts_link, array(), null );
		}
	}
}


/**
* ----------------------------------------------------------------------------------------
*    WooCommerce
* ----------------------------------------------------------------------------------------
*/

add_action( 'after_setup_theme', '_action_odrin_woocommerce_support' );

if( !function_exists('_action_odrin_woocommerce_support')) {
	function _action_odrin_woocommerce_support() {
	    add_theme_support( 'woocommerce' );
	}
}

/**
*  WooCommerce Default Image Sizes
*/

add_action( 'after_switch_theme', '_action_odrin_wc_image_dimensions', 1 );

if( !function_exists('_action_odrin_wc_image_dimensions')) {
	function _action_odrin_wc_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}
		$catalog = array(
			'width' 	=> '400',
			'height'	=> '400',
			'crop'		=> 1 	
			);
		$single = array(
			'width' 	=> '700',
			'height'	=> '700',
			'crop'		=> false 
			);
		$thumbnail = array(
			'width' 	=> '120',
			'height'	=> '120',
			'crop'		=> false 
			);
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}
}


/**
*  WooCommerce Shop Page
*/
// Main Content - Before
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', '_action_odrin_wc_before_wrap', 10 );
if( !function_exists('_action_odrin_wc_before_wrap')) {
	function _action_odrin_wc_before_wrap() { 

		$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';

		$header_text_type = '';

		if ( is_shop() && odrin_get_option('shop_header_image') ) {
			$header_image = odrin_get_option('shop_header_image');
			$header_image_url = wp_get_attachment_image_src($header_image['attachment_id'], 'odrin_landscape_large');
    		$header_image_url = $header_image_url[0];

			if ( odrin_get_option('shop_header_text_type') == 'light' ) {
				$header_text_type = 'section-light';
			}

		} if ( is_product_category() ) {
			global $wp_query;
       		$product_category = $wp_query->get_queried_object();

    		if ( odrin_get_field('header_image', 'product_cat_' . $product_category->term_id) ) {
    			$header_image = odrin_get_field('header_image', 'product_cat_' . $product_category->term_id);
    			$header_image_url = $header_image['sizes']['odrin_landscape_large'];
    		}
			if ( odrin_get_field('header_text_color', 'product_cat_' . $product_category->term_id) == 'light' ) {
				$header_text_type = 'section-light';
			}
		}

		?>

		<?php if ( is_shop() || is_product_category() ) : ?>
				
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<div class="ProductsHeader <?php echo esc_attr($header_text_type) ?>">
					<?php
		    		if ( isset($header_image_url) ) : ?>
			    		<div class="bg-image is-parallax" data-bg-image="<?php echo esc_url($header_image_url) ?>"></div>
		    		<?php endif; // $header_image ?>

					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="SpecialHeading mb-100">
									<h1 class="special-title<?php echo esc_attr($title_classes); ?> woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
								</div>
							</div><!-- end col-sm-12 -->
						</div><!-- end row -->
					</div><!-- end container -->
					
				</div><!-- end ProductsHeader -->	

					
			<?php endif; ?>

		<?php endif; ?>

		<div class="container mt-100 mb-100">
		<div class="row">
		<div class="col-sm-12">
		<?php
	};
}

// Main Content - After
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 ); 
add_action( 'woocommerce_after_main_content', '_action_odrin_woocommerce_after_wrap', 10 ); 

if( !function_exists('_action_odrin_woocommerce_after_wrap')) {
	function _action_odrin_woocommerce_after_wrap() { 
		?>
		</div><!-- end col-sm-12 -->
		</div><!-- end row -->
		</div><!-- end container -->
		<?php
	}; 
}

// Cart - Before
add_action( 'woocommerce_before_cart', '_action_odrin_wc_before_wrap', 10 );

// Cart - After
add_action( 'woocommerce_after_cart', '_action_odrin_woocommerce_after_wrap', 10 );

// Checkout - Before
add_action( 'woocommerce_before_checkout_form', '_action_odrin_wc_before_wrap', 10 );

// Checkout - After
add_action( 'woocommerce_after_checkout_form', '_action_odrin_woocommerce_after_wrap', 10 );

// Shop Loop - Before

// Shop Loop - Move Results and Ordering
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 30 );

add_action( 'woocommerce_before_shop_loop', '_action_odrin_wc_before_shop_loop', 10 ); 

if( !function_exists('_action_odrin_wc_before_shop_loop')) {
	function _action_odrin_wc_before_shop_loop() { 
		if ( is_active_sidebar( 'shop-sidebar' ) ) {
			echo '<div class="col-sm-12 col-md-8">';
		} else {
			echo '<div class="col-sm-12">';
		}
	};
}


// Shop Loop - After
add_action( 'woocommerce_after_shop_loop', '_action_odrin_wc_after_shop_loop', 10 ); 

if( !function_exists('_action_odrin_wc_after_shop_loop')) {
	function _action_odrin_wc_after_shop_loop() { 
		echo '</div>';
		get_sidebar('shop');
	};
}

// Shop Loop - Products per Row
add_filter('loop_shop_columns', '_filter_odrin_loop_shop_columns');

if ( !function_exists('_filter_odrin_loop_shop_columns') ) {
	function _filter_odrin_loop_shop_columns() {
		if ( ( is_shop() || is_product_category() ) && is_active_sidebar( 'shop-sidebar' ) ) {
			return 3; // 3 products per row
		} else {
			return 4;
		}
	}
}

// Product Loop Image Size
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
add_action( 'woocommerce_before_shop_loop_item', '_action_odrin_wc_template_loop_product_link_open', 10 );

if ( !function_exists('_action_odrin_wc_template_loop_product_link_open') ) {
	function _action_odrin_wc_template_loop_product_link_open() {
		echo '<a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">';
	}
}

// Product Loop Image
add_action('woocommerce_before_shop_loop_item_title', '_action_odrin_wc_before_product_thumbnail', 9);

if ( !function_exists('_action_odrin_wc_before_product_thumbnail') ) {
	function _action_odrin_wc_before_product_thumbnail() {
		echo '<div class="loopProduct-image-wrap">';
		echo '<div class="loopProduct-shadow"></div>';
	}
}

add_action('woocommerce_before_shop_loop_item_title', '_action_odrin_wc_after_product_thumbnail', 11);

if ( !function_exists('_action_odrin_wc_after_product_thumbnail') ) {
	function _action_odrin_wc_after_product_thumbnail() {
		echo '</div>';
	}
}

add_filter('single_product_archive_thumbnail_size', '_action_odrin_wc_odrin_medium_soft');

if ( !function_exists('_action_odrin_wc_odrin_medium_soft') ) {
	function _action_odrin_wc_odrin_medium_soft() {
		return 'odrin_medium_soft';
	}
}

// Product Loop Add to Cart
add_filter('woocommerce_loop_add_to_cart_args', '_filter_odrin_wc_loop_add_to_cart_args', 20, 3);

if ( !function_exists('_filter_odrin_wc_loop_add_to_cart_args') ) {
	function _filter_odrin_wc_loop_add_to_cart_args( $args, $product ) {

		$args['class'] = 'special-link product_type_simple ajax_add_to_cart';

		return $args;
	}
}

/**
*  Remove WooCommerce Sidebar
*/
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
*  WooCommerce Single Product Summary
*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );

// Price - Add it before the product image
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( '_action_odrin_wc_single_product_after_image', 'woocommerce_template_single_price', 30 );

add_filter('woocommerce_format_sale_price', '_filter_odrin_wc_format_sale_price', 20, 3);

if ( !function_exists('_filter_odrin_wc_format_sale_price') ) {
	function _filter_odrin_wc_format_sale_price( $price, $regular_price, $sale_price ) {

		$price = '<del>' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</del> <span>' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</span>';

		return $price;
	}
}

// Remove categories and tags
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Move Add to Cart button after product categories
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40 );

// Add "Read the Book" button after "Add to Cart"
add_action( 'woocommerce_after_add_to_cart_button', '_action_odrin_wc_read_the_book_button', 20 );

if ( !function_exists('_action_odrin_wc_read_the_book_button') ) {
	function _action_odrin_wc_read_the_book_button() {
		odrin_read_the_book_button();
	}
}

// Add "Read the Book" button after single product summary
add_action( 'woocommerce_single_product_summary', '_action_odrin_wc_read_the_book_button_after_cart', 100 );

if ( !function_exists('_action_odrin_wc_read_the_book_button_after_cart') ) {
	function _action_odrin_wc_read_the_book_button_after_cart( ) {

		$product = wc_get_product( get_the_ID() );

		// Don't show another button as we already are showing button via the 'woocommerce_after_add_to_cart_button' hook
		if ( $product->is_purchasable() || $product->get_type() == 'grouped' || $product->get_type() == 'external' ) {
			return;
		}

		odrin_read_the_book_button();
 
	}
}


// Move Up-Sell and Related Products after all the content
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 25 );


/**
*  Reorder Reviews Tab
*/

add_filter( 'woocommerce_product_tabs', '_filter_odrin_remove_review_tab' );

if ( !function_exists('_filter_odrin_remove_review_tab') ) {
	function _filter_odrin_remove_review_tab( $tabs ) {
		unset( $tabs['reviews'] );
		return $tabs;
	}
}

add_action( 'woocommerce_after_single_product_summary', 'comments_template', 25 );

/**
*  Reorder Product meta fields so that ACF is after them
*/

add_filter( 'get_user_option_meta-box-order_product', '_filter_odrin_wc_metabox_order' );

if ( !function_exists('_filter_odrin_wc_metabox_order') ) {
	function _filter_odrin_wc_metabox_order( $order ) {

		return array(
			'normal' => join( 
				',', 
				array(
					'woocommerce-product-data',
					'postexcerpt',
					'acf-group_591d48592fbe9',
					)
				),
			);
	}
}

// Change Price HTML

add_filter('woocommerce_get_price_html', '_filter_odrin_wc_price', 20, 2);

if ( !function_exists('_filter_odrin_wc_price') ) {
	function _filter_odrin_wc_price( $price, $product ) {
		if ( $product->get_regular_price() && !$product->get_sale_price() ){
			$regular_price_html = is_numeric( $product->get_regular_price() ) ? wc_price( $product->get_regular_price() ) : $product->get_regular_price();
			ob_start(); ?>
			<span class="woocommerce-Price-amount amount font-heading">
				<?php echo wp_kses_post($regular_price_html); ?>
			</span>
			<?php
			$price = ob_get_clean();
		}
		if ( !$product->get_price() && $product->get_type() == 'single'  ) {
			ob_start(); ?>
			<span class="woocommerce-Price-amount amount font-heading">
				<?php echo esc_html__('Free', 'odrin'); ?>
			</span>
			<?php
			$price = ob_get_clean();
		}
		return $price;
	}
}

/**
*  WooCommerce Show Cart Box 
*/

if ( !function_exists('_action_odrin_wc_show_cart_contents_box') ) {
	function _action_odrin_wc_show_cart_contents_box() {

		$count = WC()->cart->cart_contents_count;
		if ( $count > 0 || odrin_get_option('always_show_cart_button') ) :
		?>
		<a class="cart-contents-box" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'odrin' ); ?>">
			<i class="icon-basket"></i><?php esc_html_e('Cart', 'odrin'); ?><span id="cart-contents-count">(<?php echo esc_html( $count ); ?>)</span>
		</a>
		<?php
		endif;
	}
}

add_action( 'odrin_show_cart_contents_box', '_action_odrin_wc_show_cart_contents_box' );


/**
*  WooCommerce Cart Box Update
*/

if ( !function_exists('_filter_odrin_wc_add_to_cart_fragment') ) {
	function _filter_odrin_wc_add_to_cart_fragment( $fragments ) {

		
		$count = WC()->cart->cart_contents_count;
		ob_start();
		?>
		<a class="cart-contents-box" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'odrin' ); ?>">
			<i class="icon-basket"></i><?php esc_html_e('Cart', 'odrin'); ?><span id="cart-contents-count">(<?php echo esc_html( $count ); ?>)</span>
		</a>
		<?php
		$fragments['.cart-contents-box'] = ob_get_clean();

		return $fragments;
	}
}

add_filter( 'woocommerce_add_to_cart_fragments', '_filter_odrin_wc_add_to_cart_fragment' );


/**
*  Woocommerce Login/Register in Navigation Menu
*/

add_filter( 'wp_nav_menu_items', '_filter_odrin_wc_add_login_logout_register_menu', 10, 2 );

if ( !function_exists('_filter_odrin_wc_add_login_logout_register_menu') ) {
	function _filter_odrin_wc_add_login_logout_register_menu( $nav, $args ) {

		$menu_locations = get_nav_menu_locations();
		if ( $args->theme_location != 'main-navigation-right' && isset($menu_locations['main-navigation-right']) ) {
			return $nav;
		}

		if ( odrin_woocommerce() && !odrin_get_option('hide_nav_menu_profle') ) {

			$url_user = get_option('woocommerce_myaccount_page_id') ? get_permalink( get_option('woocommerce_myaccount_page_id') ) : '';
			$url_login = get_permalink( get_option('woocommerce_myaccount_page_id') ) ? get_permalink( get_option('woocommerce_myaccount_page_id') ) : '';
			$url_logout = wc_get_page_id( 'myaccount' ) ? wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ) : '';

			if ( !function_exists( 'ubermenu' ) ) {
				$a_classes = '';
				$li_classes = 'menu-item-has-children menu-item-login-register';
				$submenu_classes = 'sub-menu';
				$span_classes = '';
			} else {
				$a_classes = 'ubermenu-target';
				$li_classes = 'ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-has-children ubermenu-item-level-0 ubermenu-has-submenu-drop';
				$submenu_classes = 'ubermenu-submenu ubermenu-submenu-type-auto ubermenu-submenu-drop';
				$span_classes = 'ubermenu-target-title ubermenu-target-text';
			}

			ob_start(); ?>

			<li class="<?php echo esc_attr($li_classes); ?>">
				<?php if ( is_user_logged_in() ) : ?>
					<?php 
					$current_user = wp_get_current_user();
					?>
					<a href="<?php echo esc_url($url_user); ?>" class="<?php echo esc_attr($a_classes); ?>"><i class='icon-profile-male'></i><span class="visible-xs-inline"><?php esc_html_e('Profile', 'odrin') ?></span><span class="<?php echo esc_attr($span_classes); ?>"><?php echo wp_kses_post($current_user->user_login); ?></span></a>
				<?php elseif ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
					<a href="<?php echo add_query_arg('redirect-to', get_the_permalink(), $url_login); ?>" class="<?php echo esc_attr($a_classes); ?>"><i class='icon-profile-male'></i><?php esc_html_e('Login / Signup', 'odrin') ?></a>
					<?php else: ?>
					<a href="<?php echo add_query_arg('redirect-to', get_the_permalink(), $url_login); ?>" class="<?php echo esc_attr($a_classes); ?>"><i class='icon-profile-male'></i><?php esc_html_e('Log In', 'odrin') ?></a>
				<?php endif; ?>
				<?php if ( is_user_logged_in() ) : ?>
				<ul class="<?php echo esc_attr($submenu_classes); ?>">			
					<li><a href="<?php echo esc_url($url_user); ?>" class="<?php echo esc_attr($a_classes); ?>"><?php esc_html_e('Profile', 'odrin') ?></a></li>
					<li><a href="<?php echo add_query_arg('redirect-to', get_the_permalink(), $url_logout); ?>" class="<?php echo esc_attr($a_classes); ?>" class="<?php echo esc_attr($a_classes); ?>"><?php esc_html_e('Log Out', 'odrin') ?></a></li>
				</ul>
				<?php endif; ?>
			</li>
			<?php
			$ob_content = ob_get_contents();
			ob_end_clean();
			$nav .= $ob_content;
		}

		return $nav;
	}
}
 
 /**
 *  Redirect on Login
 */

add_action( 'woocommerce_login_redirect', '_action_odrin_redirect_on_login');

if ( !function_exists('_action_odrin_redirect_on_login') ) {
	function _action_odrin_redirect_on_login($redirect_to){
		if ( isset($_GET['redirect-to']) ) {
			$redirect_to = $_GET['redirect-to'];
		}

		return $redirect_to;
	}
}

 /**
 *  Redirect on Logout
 */

add_action( 'wp_logout', '_action_odrin_redirect_on_logout');

if ( !function_exists('_action_odrin_redirect_on_logout') ) {
	function _action_odrin_redirect_on_logout(){
		if ( isset($_GET['redirect-to']) ) {
			wp_redirect( $_GET['redirect-to'] );
			exit();
		}
	}
}

/**
 *  Custom Excerpt More
 */

add_filter('excerpt_more', '_filter_odrin_excerpt_more');

if ( !function_exists('_filter_odrin_excerpt_more') ) {
	function _filter_odrin_excerpt_more( $more ) {
		return '...';
	}
}


/**
*  Query AJAX Pagination
*/

add_filter( 'pre_get_posts', '_filter_odrin_query_ajax_pagination');

if ( !function_exists('_filter_odrin_query_ajax_pagination') ) {
	function _filter_odrin_query_ajax_pagination( $query ) {
		if ( ($query->is_archive() || $query->is_search()) && isset($_REQUEST['load_more']) ) {
			$query->set('paged', $_REQUEST['paged']);
		}
	}
}

/**
*  Custom Embed Style
*/

add_filter( 'embed_oembed_html', '_filter_odrin_media_embed_html', 10 );
if ( !function_exists('_filter_odrin_media_embed_html') ) {
	function _filter_odrin_media_embed_html( $html ) { 
		return '<div class="media-embedded">' . $html . '</div>'; 
	}
}

/**
*  Custom Password Form
*/

add_filter( 'the_password_form', '_filter_odrin_password_form' );

if ( !function_exists( '_filter_odrin_password_form' ) ) {
	function _filter_odrin_password_form() {  

		global $post;  
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );  
		$output = '<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
		' . '<p>' . esc_html__( 'This post is password protected. To view it please enter your password below:', 'odrin' ) . '</p>' . ' 
			<div class="field-text protected-post-field">
				<label class="pass-label" for="' . $label . '">' . esc_html__( 'Password', 'odrin' ) . ' </label><input name="post_password" id="' . $label . '" type="text" size="20" /><input class="btn btn-color" type="submit" name="Submit" class="button" value="' . esc_attr__( 'Enter', 'odrin' ) . '" />
			</div>
		</form>  
		';  
		return $output;  
	} 
}

/**
*  Comment Avatar Class
*/

add_filter('get_avatar','_filter_odrin_avatar_css');

if ( !function_exists('_filter_odrin_avatar_css') ) {

	function _filter_odrin_avatar_css($class) {
		$class = str_replace("class='avatar", "class='avatar media-object", $class) ;
		return $class;
	}
}

/**
*  Enqueue Shortocode Static styles for Post Excerpt 
*/

add_action( 'fw:ext:shortcodes:enqueue_custom_content' , '_action_odrin_enqueue_post_excerpt' );

if( !( function_exists('_action_odrin_enqueue_post_excerpt')) ){
	function _action_odrin_enqueue_post_excerpt() {
		global $post;
		if ($post) {
			fw_ext_shortcodes_enqueue_shortcodes_static($post->post_excerpt);
		}
	}
}

/**
*  Show Documentation Notice
*/

if ( !get_option( 'odrin_admin_notice_documentation' ) ) {
    add_action( 'admin_notices', '_action_odrin_show_documentation_notice' );
}
if ( !( function_exists('_action_odrin_show_documentation_notice') ) ) {
	function _action_odrin_show_documentation_notice() { 

		global $current_user;
		?>
		<div class="notice odrin-notice-documentation notice-info is-dismissible">
		    <h2><?php esc_html_e('Welcome to Odrin!', 'odrin') ?></h2>
			<p><?php esc_html_e('Thank you for installing Odrin. To get to know the theme better, you can find its documentation in the zip package that you downloaded and also online - ', 'odrin') ?><a href="http://subsolardesigns.com/documentation/odrin/index.html" target="_blank"><?php esc_html_e('Read Documentation' , 'odrin') ?></a></p>
		</div>
	<?php
	}
}

add_action( 'wp_ajax_nopriv__odrin_dismiss_documentation_notice', '_odrin_dismiss_documentation_notice' );
add_action( 'wp_ajax__odrin_dismiss_documentation_notice', '_odrin_dismiss_documentation_notice' );

if( !( function_exists('_odrin_dismiss_documentation_notice')) ){
	function _odrin_dismiss_documentation_notice() {
		update_option('odrin_admin_notice_documentation', 'true');
	}
}


/**
*  Remove WooCommerce Notice
*/

add_filter('woocommerce_show_admin_notice', '_filter_woocommerce_show_outdated_templates_notice', 20, 2);

if( !( function_exists('_filter_woocommerce_show_outdated_templates_notice')) ){
	function _filter_woocommerce_show_outdated_templates_notice($show, $notice) {
		if ( $notice == 'template_files') {
			if ( defined('WP_DEBUG') && true === WP_DEBUG ) {
				return true;
			} else {
				return false;
			}
		}

		return $show;
	}
}


/**
*  Show Google API Error Notice
*/
add_action( 'admin_notices', '_action_odrin_show_google_api_error_notice' );

if( !( function_exists('_action_odrin_show_google_api_error_notice')) ){
	function _action_odrin_show_google_api_error_notice() {

		global $current_user;

		if ( odrin_get_field('google_api', 'option') && get_user_meta($current_user->ID, 'odrin_hide_google_api_error_notice', true) != 'no' ) {

			$apikey = odrin_get_field('google_api', 'option');

			if( $apikey != get_transient('ssd_google_api_key') ) {	 // so we can check only once per new api key

				$request = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=0,0&key=' . $apikey; 
				$file_contents = wp_remote_fopen(trim($request));
				$json_decode = json_decode($file_contents);

				if ( isset($json_decode->error_message) ) {
				?>
				<div class="error notice">
				    <h2><?php esc_html_e('Google API Key Error!', 'odrin') ?></h2>
					<p><?php echo wp_kses_post($json_decode->error_message); ?></p>
					<p><?php esc_html_e('Please see here for more information - ' , 'odrin') ?><a href="https://developers.google.com/maps/faq"><?php esc_html_e('Google API FAQ' , 'odrin') ?></a>
					<p>
					<p><a href="?hide_google_api_error_notice"><?php esc_html_e('Dismiss', 'odrin') ?></a></p>
				</div>
				<?php 
				}
				
				set_transient('ssd_google_api_key', $apikey, 0);

			}

		}
		
	}
}


add_action('admin_init', '_action_odrin_update_show_google_api_error_notice_meta');

if( !( function_exists('_action_odrin_update_show_google_api_error_notice_meta')) ){
	function _action_odrin_update_show_google_api_error_notice_meta() {
	
		global $current_user;
		
		if (isset($_GET['hide_google_api_error_notice'])) {
			
			update_user_meta($current_user->ID, 'odrin_hide_google_api_error_notice', 'yes');
			
		}
		
	}
}

/**
*  Enable the classic Widgets panel
*/

add_filter( 'use_widgets_block_editor', '__return_false' );