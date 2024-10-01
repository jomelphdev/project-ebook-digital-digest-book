<?php

$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';
$additional_classes = '';
$show_search = odrin_get_field('show_search') ? true : false;

?>

<div class="BlogHeader pos-r mb-100">

	<?php if ( odrin_get_field('background_image') ) : ?>
		<?php
			$image = odrin_get_field('background_image');
		?>
		<div class="bg-image" data-bg-image="<?php echo esc_url($image['sizes']['odrin_landscape_large']); ?>"></div>
		<?php if ( odrin_get_field('header_color_overlay') && odrin_get_field('header_color_overlay') != 'none' ) : ?>
		<div class="overlay-<?php echo esc_attr(odrin_get_field('header_color_overlay')); ?>"></div>
		<?php endif;

		if ( odrin_get_field('header_text_color') ) {
			$additional_classes = 'section-' . odrin_get_field('header_text_color');
		}

		?>
	<?php endif; ?>
	<div class="PageHeader container">
		<div class="row">
			<div class="ContentTitle col-md-8 col-md-offset-0 col-sm-12 col-sm-offset-0 <?php echo esc_attr($additional_classes); ?>">
				<div class="SpecialHeading">
					<h1 class="special-title<?php echo esc_attr($title_classes); ?>"><?php the_title(); ?></h1>
					<?php if ( odrin_get_field('header_subtitle') ) : ?>
					<div class="special-subtitle"><?php echo wp_kses_post(odrin_get_field('header_subtitle')); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( odrin_get_field('show_search') ) : ?>
			<div class="blog-header-search col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-12 col-sm-offset-0">
				<?php get_search_form(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	
</div> <!-- end BlogHeader -->