<?php if ( ! defined( 'ABSPATH' ) ) { die(); }
/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
* ----------------------------------------------------------------------------------------
*    DEBUG FUNCTIONS
* ----------------------------------------------------------------------------------------
*/

if(!function_exists('log_it')){
	function log_it( $message ) {
		if( WP_DEBUG === true ){
			if( is_array( $message ) || is_object( $message ) ){
				error_log( print_r( $message, true ) );
			} else {
				error_log( $message );
			}
		}
	}
}

/**
* ----------------------------------------------------------------------------------------
*    ACF
* ----------------------------------------------------------------------------------------
*/

/**
 * Return a custom field stored by the Advanced Custom Fields plugin 
 */

if ( !function_exists( 'odrin_get_field' ) ) {
	function odrin_get_field( $key, $id=false, $default='' ) {
		global $post;
		$key = trim( filter_var( $key, FILTER_UNSAFE_RAW ) );
		$result = '';

		if ( function_exists( 'get_field' ) ) {

			if ( isset( $post->ID ) && !$id )
				$field_object = get_field_object($key) ;
			else
				$field_object = get_field_object($key, $id );

			if ( isset( $post->ID ) && !$id )
				$result = get_field( $key );
			else
				$result = get_field( $key, $id );

			if ( $result == '' ) // If ACF enabled but key is undefined, return default
				$result = $default;

		} else {
			$result = $default;
		}
		return $result;
	}
}


if ( !function_exists( 'odrin_get_sub_field' ) ) {
	function odrin_get_sub_field( $key, $default='' ) {
		if ( function_exists( 'get_sub_field' ) &&  get_sub_field( $key ) )  
			return get_sub_field( $key );
		else 
			return $default;
	}
}

if ( !function_exists( 'odrin_has_sub_field' ) ) {
	function odrin_has_sub_field( $key, $id=false ) {
		if ( function_exists('has_sub_field') )
			return has_sub_field( $key, $id );
		else
			return false;
	}
}

if ( !function_exists( 'odrin_have_rows' ) ) {
	function odrin_have_rows( $key, $id=false ) {
		if ( function_exists('have_rows') )
			return have_rows( $key, $id );
		else
			return false;
	}
}

/**
* ----------------------------------------------------------------------------------------
*    Unyson
* ----------------------------------------------------------------------------------------
*/

/**
 *  Get Unyson option
 */

if ( !function_exists( 'odrin_get_option' ) ) {
	function odrin_get_option($option_id, $default_value = false) {
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			return fw_get_db_settings_option($option_id, $default_value);
		}

		return $default_value;
	}
}

/**
 *  Print typography CSS
 */

if ( !function_exists( 'odrin_typography_css' ) ) {
	function odrin_typography_css($field) {

		$output = '';
		$matches = '';
		$pattern = '/(\d+)|(regular|italic)/i';


		if ( isset($field['family']) ) {
			$output .= 'font-family: ' . $field['family'] . ';';
			$output .= "\r\n";
		}

		if ( isset($field['google_font']) ) {
			if ( isset($field['variation']) ) {
				preg_match_all($pattern, $field['variation'], $matches);
			}
		} else {
			if ( isset($field['style']) ) {
				preg_match_all($pattern, $field['style'], $matches);
			}
		}

		if ( $matches && $matches[0] ) {
			foreach ($matches[0] as $value) {
				if ( $value == 'italic' ) {
					$output .= 'font-style: ' . $value . ';';
					$output .= "\r\n";
				} else if ( $value == 'regular' ) {
					$output .= 'font-style: normal;';
					$output .= "\r\n";
				} else {
					$output .= 'font-weight: ' . $value . ';';
					$output .= "\r\n";
				}
			}
		}

		return $output;

	}
}

/**
*  Get remote Google Fonts
*/

