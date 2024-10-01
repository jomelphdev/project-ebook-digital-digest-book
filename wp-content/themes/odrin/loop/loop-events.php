<?php 

$events_per_page = odrin_get_field('events_per_page') ? intval(odrin_get_field('events_per_page')) : -1;
$columns_number = odrin_get_field('number_of_columns') ? odrin_get_field('number_of_columns') : 2;
$display_events_year = odrin_get_field('display_events_year') ? true : false;

if( get_query_var( 'paged' ) )
	$paged = get_query_var( 'paged' );
else {
	if( get_query_var( 'page' ) )
		$paged = get_query_var( 'page' );
	else
		$paged = 1;
	set_query_var( 'paged', $paged );
}


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

$args = array(
	'post_type' => 'event',
	'posts_per_page' => $events_per_page,
	'orderby' => 'meta_value',
	'order' => 'asc',
	'paged' => $paged
);

$args['tax_query'] = array();
if( !empty($specific_cats[0]['category']) ) {
	if ( $show_hide_cats == 'hide' ) {
		array_push($args['tax_query'], array(
			'taxonomy' => 'event_category',
			'field' => 'term_id',
			'terms' => $specific_cats_ids,
			'operator' => 'NOT IN'
		));
	} else {
		array_push($args['tax_query'], array(
			'taxonomy' => 'event_category',
			'field' => 'term_id',
			'terms' => $specific_cats_ids,
			'operator' => 'IN'
		));
	}
}

// Filter Events
if ( !empty($_GET['events_date']) && $_GET['events_date'] != 'upcoming' ) {

	$events_date = $_GET['events_date'];

	$full_date = DateTime::createFromFormat('Ym', $events_date);
	$start_date = $full_date->format('Y-m-01 00:00:01');
	$end_date = $full_date->format('Y-m-t 23:59:59');

	$args['meta_query'] = array(
		'relation' => 'OR',
		array(
			'key'       => 'event_date',
			'value'     => array($start_date, $end_date),
			'compare'   => 'BETWEEN',
			'type'      => 'DATETIME',
   		),
		array(
			'key'       => 'event_end_date',
			'value'     => array($start_date, $end_date),
			'compare'   => 'BETWEEN',
			'type'      => 'DATETIME',
		),
	);
} else {

	$args['meta_query'] = array(
		'relation' => 'OR',
		array(
			'key'       => 'event_date',
			'value'     => date( "Ymd" ),
			'compare'   => '>=',
			'type'      => 'DATETIME',
		),
		array(
			'key'       => 'event_end_date',
			'value'     => date( "Ymd" ),
			'compare'   => '>=',
			'type'      => 'DATETIME',
		),
	);

}

if ( !empty($_GET['events_category']) ) {
	$get_category = $_GET['events_category'];
	$args['tax_query']['relation'] = 'AND';
	array_push($args['tax_query'], array(
		'taxonomy' => 'event_category',
		'field' => 'slug',
		'terms' => $get_category,
		'operator' => 'IN'
	));
}

?>

<?php

$events_query = new WP_Query($args); 
?>


