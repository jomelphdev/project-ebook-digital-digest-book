<?php
$show_header = false;
$header_style = '';
$additional_classes = '';
$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';

if ( odrin_get_field('header_style') == 'no_header' )
{
	$show_header = false;
} else {
	$show_header = true;
}

if ( $show_header ) : ?>

<div class="EventsHeader pos-r mb-100">

	<?php if ( odrin_get_field('header_style') == '' || !class_exists('acf') ) {
		$header_style = 'title';
	} else {
		$header_style = odrin_get_field('header_style');
	}
	?>

	<?php if ( $header_style == 'custom_header' && odrin_get_field('background_image') ) : ?>
		<?php
			$image = odrin_get_field('background_image');
		?>
		<div class="bg-image" data-bg-image="<?php echo esc_url($image['sizes']['odrin_landscape_large']); ?>"></div>
		<?php if ( odrin_get_field('header_color_overlay') ) : ?>
		<div class="overlay-<?php echo esc_attr(odrin_get_field('header_color_overlay')); ?>"></div>
		<?php endif;

		if ( odrin_get_field('header_text_color') ) {
			$additional_classes = 'section-' . odrin_get_field('header_text_color');
			$additional_classes .= ' content-title-fullwidth'; 
		}

		?>
	<?php endif; ?>
	
	<div class="PageHeader container">
		<div class="row">
			<div class="col-sm-12">
				<?php if ( $header_style == 'title' ) { 
					$additional_classes .= ' content-title-fullwidth text-center'; 
				} ?>
				<div class="ContentTitle <?php echo esc_attr($additional_classes); ?>">
					<div class="SpecialHeading mb-80">
						<h1 class="special-title<?php echo esc_attr($title_classes); ?>"><?php the_title(); ?></h1>
					</div>
					<?php if ( odrin_get_field('show_filter') || odrin_get_field('show_categories_filter') || odrin_get_field('filter_text') ) : ?>
					<div class="EventsFilter">
						<?php if ( odrin_get_field('filter_text') ) : ?>
							<span class="events-filter-label special-subtitle-type-2 font-subheading"><?php echo wp_kses_post(odrin_get_field('filter_text')); ?></span>
						<?php endif; ?>
						<div class="events-filter-group">
							<?php //	stays 'show_filter' to support old field settings
							if ( odrin_get_field('show_filter') ) : 
								get_template_part( 'partials/content', 'events-date-filter' );
							endif;
							if ( odrin_get_field('show_category_filter') ) : 
								get_template_part( 'partials/content', 'events-categories-filter' ); 
							endif;
							?>
						</div>
					</div> <!-- end EventsFilter -->
					<?php endif; ?>
				</div>
				
				<?php if ( $header_style == 'featured_event' && odrin_get_field('featured_event') ) : ?>
				<?php 
					$featured_event_id = odrin_get_field('featured_event');
					$featured_event_image = odrin_get_field('event_image', $featured_event_id);
					$date = new DateTime(odrin_get_field('event_date', $featured_event_id));
					$timestamp = $date->getTimestamp();
					$date_number = $date->format("d");
					$date_time = $date->format("g:i a");
				?>
				<div class="FeaturedEvent pos-r">
					<div class="featured-event-meta-wrapper text-center">
						<div class="featured-event-meta">
							<div class="featured-event-label"><?php echo wp_kses_post(__('Featured Event', 'odrin')); ?></div>
							<?php if ( odrin_get_field('event_end_date', $featured_event_id) ) :

								$end_date = new DateTime(odrin_get_field('event_end_date', $featured_event_id));
								$end_timestamp = $end_date->getTimestamp();
								$end_date_number = $end_date->format("d");
								$end_date_time = $end_date->format("g:i a");
								?>
								<div class="featured-event-range-date">
									<span class="featured-event-delimeter font-subheading">-</span>
									<span class="featured-event-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
									<span class="featured-event-date-month"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
									<div class="featured-event-date-time font-subheading"><?php echo wp_kses_post($date_time); ?></div>
								</div>
								<div class="featured-event-range-date">
									<span class="featured-event-date-number font-heading"><?php echo wp_kses_post($end_date_number); ?></span>
									<span class="featured-event-date-month"><?php echo wp_kses_post(date_i18n('F', $end_timestamp)); ?></span>
									<div class="featured-event-date-time font-subheading"><?php echo wp_kses_post($end_date_time); ?></div>
								</div>
							<?php else : ?>
								<span class="featured-event-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
								<span class="featured-event-date-month"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
								<div class="featured-event-date-time font-subheading"><?php echo wp_kses_post($date_time); ?></div>
							<?php endif; ?>
							<a href="<?php echo esc_url(get_permalink($featured_event_id)); ?>" class="btn btn-small btn-light"><?php echo esc_html__('View Event', 'odrin'); ?></a>
						</div>
					</div>
					<a href="<?php echo esc_url(get_permalink($featured_event_id)); ?>">
						<?php if ( $featured_event_image ) : ?>
						<div class="featured-event-content section-light">
							<div class="bg-image" data-bg-image="<?php echo esc_url($featured_event_image['sizes']['odrin_landscape_large']); ?>"></div>
							<div class="overlay-dark"></div>
						<?php else : ?>
						<div class="featured-event-content section-dark">
						<?php endif; ?>
							<div class="event-content text-right pos-r">
								<h3><?php echo wp_kses_post(get_the_title($featured_event_id)); ?></h3>
								<?php if ( odrin_get_field('event_location', $featured_event_id) ) : ?>
									<div class="special-subtitle-type-2"><?php echo wp_kses_post(odrin_get_field('event_location', $featured_event_id)); ?></div>
								<?php endif; ?>
							</div>
						</div> <!-- end event-content-wrapper -->
					</a>
				</div>

				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<?php endif; ?>