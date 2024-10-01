<?php if (!defined('FW')) die( 'Forbidden' ); 

$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

$posts_number = $atts['posts_number'] ? $atts['posts_number'] : -1;
$columns_number = $atts['columns_number'] ? $atts['columns_number'] : 3;
$view_all = $atts['view_all'];

// WOW Animation
$wow_classes = '';
$wow_data = '';

if ( isset($atts['animation_on_scroll']) && $atts['animation_on_scroll']['animation_enable'] == 'yes') {
	$wow_classes = 'is-wow ' . $atts['animation_on_scroll']['yes']['animation_type'];

	if ( isset($atts['animation_on_scroll']['yes']['animation_delay']) ) {
		$wow_data =  'data-wow-delay="' . ($atts['animation_on_scroll']['yes']['animation_delay'] / 1000) . 's"';
	}
	
}

/* Hidden Blog Categories */
$term_args = array();
$show_hide_cats = isset($atts['hide_show_categories']) ? $atts['hide_show_categories'] : 'hide';
// Tag remains hide_categories to support old versions;
$specific_cats = $atts['hide_categories'];


if( !empty($specific_cats) ) {
	$specific_cats_ids = array();
	foreach( $specific_cats as $cat) {
		if ( isset($cat[0]) ) {
			$cat_id = $cat[0];
			array_push($specific_cats_ids, $cat_id);
		}
	}
}

?>

<div class="ShortcodeBlog <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>

<?php 
$args = array(
	'post_type' => 'post',
	'max_num_pages' => 1,
	'posts_per_page' => $posts_number,
	'post_status' => 'publish'
);

if( !empty($specific_cats) ) {
	if ( $show_hide_cats == 'hide' ) {
		$args['tax_query'] = array(array(
			'taxonomy' => 'category',
			'field' => 'term_id',
			'terms' => $specific_cats_ids,
			'operator' => 'NOT IN'
		));
	} else {
		$args['tax_query'] = array(array(
			'taxonomy' => 'category',
			'field' => 'term_id',
			'terms' => $specific_cats_ids,
			'operator' => 'IN'
		));
	}
}

$posts_query = new WP_Query($args);

