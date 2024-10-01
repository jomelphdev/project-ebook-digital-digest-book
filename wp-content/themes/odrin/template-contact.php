<?php
/* Template Name: Contact */
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="TemplateContact">

		<?php if ( odrin_get_field('show_map') && odrin_get_field('location') && odrin_get_option('google_api') ) : ?>
			<?php 
				$location = odrin_get_field('location'); 
				$marker_atts = '';
				$marker_image_url = '';
				if ( odrin_get_field('marker') ) {
					$marker_image = odrin_get_field('marker');
					$marker_image_url = $marker_image['url'];
					$marker_atts = 'data-image="' . esc_url($marker_image['url']) .'"';
				}
			?>
			
			<div class="is-google-map" data-gmap-zoom="<?php echo esc_attr(get_field('map_zoom')); ?>" data-gmap-lat="<?php echo esc_attr($location['lat']); ?>" data-gmap-lng="<?php echo esc_attr($location['lng']); ?>" data-gmap-marker="<?php echo esc_attr($marker_image_url); ?>">
			</div>
		<?php endif ?>

		<div class="container">
			<div class="contact-form-section mt-100 mb-80">
				<div class="row">
					<?php  
					$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';
					?>
					<?php if ( get_the_content() ) : ?>
					<div class="col-sm-12 col-md-7 col-lg-6">
						<div class="SpecialHeading mb-60">
							<h1 class="special-title<?php echo esc_attr($title_classes); ?> mb-20"><?php the_title(); ?></h1>
							<?php if ( odrin_get_field('subtitle') ) : ?>
							<div class="special-subtitle"><span><?php echo wp_kses_post(odrin_get_field('subtitle')); ?></span></div>
							<?php endif; ?>
						</div> <!-- end SpecialHeading -->
						<div class="contact-form-section-text">
							<?php the_content(); ?>
						</div>
					</div><!-- end col-md-7 -->
					<div class="col-sm-12 col-md-5 col-lg-6">
					<?php else : ?>
					<div class="col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
						<div class="SpecialHeading mb-60">
							<h1 class="special-title<?php echo esc_attr($title_classes); ?> mb-20"><?php the_title(); ?></h1>
							<?php if ( odrin_get_field('subtitle') ) : ?>
							<div class="special-subtitle"><span><?php echo wp_kses_post(odrin_get_field('subtitle')); ?></span></div>
							<?php endif; ?>
						</div> <!-- end SpecialHeading -->
					<?php endif; ?>
						<div class="contact-form-section-cf7">
						<?php 
						if ( odrin_get_field('contact_form_7_shortcode') ) {
							$cf7_shortcode = wp_kses_post(odrin_get_field('contact_form_7_shortcode'));
							echo do_shortcode($cf7_shortcode);  
						}
						?>
						</div>
					</div><!-- end col-md-5 -->
				</div><!-- end row -->
			</div><!-- end contact-form-section -->
		</div><!-- end container -->

	</div> <!-- end TemplateContactDesktop -->
	
</div><!-- end post -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>