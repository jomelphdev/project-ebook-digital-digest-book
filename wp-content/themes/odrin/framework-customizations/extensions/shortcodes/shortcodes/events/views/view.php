<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$number_of_events = $atts['number_of_events'] ? $atts['number_of_events'] : -1;
$columns_number = $atts['columns_number'] ? $atts['columns_number'] : 2;
$view_all = $atts['view_all'];
$show_past_events = $atts['show_past_events'];


/* Hidden/Shown Events Categories */
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

$args = array(
	'post_type' => 'event',
	'posts_per_page' => $number_of_events,
	'orderby' => 'meta_value',
	'order' => 'asc',
	'paged' => 1,
	'meta_query' => array(
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
	),
);

if( !empty($specific_cats) ) {
	if ( $show_hide_cats == 'hide' ) {
		$args['tax_query'] = array(array(
			'taxonomy' => 'event_category',
			'field' => 'term_id',
			'terms' => $specific_cats_ids,
			'operator' => 'NOT IN'
		));
	} else {
		$args['tax_query'] = array(array(
			'taxonomy' => 'event_category',
			'field' => 'term_id',
			'terms' => $specific_cats_ids,
			'operator' => 'IN'
		));
	}
}

$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

// WOW Animation
$wow_classes = '';
$wow_data = '';

if ( isset($atts['animation_on_scroll']) && $atts['animation_on_scroll']['animation_enable'] == 'yes') {
	$wow_classes = 'is-wow ' . $atts['animation_on_scroll']['yes']['animation_type'];

	if ( isset($atts['animation_on_scroll']['yes']['animation_delay']) ) {
		$wow_data =  'data-wow-delay="' . ($atts['animation_on_scroll']['yes']['animation_delay'] / 1000) . 's"';
	}
	
}
?>

<div class ="<?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>

<?php

	$events_count = 0;
	$events_query = new WP_Query($args); 
	?>

	<div class="EventsWrapper is-matchheight-group c-elements-cols-<?php echo esc_attr($columns_number); ?>">

		<?php
		if ($events_query->have_posts()) : while ($events_query->have_posts()) : $events_query->the_post();

		$events_count++;
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
							?>
							<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
							<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('M', $timestamp)); ?></span>
							<span class="c-element-delimeter font-subheading">-</span>
							<span class="c-element-date-number font-heading"><?php echo wp_kses_post($end_date_number); ?></span>
							<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('M', $end_timestamp)); ?></span>
							<?php if ( $atts['display_year'] ): ?>
							<span class="c-element-date-year"><?php echo ', ' . wp_kses_post($end_date_year); ?></span>
							<?php endif ?>

						<?php else : ?>
							<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
							<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
							<?php if ( $atts['display_year'] ): ?>
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
		endif;
		wp_reset_postdata();
		?>

		<?php  
		$events_count = $number_of_events - $events_count;
		if ( $show_past_events == 'true' && $events_count > 0 ) :
			$past_args = array(
				'post_type' => 'event',
				'posts_per_page' => $events_count,
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

			<?php if ($past_events_query->have_posts()) : while ($past_events_query->have_posts()) : $past_events_query->the_post();

			$event_image = odrin_get_field('event_image');
			?>

			<div class="row">
				<div class="col-md-12">
					<div class="EventsWrapper is-matchheight-group c-elements-cols-<?php echo esc_attr($columns_number); ?>">

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
											?>
											<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
											<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('M', $timestamp)); ?></span>
											<span class="c-element-delimeter font-subheading">-</span>
											<span class="c-element-date-number font-heading"><?php echo wp_kses_post($end_date_number); ?></span>
											<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('M', $end_timestamp)); ?></span>
											<?php if ( $atts['display_year'] ): ?>
												<span class="c-element-date-year"><?php echo ', ' . wp_kses_post($end_date_year); ?></span>
											<?php endif ?>

										<?php else : ?>
											<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
											<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
											<?php if ( $atts['display_year'] ): ?>
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
					</div> <!-- end EventsWrapper -->
				</div> <!-- end col-sm-12 -->
			</div> <!-- end row -->
			<?php
			endwhile;
			endif;
			wp_reset_postdata();
			?>
		<?php 
		endif;
		?>

	</div> <!-- end EventsWrapper -->

	<?php if ( $view_all['view_all'] == 'true') : ?>
		<?php $parent_events_id = odrin_parent_events_id(); 
		if ( $parent_events_id ) : ?>
		<div class="c-element-show-more special-link text-right">
			<a href="<?php echo get_permalink($parent_events_id) ;?>"><?php echo wp_kses_post($view_all['true']['label']); ?></a>
		</div>
		<?php else : 
			if ( current_user_can('publish_pages') ) : ?>
			<span class="admin-alert"><?php echo wp_kses_post(__('<strong>Note!</strong> Make sure than you have published one (and only one) page that uses the Page Template "Events" in order to display the View All button.', 'odrin')); ?></span>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
	
</div><!-- end shortcode-id -->