?>

	<?php if ( $atts['blog_styling_picker']['blog_styling'] == 'events_styling' ) : ?>

	<div class="EventsStylingPosts is-matchheight-group c-elements-cols-<?php echo esc_attr($columns_number); ?> mb-40">
						
	<?php if ($posts_query->have_posts()) : while ($posts_query->have_posts()) : $posts_query->the_post(); ?>

		<div class="ContentElement pos-r">

			<a href="<?php echo esc_url(get_permalink($posts_query->ID)); ?>">

			<?php if ( has_post_thumbnail() ) : ?>
			<div class="c-element-content-wrapper section-light">
				<?php 
				$thumb_id = get_post_thumbnail_id($posts_query->ID);
				if ( $columns_number == '3' ) {
					$image_url = wp_get_attachment_image_src($thumb_id,'odrin_medium');
				} elseif ( $columns_number == '2' ) {
					$image_url = wp_get_attachment_image_src($thumb_id,'odrin_landscape_medium');
				} else {
					$image_url = wp_get_attachment_image_src($thumb_id,'odrin_landscape_large');
				}
				?>
				<div class="bg-image" data-bg-image="<?php echo esc_url($image_url[0]); ?>"></div>
				<div class="overlay-dark"></div>
			<?php else : ?>
			<div class="c-element-content-wrapper section-dark">
			<?php endif; ?>

				<?php if ( $atts['blog_styling_picker']['events_styling']['display_date'] ) : ?>
				<div class="c-element-date-wrapper pos-r">
					<span class="c-element-date-number font-heading"><?php echo wp_kses_post(get_the_date("d")); ?></span>
					<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(get_the_date("F")); ?></span>
					<span class="c-element-date-year"><?php echo ', ' . wp_kses_post(get_the_date("Y")); ?></span>
				</div>
				<div class="c-element-content pos-r">
				<?php else : ?>
				<div class="c-element-content mt-160 pos-r">
				<?php endif; ?>
					<h4 class="c-element-title"><?php echo get_the_title($posts_query->ID) ?></h4>
					<?php 
					if ( $atts['blog_styling_picker']['events_styling']['display_categories'] ) :
						$categories = get_the_category();
						if ( !empty($categories) ) : 
							$output = '';
							?>
							<div class="c-element-category special-subtitle-type-2">
							<?php foreach( $categories as $category ) {
								$output .= esc_html( $category->name ) . ' / ';
							}
							echo wp_kses_post(trim( $output, ' / ' )); ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div> <!-- end c-element-content-wrapper -->
			</a>
		</div> <!-- end ContentElement -->

	<?php endwhile; ?>

	<?php
	wp_reset_postdata();
	endif; 
	?>

	</div> <!-- end EventsStylingPosts -->

	<?php else : ?>

	<div class="SimplifiedPosts pos-r is-matchheight-group posts-cols-<?php echo esc_attr($columns_number); ?> mb-40">
						
	<?php if ($posts_query->have_posts()) : while ($posts_query->have_posts()) : $posts_query->the_post(); ?>

		<?php if ( has_post_thumbnail() ) : ?>
		<div class="simplified-post-wrapper mb-40">
			<a href="<?php echo esc_url(get_permalink($posts_query->ID)); ?>">
				<?php $thumb_id = get_post_thumbnail_id($posts_query->ID);
				if ( $columns_number == '3' ) {
					$image_url = wp_get_attachment_image_src($thumb_id,'odrin_medium_soft');
				} elseif ( $columns_number == '2' ) {
					$image_url = wp_get_attachment_image_src($thumb_id,'odrin_landscape_medium');
				} else {
					$image_url = wp_get_attachment_image_src($thumb_id,'odrin_landscape_large');
				}
				?>
				<?php if ( $atts['blog_styling_picker']['default']['crop_images'] ) : ?>
				<div class="SimplifiedImage">
					<div class="bg-image" data-bg-image="<?php echo esc_url($image_url[0]); ?>"></div>
				</div>
				<?php else : ?>
					<img src="<?php echo esc_url($image_url[0]); ?>">
				<?php endif; ?>
		<?php else : ?>
		<div class="simplified-post-wrapper no-image mb-40">
			<a href="<?php echo esc_url(get_permalink($posts_query->ID)); ?>">
		<?php endif; ?>
				<div class="simplified-post-meta">
					<div class="ElementHeading text-center">
						<h4 class="element-title"><?php echo get_the_title($posts_query->ID) ?></h4>
					</div> <!-- end ElementHeading -->
					<?php if ( isset($atts['blog_styling_picker']['default']['show_excerpt']) && $atts['blog_styling_picker']['default']['show_excerpt'] ) : ?>
						<div class="simplified-post-excerpt text-left">
							<?php echo odrin_custom_excerpt_size('25'); ?>
						</div>
					<?php endif; ?>
					<div class="simplified-post-date"><span><?php echo esc_html(get_the_date(get_option('date_format'))); ?></span></div>
					<div class="simplified-post-read-more text-right"><span class="special-subtitle-type-2"><?php echo esc_html__('Read More', 'odrin'); ?></span></div>
				</div>
			</a>
		</div> <!-- end simplified-post-meta -->

	<?php endwhile; ?>

	<?php
	wp_reset_postdata();
	endif; 
	?>

	</div> <!-- end SimplifiedPosts -->

	<?php endif; ?>

	<?php if ( $view_all['view_all'] == 'true') : ?>
		<?php $parent_blog_id = odrin_parent_blog_id(); 
		if ( $parent_blog_id ) : ?>
		<div class="blog-show-more special-link text-right">
			<a href="<?php echo esc_url(get_permalink($parent_blog_id)) ;?>"><?php echo wp_kses_post($view_all['true']['label']); ?></a>
		</div>
		<?php else : 
			if ( current_user_can('publish_pages') ) : ?>
			<span class="admin-alert"><?php echo wp_kses_post(__('<strong>Note!</strong> Make sure than you have published one page that uses the Page Template "Blog" in order to display the View All button.', 'odrin')); ?></span>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

</div> <!-- end ShortcodeBlog -->