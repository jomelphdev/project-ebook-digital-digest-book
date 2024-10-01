<?php

$event_image = odrin_get_field('event_image');
$date = new DateTime(odrin_get_field('event_date'));
if ( odrin_get_field('event_end_date') ) {
	$end_date = new DateTime(odrin_get_field('event_end_date'));
	$end_timestamp = $end_date->getTimestamp();
	$end_date_number = $end_date->format("d");
	$end_date_time = $end_date->format("g:i a");
} else {
	$end_date = '';
}
$timestamp = $date->getTimestamp();
$date_number = $date->format("d");
$date_time = $date->format("g:i a");
$additional_information = odrin_get_field('additional_information');
$event_map_location = odrin_get_field('event_map_location');
$additional_classes = '';
$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';

$item_terms = wp_get_post_terms(get_the_ID(), 'event_category');

if ( ! empty( $item_terms ) && ! is_wp_error( $item_terms ) ){
	$term_names_array = array();

	foreach( $item_terms as $term ) {
		array_push($term_names_array,$term->name);
	}

}

?>

<div class="SinglePostHeader SingleEventHeader">
		
	<?php if ( $event_image ) : ?>
	<div class="bg-image is-parallax" data-bg-image="<?php echo esc_url($event_image['sizes']['odrin_landscape_large']); ?>"></div>
	<div class="overlay-dark"></div>
	<div class="container section-light mt-100 mb-100">
	<?php else : ?>
	<div class="container mt-40 mb-80">
	<?php endif; ?>
		<div class="row">
			<div class="col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1">
				<?php if ( !empty($term_names_array) ) : ?>
				<div class="special-subtitle mb-80"><?php echo implode(', ', $term_names_array); ?></div>
				<?php endif; ?>
				<div class="SpecialHeading mb-80">
					<h1 class="special-title<?php echo esc_attr($title_classes); ?>"><?php the_title(); ?></h1>
				</div>
				<?php if ( odrin_get_field('event_location') ) : ?>
					<div class="single-event-location">
						<?php if ( odrin_get_field('event_location_url') ) : ?>
						<a href="<?php echo esc_url(odrin_get_field('event_location_url')); ?>">
							<i class="icon-map"></i><div class="special-subtitle-type-2"><?php echo wp_kses_post(odrin_get_field('event_location')); ?></div>
						</a>
						<?php else : ?>
						<i class="icon-map"></i><div class="special-subtitle-type-2"><?php echo wp_kses_post(odrin_get_field('event_location')); ?></div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="SingleEventDate">
		<div class="single-event-date">
			<?php if ( $end_date ) : ?>
			<span class="single-event-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
			<span class="single-event-date-month"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
			<span class="single-event-date-time font-subheading"><?php echo wp_kses_post($date_time); ?></span>
			<span class="single-event-delimeter font-subheading">-</span>
			<span class="single-event-date-number font-heading"><?php echo wp_kses_post($end_date_number); ?></span>
			<span class="single-event-date-month"><?php echo wp_kses_post(date_i18n('F', $end_timestamp)); ?></span>
			<span class="single-event-date-time font-subheading"><?php echo wp_kses_post($end_date_time); ?></span>
			<?php else : ?>
			<span class="single-event-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
			<span class="single-event-date-month"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
			<span class="single-event-date-time with-delimeter font-subheading"><?php echo wp_kses_post($date_time); ?></span>
			<?php endif; ?>
		</div>
	</div>

</div> <!-- end SinglePostHeader -->

<div class="SingleEventMetaHeader">

	<?php if ( $additional_information ) : ?>
		<?php if ( !$event_map_location ) {
			$additional_classes = ' full-width';
		}
		?>
		<div class="single-event-meta-wrapper<?php echo esc_attr($additional_classes); ?>">
			<div class="information-wrapper">
				<div class="ElementHeading">
					<h3 class="element-title"><?php echo esc_html__('Additional Information', 'odrin') ?></h3>
				</div>
				<ul class="information-items-wrapper">
					<?php foreach ($additional_information as $key => $value) : ?>
						<li class="information-item font-subheading">
							<?php if ( $value['label'] ) : ?>
							<span class="information-label"><?php echo wp_kses_post($value['label']); ?></span>
							<?php endif; ?>
							<?php if ( $value['text'] ) : ?>
								<?php if ( $value['text_url'] ) : ?>
									<a href="<?php echo esc_url($value['text_url']); ?>"><span class="information-text"><?php echo wp_kses_post($value['text']); ?></span></a>
								<?php else : ?>
									<span class="information-text"><?php echo wp_kses_post($value['text']); ?></span>
								<?php endif; ?>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul> <!-- end information-wrapper -->
			</div>

		</div> <!-- end single-event-information -->
	<?php endif; ?>

	<?php if ( $event_map_location ) : ?>
		<?php if ( !$additional_information ) {
			$additional_classes = ' full-width';
		}
		?>
		<div class="single-event-meta-wrapper<?php echo esc_attr($additional_classes); ?>">
			<div class="is-google-map" data-gmap-zoom="15" data-gmap-lat="<?php echo esc_attr($event_map_location['lat']); ?>" data-gmap-lng="<?php echo esc_attr($event_map_location['lng']); ?>" data-gmap-marker="">
			</div>
		</div>
	<?php endif; ?>

</div> <!-- end SingleEventMetaHeader -->