<?php
if ($events_query->have_posts() || odrin_get_field('show_past_events')) : ?>
<div class="row">
	<div class="col-md-12">
		<div class="EventsWrapper is-matchheight-group c-elements-cols-<?php echo esc_attr($columns_number); ?>">

			<?php while ($events_query->have_posts()) : $events_query->the_post(); 
			
			$event_image = odrin_get_field('event_image');
			?>

			<div class="ContentElement pos-r">

				<a href="<?php the_permalink(); ?>">
					<?php if ( $event_image ) : ?>
					<div class="c-element-content-wrapper section-light">
						<div class="bg-image" data-bg-image="<?php echo esc_url($event_image['sizes']['odrin_landscape_medium']); ?>"></div>
						<div class="overlay-dark"></div>
					<?php else : ?>
					<div class="c-element-content-wrapper section-dark">
					<?php endif; ?>
						<div class="c-element-date-wrapper pos-r">
							<?php 
							$date = new DateTime(odrin_get_field('event_date'));
							$timestamp = $date->getTimestamp();
							$date_number = $date->format("d");
							$date_year = $date->format("Y");
							$date_time = $date->format("g:i a");
							if ( odrin_get_field('event_end_date') ) :

								$end_date = new DateTime(odrin_get_field('event_end_date'));
								$end_timestamp = $end_date->getTimestamp();
								$end_date_number = $end_date->format("d");
								$end_date_year = $end_date->format("Y");
								$end_date_time = $end_date->format("g:i a");
								?>
								<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
								<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('M', $timestamp)); ?></span>
								<?php if ( $date_number === $end_date_number ) : ?>
									<span class="c-element-date-time">, <?php echo wp_kses_post($date_time); ?></span>
									<span class="c-element-time-delimeter">-</span>
									<span class="c-element-date-time"><?php echo wp_kses_post($end_date_time); ?></span>
								<?php else : ?>

									<span class="c-element-delimeter font-subheading">-</span>
									<span class="c-element-date-number font-heading"><?php echo wp_kses_post($end_date_number); ?></span>
									<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('M', $end_timestamp)); ?></span>
								<?php endif; ?>
								<?php if ( $display_events_year ): ?>
								<span class="c-element-date-year"><?php echo ', ' . wp_kses_post($end_date_year); ?></span>
								<?php endif ?>


							<?php else : ?>
								<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
								<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
								<?php if ( $display_events_year ): ?>
								<span class="c-element-date-year"><?php echo ', ' . wp_kses_post($date_year); ?></span>
								<?php endif ?>
							<?php endif;
							?>
						</div>
						<div class="c-element-content pos-r">
							<h3 class="c-element-title"><?php the_title(); ?></h3>
							<?php if ( odrin_get_field('event_location') ) : ?>
								<div class="c-element-location special-subtitle-type-2"><?php echo wp_kses_post(odrin_get_field('event_location')); ?></div>
							<?php endif; ?>
						</div>
					</div> <!-- end c-element-content-wrapper -->
				</a>
			</div> <!-- end ContentElement -->

			<?php
			endwhile;
			?>

		</div> <!-- end EventsWrapper -->
	</div> <!-- end col-sm-12 -->
</div> <!-- end row -->
<?php if ( get_next_posts_link('', $events_query->max_num_pages) || get_previous_posts_link() ) : ?>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="PostNav mb-60">

			<div class="post-nav-next special-link"><?php next_posts_link(esc_html__( 'Next Page', 'odrin')  . ' <i class="fas fa-long-arrow-right nav-arrow"></i>', $events_query->max_num_pages ); ?></div>

			<div class="post-nav-prev special-link"><?php previous_posts_link('<i class="fas fa-long-arrow-left nav-arrow"></i> ' . esc_html__('Previous Page', 'odrin') ); ?></div>

		</div> <!-- end PostNav -->
	</div>
</div>
<?php endif; ?>

<?php
wp_reset_postdata(); ?>

