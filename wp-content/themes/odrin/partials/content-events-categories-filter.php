<?php

/* Hidden/Shown Events Categories */
$show_hide_cats = ( odrin_get_field('hide_show_categories') !== null ) ? odrin_get_field('hide_show_categories') : 'hide';
// Tag remains hide_categories to support old versions;
$specific_cats = odrin_get_field('hide_categories');

if( !empty($specific_cats[0]['category']) ) {
	$specific_cats_ids = array();
	foreach( $specific_cats as $cat ) {
		array_push($specific_cats_ids, $cat['category']->term_id);
	}
}

// Get Events Categories
$categories_array = array();
$filter_args = array(
	'post_type' => 'event',
	'taxonomy' => 'event_category',
	'posts_per_page' => -1,
	'paged' => 1
	);

if( !empty($specific_cats[0]['category']) ) {
	if ( $show_hide_cats == 'hide' ) {
		$filter_args['tax_query'] = array(array(
			'taxonomy' => 'event_category',
			'field' => 'term_id',
			'terms' => $specific_cats_ids,
			'operator' => 'NOT IN'
		));
	} else {
		$filter_args['tax_query'] = array(array(
			'taxonomy' => 'event_category',
			'field' => 'term_id',
			'terms' => $specific_cats_ids,
			'operator' => 'IN'
		));
	}
}

$filter_query = new WP_Query( $filter_args );
$categories_array = array();

if ($filter_query->have_posts()) : while ($filter_query->have_posts()) : $filter_query->the_post();

	$item_terms = wp_get_post_terms(get_the_ID(), 'event_category');

	if ( ! empty( $item_terms ) && ! is_wp_error( $item_terms ) ){
		foreach( $item_terms as $term ) {
			if ( !empty($specific_cats[0]['category']) ) {
				if ( ($show_hide_cats == 'show' && array_search($term->term_id, $specific_cats_ids) !== false) || ($show_hide_cats == 'hide' && array_search($term->term_id, $specific_cats_ids) !== 0) ) {
					array_push($categories_array,array($term->name,$term->slug));
				}
			} else {
				array_push($categories_array,array($term->name,$term->slug));
			}
		}
	}

endwhile;endif;
wp_reset_postdata();
$categories_array = array_unique($categories_array, SORT_REGULAR);
?>

<?php if ( !empty($categories_array) ) : ?>

	<?php 

	if ( !empty($_GET['events_category']) ) {
		$event_category_current = $_GET['events_category'];
		$get_uri = esc_url( remove_query_arg( 'events_category' ) );
	} else {
		global $wp;
		$event_category_current = '';
		$current = 'true';
		$get_uri = home_url($wp->request);
	}

	?>
	<div id="events-cat-filter" class="events-filter-dropdown dropdown">

		<button id="dropdown-menu-one-column" class="btn-dropdown" data-toggle="dropdown" ><?php esc_html_e('Category', 'odrin') ?></button>

		<ul class="dropdown-menu dropdown-menu-one-column" aria-labelledby="events-cat-filter">
		<?php
		if ( !isset($current) ) $current = false; ?>
			<li>
				<a href="<?php echo esc_url($get_uri); ?>" data-current="<?php echo esc_attr($current); ?>"><?php esc_html_e('All Categories', 'odrin'); ?></a>
			</li>
		<?php
		foreach ( $categories_array as $category ) : ?>
			<?php if ( $category[1] == $event_category_current ) {
				$current = 'true';
			} else {
				$current = 'false';
			} ?>
			<li>
				<a href="<?php echo add_query_arg('events_category', $category[1], esc_url($get_uri)); ?>" data-current="<?php echo esc_attr($current); ?>"><?php echo wp_kses_post($category[0]); ?></a>
			</li>
		<?php endforeach; ?>
		</ul>

	</div>

<?php endif; ?>