<?php

get_header();

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article <?php post_class('SingleEvent'); ?> id="post-<?php the_ID(); ?>">
		<div class="container mb-80">

			<div class="SinglePostContent row mt-100 mb-40">

				<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 mb-100">
					<?php 
					$text_classes = ( odrin_get_option('special_paragraph_letter') ) ? ' special-first-letter' : '';
					?>
					<div class="single-post-content-inner<?php echo esc_attr($text_classes); ?> mb-60">

						<?php 

						the_content(); 

						wp_link_pages( array(
								'before'      => '<div class="page-links text-center"><span class="page-links-title">' . esc_html__( 'Pages:', 'odrin' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>
						
					</div> <!-- end single-post-content-inner -->

					<div class="SinglePostFooter text-center mb-100">
						<div class="single-post-footer-share">
							<div class="SocialShare is-shareable" data-post-url="<?php echo esc_url(get_permalink($post->ID)); ?>">
								<span class="single-post-footer-label"><?php esc_html_e('Share:', 'odrin'); ?></span>
								<div class="single-post-footer-container">
									<a href="#" class="facebook" title="<?php esc_attr_e('Share on Facebook', 'odrin'); ?>"><i class="fab fa-facebook"></i></a>
									<a href="#" class="twitter" title="<?php esc_attr_e('Share on Twitter', 'odrin'); ?>"><i class="fab fa-twitter"></i></a>
									<a href="#" class="pinterest" title="<?php esc_attr_e('Share on Pinterest', 'odrin'); ?>"><i class="fab fa-pinterest-p"></i></a>
								</div>
							</div>
						</div> <!-- end single-post-share -->
						<?php 
						$parent_events_id = odrin_parent_events_id(); 
						if ( $parent_events_id ) : ?>
						<div class="single-post-footer-back">
							<span class="single-post-footer-label"><a href="<?php echo get_permalink($parent_events_id) ;?>" class="back-to-events"><?php esc_html_e('Back To All Events', 'odrin'); ?></a></span>
						</div>
						<?php else : 
							if ( current_user_can('publish_pages') ) : ?>
							<span class="admin-alert"><?php echo wp_kses_post(__('<strong>Note!</strong> Make sure than you have published one (and only one) page that uses the Page Template "Events".', 'odrin')); ?></span>
							<?php endif; ?>
						<?php endif; ?>
					</div> <!-- end SinglePostFooter -->

				</div> <!-- end col-sm-8 -->

				<div class="col-sm-12">

					<div class="AdjacentEvents EventsWrapper text-center mb-100 is-matchheight-group c-elements-cols-2">
						<?php  

						$index = false;
						$events_ids = array();
						$args = array(
							'post_type' => 'event',
							'meta_key' => 'event_date',
							'meta_type' => 'DATETIME',
							'orderby' => 'meta_value',
							'order' => 'asc',
							'posts_per_page' => -1,
							'paged' => 1
							);
						$events_query = new WP_Query( $args );

						if ($events_query->have_posts()) : while ($events_query->have_posts()) : $events_query->the_post();

							array_push($events_ids, get_the_ID());

						endwhile;endif;
						wp_reset_postdata();

						$current_event_id = get_the_ID();
						$index = array_search($current_event_id, $events_ids);
						$next_event_id = '';
						$prev_event_id = '';
						
						if ( $index !== false ) {
							$prev_event_id = $index > 0 ? $events_ids[$index - 1] : '';
							$next_event_id = (($index + 1) < count($events_ids)) ? $events_ids[$index + 1] : '';
						}

						?>

						<?php 
						if ( $prev_event_id ) : ?>
						<div class="ContentElement prev-event pos-r">
							<a href="<?php echo esc_url(get_permalink($prev_event_id)); ?>">
								<?php 
									$prev_event_image = odrin_get_field('event_image', $prev_event_id);
									$date = new DateTime(odrin_get_field('event_date', $prev_event_id));
									$timestamp = $date->getTimestamp();
									$date_number = $date->format("d");
								?>
								<?php if ( $prev_event_image ) : ?>
								<div class="c-element-content-wrapper section-light">
									<div class="bg-image" data-bg-image="<?php echo esc_url($prev_event_image['sizes']['odrin_landscape_medium']); ?>"></div>
									<div class="overlay-dark"></div>
								<?php else : ?>
								<div class="c-element-content-wrapper pos-r">
								<?php endif; ?>
									<div class="c-element-date-wrapper pos-r">
										<?php 
										if ( odrin_get_field('event_end_date', $prev_event_id) ) :
											$end_date = new DateTime(odrin_get_field('event_end_date', $prev_event_id));
											$end_timestamp = $end_date->getTimestamp();
											$end_date_number = $end_date->format("d");
											?>
											<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
											<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
											<span class="c-element-delimeter font-subheading">-</span>
											<span class="c-element-date-number font-heading"><?php echo wp_kses_post($end_date_number); ?></span>
											<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('F', $end_timestamp)); ?></span>
										<?php else : ?>
												<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
												<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
										<?php endif;
										?>
									</div>
									<div class="c-element-content pos-r">
										<h3 class="c-element-title"><?php echo wp_kses_post(get_the_title($prev_event_id)); ?></h3>
										<?php if ( odrin_get_field('event_location', $prev_event_id) ) : ?>
											<div class="c-element-location special-subtitle-type-2 pos-r"><?php echo wp_kses_post(odrin_get_field('event_location', $prev_event_id)); ?></div>
										<?php endif; ?>
									</div>
								</div> <!-- end c-element-content-wrapper -->
							</a>
						</div> <!-- end ContentElement -->
						<?php endif;
						if ( $next_event_id ) : ?>
						<div class="ContentElement next-event pos-r">
							<a href="<?php echo esc_url(get_permalink($next_event_id)); ?>">
								<?php 
									$next_event_image = odrin_get_field('event_image', $next_event_id);
									$date = new DateTime(odrin_get_field('event_date', $next_event_id));
									$timestamp = $date->getTimestamp();
									$date_number = $date->format("d");
								?>
								<?php if ( $next_event_image ) : ?>
								<div class="c-element-content-wrapper section-light">
									<div class="bg-image" data-bg-image="<?php echo esc_url($next_event_image['sizes']['odrin_landscape_medium']); ?>"></div>
									<div class="overlay-dark"></div>
								<?php else : ?>
								<div class="c-element-content-wrapper section-dark">
								<?php endif; ?>
									<div class="c-element-date-wrapper pos-r">
										<?php 
										if ( odrin_get_field('event_end_date', $next_event_id) ) :
											$end_date = new DateTime(odrin_get_field('event_end_date', $next_event_id));
											$end_timestamp = $end_date->getTimestamp();
											$end_date_number = $end_date->format("d");
											?>
											<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
											<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
											<span class="c-element-delimeter font-subheading">-</span>
											<span class="c-element-date-number font-heading"><?php echo wp_kses_post($end_date_number); ?></span>
											<span class="c-element-date-month"><?php echo wp_kses_post(date_i18n('F', $end_timestamp)); ?></span>
										<?php else : ?>
												<span class="c-element-date-number font-heading"><?php echo wp_kses_post($date_number); ?></span>
												<span class="c-element-date-month with-delimeter"><?php echo wp_kses_post(date_i18n('F', $timestamp)); ?></span>
										<?php endif;
										?>
									</div>
									<div class="c-element-content pos-r">
										<h3 class="c-element-title"><?php echo wp_kses_post(get_the_title($next_event_id)); ?></h3>
										<?php if ( odrin_get_field('event_location', $next_event_id) ) : ?>
											<div class="c-element-location special-subtitle-type-2 pos-r"><?php echo wp_kses_post(odrin_get_field('event_location', $next_event_id)); ?></div>
										<?php endif; ?>
									</div>
								</div> <!-- end c-element-content-wrapper -->
							</a>
						</div> <!-- end ContentElement -->
						<?php endif; ?>
					</div> <!-- end AdjacentEvents -->

				</div> <!-- end col-sm-12 -->

				<?php if ( comments_open() ) : ?>
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<div class="SinglePostComments">
							<div class="CommentsArea " id="comments">
										
								<?php comments_template('', true); ?>

							</div> <!-- end CommentsArea -->
						</div> <!-- end SinglePostComments -->
					</div> <!-- end col-sm-8 -->
				<?php endif; ?>

			</div> <!-- end SinglePostContent -->
		</div> <!-- end container -->
	</article> <!-- end article -->

<?php endwhile; else : ?>
	
	<div class="container mt-100 mb-100">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 text-center">
				<div class="ErrorHeading mt-100 mb-100">
					<div class="special-subtitle mb-20"><?php esc_html_e('Sorry, no posts were found!', 'odrin') ?></div>
					<div><?php get_search_form(); ?></div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
