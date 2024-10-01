<?php  
/**
* ----------------------------------------------------------------------------------------
*    Latest Events Widget
* ----------------------------------------------------------------------------------------
*/
Class Odrin_Widget_Latest_Events extends WP_Widget {
	
	public function __construct() {
		$widget_ops = array( 'description' => esc_html__('Shows the events.','odrin') );
		parent::__construct( 'latest_events', esc_html__('[Odrin] Latest Events', 'odrin'), $widget_ops );
	}

	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget-title', $instance['title']);
		$show_past_events = isset( $instance['show_past_events'] ) ? $instance['show_past_events'] : false;

		echo $before_widget;

		if( $title ) {
			echo $before_title . $title . $after_title;
		}

		$args = array(
			'post_type' => 'event',
			'posts_per_page' => $instance['past_events_number'],
			'orderby' => 'meta_value',
			'order' => 'asc'
		);

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

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() || $show_past_events) : ?>
			<?php
			while ( $the_query->have_posts() ) :
				$the_query->the_post(); ?>
				<article <?php post_class(); ?>>
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<div class="WidgetPostContent">

						<?php $event_image = odrin_get_field('event_image'); ?>
						<?php if ( $event_image ) : ?>
						
							<div class="bg-image" data-bg-image="<?php echo esc_url($event_image['sizes']['odrin_landscape_medium']); ?>"></div>
							<div class="overlay-dark"></div>
						
						<?php else : ?>
						
							<div class="overlay-diagonal-lines"></div>

						<?php endif; ?>

							<div class="popular-posts-header">
								<h4 class="popular-posts-title"><?php the_title(); ?></h4>

								<?php 
								$date = new DateTime(odrin_get_field('event_date'));
								$timestamp = $date->getTimestamp();
								$date_number = $date->format("d");
								$date_year = $date->format("Y");
								?>
								<div class="popular-posts-meta-extra font-subheading">	
								<?php if ( odrin_get_field('event_end_date') ) :

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

								<?php else : ?>
									<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
									<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
								<?php endif;
								?>
								</div>
							</div>

						</div> <!-- end WidgetPostContent -->
					</a>

				</article>

			<?php
			endwhile; //the_query ?>
		<?php
		endif; //the_query

		wp_reset_postdata();

		if ( $show_past_events && $instance['events_number'] > 0 ) {
			$past_args = array(
				'post_type' => 'event',
				'posts_per_page' => $instance['events_number'],
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

			<?php
			while ( $past_events_query->have_posts() ) :
				$past_events_query->the_post(); ?>
				<article <?php post_class(); ?>>
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<div class="WidgetPostContent">

						<?php $event_image = odrin_get_field('event_image'); ?>
						<?php if ( $event_image ) : ?>
						
							<div class="bg-image" data-bg-image="<?php echo esc_url($event_image['sizes']['odrin_landscape_medium']); ?>"></div>
							<div class="overlay-dark"></div>
						
						<?php else : ?>
						
							<div class="overlay-diagonal-lines"></div>

						<?php endif; ?>

							<div class="popular-posts-header">
								<h4 class="popular-posts-title"><?php the_title(); ?></h4>

								<?php 
								$date = new DateTime(odrin_get_field('event_date'));
								$timestamp = $date->getTimestamp();
								$date_number = $date->format("d");
								$date_year = $date->format("Y");
								?>
								<div class="popular-posts-meta-extra font-subheading">	
								<?php if ( odrin_get_field('event_end_date') ) :

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

								<?php else : ?>
									<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
									<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
								<?php endif;
								?>
								</div>
							</div>

						</div> <!-- end WidgetPostContent -->
					</a>

				</article>

			<?php
			endwhile; // the_query 
		}

		echo $after_widget;
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['events_number'] = strip_tags($new_instance['events_number']);
		$instance['past_events_number'] = strip_tags($new_instance['past_events_number']);
		$instance['show_past_events'] = isset( $new_instance['show_past_events'] ) ? (bool) $new_instance['show_past_events'] : false;

		return $instance;
	}

	public function form($instance) {
		$defaults = array(
			'title' => esc_html__('Events', 'odrin'),
			'events_number' => 5,
			'past_events_number' => 0
		);

		$instance = wp_parse_args((array) $instance, $defaults);

		$show_past_events = isset( $instance['show_past_events'] ) ? (bool) $instance['show_past_events'] : false;
		?>
		
		<p>
			<label for="<?php echo esc_url($this->get_field_id('title')) ?>"><?php esc_html_e('Title', 'odrin') ?></label>
			<input type="text" id="<?php echo esc_url($this->get_field_id('title')) ?>" name="<?php echo esc_attr($this->get_field_name('title')) ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?> ">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('events_number')) ?>"><?php esc_html_e('Number of Events', 'odrin') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id('events_number')) ?>" name="<?php echo esc_attr($this->get_field_name('events_number')) ?>" class="widefat" value="<?php echo esc_attr($instance['events_number']); ?> ">
		</p>
		<!-- Show Past Events -->
		<p>
			<input class="checkbox" type="checkbox"<?php checked( $show_past_events ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_past_events' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_past_events' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id('show_past_events')); ?>"><?php esc_html_e('Show Past Events', 'poet') ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('past_events_number')) ?>"><?php esc_html_e('Number of Past Events', 'odrin') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id('past_events_number')) ?>" name="<?php echo esc_attr($this->get_field_name('past_events_number')) ?>" class="widefat" value="<?php echo esc_attr($instance['past_events_number']); ?> ">
		</p>

		<?php
	}

}
?>