<?php
if ( odrin_get_field('show_past_events') && empty($_GET['events_date']) ) {
	$past_events_number = odrin_get_field('past_events_number') ? intval(odrin_get_field('past_events_number')) : -1;
	$past_args = array(
		'post_type' => 'event',
		'posts_per_page' => $past_events_number,
		'orderby' => 'meta_value',
		'order' => 'desc',
		'paged' => 1,
		'meta_query' => array(
			'relation' => 'OR',
			array(
				'key'       => 'event_date',
				'value'     => date( "Ymd" ),
				'compare'   => '<',
				'type'      => 'DATETIME',
			),
			array(
				'key'       => 'event_end_date',
				'value'     => date( "Ymd" ),
				'compare'   => '<',
				'type'      => 'DATETIME',
			),
		),
	);

	$past_events_query = new WP_Query($past_args); ?>
	
	<div class="row mt-40">
		<div class="col-sm-12">
			<div class="c-element-divider text-center">
				<div class="c-element-divider-text font-subheading">
					<?php echo wp_kses_post(__('Past Events', 'odrin')); ?>
				</div>
				<div class="c-element-line"></div>
			</div>
		</div>
	</div>

	<?php if ($past_events_query->have_posts()) :  ?>
	<div class="row">
		<div class="col-md-12">
			<div class="EventsWrapper is-matchheight-group c-elements-cols-<?php echo esc_attr($columns_number); ?>">
				<?php while ($past_events_query->have_posts()) : $past_events_query->the_post();

				$event_image = odrin_get_field('event_image');
				?>

				<div class="ContentElement pos-r">

					<a href="<?php the_permalink(); ?>">
						<?php if ( $event_image ) : ?>
						<div class="c-element-content-wrapper section-light">
							<div class="bg-image" data-bg-image="<?php echo esc_url($event_image['sizes']['odrin_landscape_medium']); ?>"></div>
							<div class="overlay-dark"></div>
						<?php else : ?>
						<div class="c-element-content-wrapper section-dark">
						<?php endif; ?>
							<div class="c-element-date-wrapper pos-r">
								<?php 
								$date = new DateTime(odrin_get_field('event_date'));
								$timestamp = $date->getTimestamp();
								$date_number = $date->format("d");
								$date_year = $date->format("Y");
								if ( odrin_get_field('event_end_date') ) :

									$end_date = new DateTime(odrin_get_field('event_end_date'));
									$end_timestamp = $end_date->getTimestamp();
									$end_date_number = $end_date->format("d");
									$end_date_year = $end_date->format("Y");
									$end_date_time = $end_date->format("g:i a");
									?>
									<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
									<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('M', $timestamp)); ?></span>
									<?php if ( $date_number === $end_date_number ) : ?>
										<span class="c-element-date-time">, <?php echo wp_kses_post($date_time); ?></span>
										<span class="c-element-time-delimeter">-</span>
										<span class="c-element-date-time"><?php echo wp_kses_post($end_date_time); ?></span>
									<?php else : ?>

										<span class="c-element-delimeter font-subheading">-</span>
										<span class="c-element-date-number font-heading"><?php echo wp_kses_post($end_date_number); ?></span>
										<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('M', $end_timestamp)); ?></span>
									<?php endif; ?>
									<?php if ( $display_events_year ): ?>
									<span class="c-element-date-year"><?php echo ', ' . wp_kses_post($end_date_year); ?></span>
									<?php endif ?>


								<?php else : ?>
									<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
									<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
									<?php if ( $display_events_year ): ?>
									<span class="c-element-date-year"><?php echo ', ' . wp_kses_post($date_year); ?></span>
									<?php endif ?>
								<?php endif;
								?>
							</div>
							<div class="c-element-content pos-r">
								<h3 class="c-element-title"><?php the_title(); ?></h3>
								<?php if ( odrin_get_field('event_location') ) : ?>
									<div class="c-element-location special-subtitle-type-2"><?php echo wp_kses_post(odrin_get_field('event_location')); ?></div>
								<?php endif; ?>
							</div>
						</div> <!-- end c-element-content-wrapper -->
					</a>
				</div> <!-- end ContentElement -->

				<?php
				endwhile; ?>
			</div> <!-- end EventsWrapper -->
		</div> <!-- end col-sm-12 -->
	</div> <!-- end row -->
	<?php
	endif;
	wp_reset_postdata();

}
?>

<?php endif; ?>
<?php if ( !$events_query->have_posts() ) : ?>
<div class="mb-100 mt-60 text-center">
	<div class="ErrorHeading">
		<div class="special-subtitle"><?php esc_html_e('There are no upcoming events!', 'odrin') ?></div>
	</div>
</div>
<?php endif; ?>