if (!function_exists('odrin_get_remote_fonts')) :
	function odrin_get_remote_fonts($include_from_google) {
		/**
		 * Get remote fonts
		 * @param array $include_from_google
		 */
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}

		$html = "https://fonts.googleapis.com/css?family=";

		foreach ( $include_from_google as $font => $styles ) {
			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] );

			$last_name = end($include_from_google);
			if($last_name !== $styles){
			   $html .= '%7C'; // not the last element
			}
		}

		$html .= '&amp;subset=cyrillic,cyrillic-ext';

		return $html;
	}
    endif;


/**
 *  Populate an array with IDs and Titles of posts
 */

if ( !function_exists( 'odrin_get_product_names' ) ) {
	function odrin_get_product_names() {

		$array = array();

		if ( function_exists('wc_get_product') ) {
			$product_ids = get_posts( array(
		        'post_type' => 'product',
		        'numberposts' => -1,
		        'post_status' => 'publish',
		        'fields' => 'ids',
		   ) );
			foreach ($product_ids as $product_id) {
				$product = wc_get_product( $product_id );
				$array[$product->get_id()] = html_entity_decode($product->get_name());
			}
		} else {
			$array['no-such-post-type'] = esc_html__('There is no product post type detected. Please install the corresponding plugin.', 'odrin');
		}

		return $array;
	}	
}


/**
 *  Populate an array with IDs and Titles of taxonomies
 */

if ( !function_exists( 'odrin_get_term_names' ) ) {
	function odrin_get_term_names($taxonomy = null, $select_none = false) {

		$array = array();

		if ( $select_none ) {
			$array[0] = esc_html__('None', 'odrin');
		}

		$args = array(
			'hide_empty' => false
			);

		$terms = get_terms( $taxonomy, $args );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

			foreach ($terms as $term) {
				$array[$term->term_id] = $term->name;
			}

		} else {
			$array['no-such-taxonomy'] = sprintf(esc_html__('There is no %s taxonomy detected. Please install the corresponding plugin.', 'odrin'), $taxonomy);
		}

		return $array;
	}
}

/**
* ----------------------------------------------------------------------------------------
*    Theme
* ----------------------------------------------------------------------------------------
*/

/**
*  Generating Isotope Category Names
*/

if ( !function_exists( 'odrin_isotope_categories' ) ) {
	function odrin_isotope_categories($value){
		return 'isotope-category-' . $value;
	}
}


/**
*  Prev / Next Pagination
*/

if ( ! function_exists( 'odrin_paging_nav' ) ) : 
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */ 
{
	function odrin_paging_nav( $wp_query = null ) {

		if ( ! $wp_query ) {
			$wp_query = $GLOBALS['wp_query'];
		}

		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link,
			'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%',
			'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => esc_html__( '&larr; Previous', 'odrin' ),
			'next_text' => esc_html__( 'Next &rarr;', 'odrin' ),
			) );

		if ( $links ) :

			?>
		<nav class="navigation paging-navigation" role="navigation">
			<div class="posts-pagination loop-pagination">
				<?php echo esc_html($links); ?>
			</div>
			<!-- .pagination -->
		</nav><!-- .navigation -->
		<?php
		endif;
	}
}
endif;

/**
*  Get Parent Blog
*/

if( !function_exists( 'odrin_parent_blog_id' ) ) {
	function odrin_parent_blog_id() {

		$args = array(
			'post_type' => 'page',
			'posts_per_page' => -1,
			'meta_key'   => '_wp_page_template',
			'meta_value' => 'template-blog.php'
		);


		$blog_query = new WP_Query($args);

		$found = false;

		if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post();

			$found = true;
			$blog_id = get_the_ID();

		endwhile; endif;

		wp_reset_postdata();

		if ( isset($blog_id) ) {
			return $blog_id;
		} else {
			return false;
		}

	}
}


/**
*  Get Parent Events
*/

if( !function_exists( 'odrin_parent_events_id' ) ) {
	function odrin_parent_events_id() {

		$args = array(
			'post_type' => 'page',
			'posts_per_page' => -1,
			'meta_key'   => '_wp_page_template',
			'meta_value' => 'template-events.php'
		);


		$events_query = new WP_Query($args);

		$found = false;

		if ($events_query->have_posts()) : while ($events_query->have_posts()) : $events_query->the_post();

			$found = true;
			$events_id = get_the_ID();

		endwhile; endif;

		wp_reset_postdata();

		if ( isset($events_id) ) {
			return $events_id;
		} else {
			return false;
		}

	}
}

