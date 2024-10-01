<?php

/* Hidden/Shown Events Categories */
$show_hide_cats = ( odrin_get_field('hide_show_categories') !== null ) ? odrin_get_field('hide_show_categories') : 'hide';
// Tag remains hide_categories to support old versions;
$specific_cats = odrin_get_field('hide_categories');

if( !empty($specific_cats[0]['category']) ) {
	$specific_cats_ids = array();
	foreach( $specific_cats as $cat) {
		array_push($specific_cats_ids, $cat['category']->term_id);
	}
}

// Get Events Dates
$dates_array = array();

if ( odrin_get_field('show_past_events') ) {
$filter_args = array(
	'post_type' => 'event',
	'meta_key' => 'event_date',
	'meta_type' => 'DATETIME',
	'orderby' => 'meta_value',
	'order' => 'asc',
	'posts_per_page' => -1,
	'paged' => 1
);
} else {
$filter_args = array(
	'post_type' => 'event',
	'meta_key' => 'event_date',
	'meta_type' => 'DATETIME',
	'meta_value' => date( "Ymd" ),
	'meta_compare' => '>=',
	'orderby' => 'meta_value',
	'order' => 'asc',
	'posts_per_page' => -1,
	'paged' => 1
);
}

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

if ($filter_query->have_posts()) : while ($filter_query->have_posts()) : $filter_query->the_post();

	$full_date = new DateTime(odrin_get_field('event_date', get_the_ID()));
	$date = $full_date->format('F Y');

	array_push($dates_array, $date);

	if ( odrin_get_field('event_end_date', get_the_ID()) ) {
		$end_full_date = new DateTime(odrin_get_field('event_end_date', get_the_ID()));
		$end_date = $end_full_date->format('F Y');
		array_push($dates_array, $end_date);
	}
	

endwhile;endif;
wp_reset_postdata();

$dates_array = array_unique($dates_array);
?>

<?php if ( !empty($dates_array) ) : ?>
	<?php 

	if ( !empty($_GET['events_date']) ) {
		$event_date_current = $_GET['events_date'];
		$get_uri = esc_url( remove_query_arg( 'events_date' ) );
		if ( $event_date_current == 'upcoming' ) {
			$current_upcoming = 'true';
		} else {
			$current_upcoming = 'false';
		}
	} else {
		global $wp;
		if ( odrin_get_field('show_past_events') ) {
			$current_upcoming = 'false';
		} else {
			$current_upcoming = 'true';
		}
		$event_date_current = '';
		$current = 'true';
		$get_uri = home_url($wp->request);
	}
	?>
	<div id="events-date-filter" class="events-filter-dropdown dropdown">

		<button id="dropdown-menu-one-column" class="btn-dropdown" data-toggle="dropdown" ><?php esc_html_e('Date', 'odrin') ?></button>

		<ul class="dropdown-menu dropdown-menu-one-column" aria-labelledby="events-date-filter">
		<?php 
		if ( !isset($current) ) $current = false;
		if ( odrin_get_field('show_past_events') ) : ?>
			<li>
				<a href="<?php echo esc_url($get_uri); ?>" data-current="<?php echo esc_attr($current); ?>"><?php esc_html_e('All Dates', 'odrin'); ?></a>
			</li>
		<?php endif; ?>
			<li>
				<a href="<?php echo add_query_arg('events_date', 'upcoming', esc_url($get_uri)); ?>" data-current="<?php echo esc_attr($current_upcoming); ?>"><?php esc_html_e('Upcoming', 'odrin'); ?></a>
			</li>
		<?php
		foreach ( $dates_array as $date ) : ?>
			<?php 

			$parm_data = new DateTime($date);
			$timestamp = $parm_data->getTimestamp();
			$parm_data_format = $parm_data->format('Ym');

			if ( $parm_data_format ==  $event_date_current ) {
				$current = 'true';
			} else {
				$current = 'false';
			}

			?>
			<li>
				<a href="<?php echo add_query_arg('events_date', $parm_data_format, esc_url($get_uri)); ?>" data-current="<?php echo esc_attr($current); ?>"><?php echo wp_kses_post(date_i18n('F Y', $timestamp)); ?></a>
			</li>
		<?php endforeach; ?>
		</ul>

	</div>

<?php endif; ?>