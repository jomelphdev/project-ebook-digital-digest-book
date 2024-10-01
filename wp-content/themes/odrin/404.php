<?php
get_header();

$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';
$text_color = (odrin_get_option('404_text_color') == 'light') ? 'section-light' : '';
?>

<div class="ErrorPage text-center <?php echo esc_attr($text_color); ?> ">
	<div class="bg-color" data-bg-color="<?php echo esc_url(odrin_get_option('404_background_color')); ?>"></div>
	<?php 
	$image = odrin_get_option('404_image');
	if ( $image ) : 
	$image_src = wp_get_attachment_image_src($image['attachment_id'], 'odrin_landscape_large');
	$overlay_type = (odrin_get_option('404_image_overlay') != 'none') ? odrin_get_option('404_image_overlay') : '';
	?>
	
		<div class="bg-image" data-bg-image="<?php echo esc_url($image_src[0]); ?>"></div>
		<?php if ( $overlay_type ) : ?>
			<div class="overlay-<?php echo esc_attr($overlay_type); ?>"></div>
		<?php endif; // endif overlay_type ?>
	
	<?php endif; ?>
	<div class="error-404-wrapper">

			<div class="SpecialHeading mb-60">
				<h1 class="special-title<?php echo esc_attr($title_classes); ?>"><?php esc_html_e('Error 404', 'odrin'); ?></h1>
				<div class="special-subtitle">
					<?php esc_html_e('WHATEVER YOU WERE LOOKING FOR WAS NOT FOUND.', 'odrin'); ?>
				</div>
			</div>
			<a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back To Home', 'odrin'); ?></a>
	</div><!-- end error-404-wrapper -->
	
</div> <!-- end ContentTitle -->



<?php get_footer(); ?>