/**
*  Single Event Navigation
*/

if( !function_exists( 'odrin_single_event_nav' ) ) {

	function odrin_single_event_nav($parent_events_id){
		?>
		<div class="single-event-nav">
			<div class="spn-offset"></div>
			<a href="<?php echo get_permalink($parent_events_id) ;?>" class="back-to-portfolio"><i class="fas fa-th-large"></i></a>
		</div>
	<?php
	}
}


/**
*  Comments
*/

if ( !function_exists( 'odrin_comments' ) ) {
	function odrin_comments($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<article class="comment-content">
				<div class="">
					<div class="comment-left">
						<figure class="comment-avatar">
							<?php
							$avatar_size = 50;
							echo get_avatar($comment, $avatar_size); ?>
						</figure>

					</div><!-- end media-left -->
					<div class="comment-body">
						<header class="comment-header">

							<h5 class="comment-author"><?php comment_author_link(); ?></h5>
							<span class="comment-meta"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_date(); ?> - <?php comment_time(); ?></a><?php edit_comment_link(esc_html__('[Edit]', 'odrin'),'  ','') ?> &middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
						</header>
						<div class="comment-main-content">
							<?php if ( $comment->comment_approved == 0 ) : ?>

								<p class="awaiting-moderation alert"><?php esc_html_e('Your comment is awaiting moderation', 'odrin'); ?></p>

							<?php endif; ?>

							<?php comment_text(); ?>
						</div>

					</div><!-- end media-body -->
				</div><!-- end media -->
				
			</article>

		<?php

	}
}


/**
*  Popular Blog Posts
*/

if ( !function_exists( 'odrin_count_post_views' ) ) {
	function odrin_count_post_views($postID) {
		$count_key = 'odrin_post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if ( $count=='' ) {
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
}

/**
*  Custom Exceprt Size
*/
if( !function_exists( 'odrin_custom_excerpt_size' ) ) {
	function odrin_custom_excerpt_size($limit) {
		return wp_trim_words(get_the_excerpt(), $limit, '...');
	}
}

/**
*  Callbacks
*/

if ( !function_exists( 'odrin_list_pings' ) ) {
	function odrin_list_pings($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class('pingback'); ?> id="comment-<?php comment_ID() ?>">
			<article class="comment-content">
				<header class="ping-header">
					<span class="comment-author special-subtitle"><?php _e('Pingback:', 'odrin'); ?></h5>
				</header>
				<span class="comment-meta"><?php edit_comment_link(__('[Edit]', 'odrin'),'  ','') ?></span>
				<?php comment_author_link(); ?>
			</article>
		</li>
		<?php
	}
}

/**
 * Checks if the required plugin is active in network or single site.
 *
 * @param $plugin
 *
 * @return bool
 */

if( !function_exists( 'odrin_queryloop_is_active' ) ) {
	function odrin_queryloop_is_active( $plugin ) {
		$network_active = false;
		if ( is_multisite() ) {
			$plugins = get_site_option( 'active_sitewide_plugins' );
			if ( isset( $plugins[$plugin] ) ) {
				$network_active = true;
			}
		}
		return in_array( $plugin, get_option( 'active_plugins' ) ) || $network_active;
	}
}


/**
 * Check if WooCommerce is activated
 */

if( !function_exists( 'odrin_woocommerce' ) ) {
	function odrin_woocommerce() {

		if ( !defined( 'WC_ABSPATH' ) ) {
			return false;
		}

		if ( odrin_queryloop_is_active( 'woocommerce/woocommerce.php' ) || class_exists( 'WooCommerce' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 * Show "Read the Book" Button
 */

if( !function_exists( 'odrin_read_the_book_button' ) ) {
	function odrin_read_the_book_button() {

		$has_book_content = false;
 
		if( odrin_have_rows('read_the_book_chapters') ):
		    while ( odrin_have_rows('read_the_book_chapters') ) : the_row();
				if (odrin_get_sub_field('chapter') ) {
					$has_book_content = true;
				}
		    endwhile;
		endif;


		if ( odrin_get_option('show_read_book_button_in_product') && $has_book_content ) :
		?>
		<?php 
		if ( odrin_get_field('read_the_book_text') ) {
				$read_the_book_text = odrin_get_field('read_the_book_text');
			} else {
				$read_the_book_text = esc_html__('Read the Book', 'odrin');
			}
		?>
		<button type="button" class="btn is-page-flip" data-post-id="<?php the_ID(); ?>"><i class="icon-book-open"></i><?php echo wp_kses_post($read_the_book_text); ?></button>
		<?php
		endif;

	}
}


/**
 * Get Book Content
 */

if(!( function_exists('odrin_get_book_content') )){

	function odrin_get_book_content($post_id){

	    $output = '';

	    if ( !empty( $post_id) ) {
	    	$args = array(
	    		'post_type' => 'product',
	    		'posts_per_page' => -1,
	    		'p' => $post_id		
			);
	    }

		$the_query = new WP_Query($args);

		if ( $the_query->have_posts() ) :

		$output .= '
		<div id="book-container" class="book-container book-container-' . esc_attr($post_id) . '">

			<div class="menu-panel">
				<h3>' . __('Table of Contents', 'odrin') . '</h3>
				<ul id="menu-toc" class="menu-toc is-perfect-scrollbar">';

					if( odrin_have_rows('read_the_book_chapters',  $post_id) ):

						$item_num = 1;

					    while ( odrin_have_rows('read_the_book_chapters',  $post_id) ) : the_row();
 
						    $output .= '<li><a href="#item'. $item_num = 1 . '">' . odrin_get_sub_field('title',  $post_id) .'</a></li>';

							$item_num++;

					    endwhile;

					endif;

				$output .= '</ul>

			</div>

			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">';

					
					if( odrin_have_rows('read_the_book_chapters',  $post_id) ):

						$item_num = 1;

					    while ( odrin_have_rows('read_the_book_chapters',  $post_id) ) : the_row();

					    	if ( odrin_get_option('special_paragraph_letter') ) {
					    		 $output .= '<div class="bb-item" id="item' . $item_num . '">
									<div class="book-content">
										<div class="book-content-inner special-first-letter is-perfect-scrollbar">
											<h1 class="chapter-heading">' . odrin_get_sub_field('title',  $post_id) . '</h1>'
											. odrin_get_sub_field('chapter',  $post_id) .
										'</div>
									</div>
								</div><!-- end bb-item -->';
					    	} else {
							    $output .= '<div class="bb-item" id="item' . $item_num . '">
									<div class="book-content">
										<div class="book-content-inner is-perfect-scrollbar">
											<h1 class="chapter-heading">' . odrin_get_sub_field('title',  $post_id) . '</h1>'
											. odrin_get_sub_field('chapter',  $post_id) .
										'</div>
									</div>
								</div><!-- end bb-item -->';
					    	}

							$item_num++;

					    endwhile;

					endif;


				$output .= '</div>

				<nav>
					<span id="bb-nav-prev">&larr;</span>
					<span id="bb-nav-next">&rarr;</span>
				</nav>

				<span id="tblcontents" class="menu-button"><i class="icon-search"></i><span>' . __('Show Chapters', 'odrin') . '</span></span>

				<span class="bb-nav-close"><i class="close-icon-color"></i></span>

			</div>

		</div><!-- /container -->';

	endif;
	wp_reset_postdata();

	global $allowedposttags;

	$expanded_allowedtags = $allowedposttags;

	$expanded_allowedtags['input'] = array(
			'class' => true,
			'id'    => true,
			'name'  => true,
			'value' => true,
			'type'  => true,
	);

	$expanded_allowedtags['iframe'] = array(
		'width' => true,
		'height' => true,
		'scrolling' => true,
		'frameborder' => true,
		'allow' => true,
		'src' => true,
	);

	return wp_kses($output, $expanded_allowedtags);

	}
}
