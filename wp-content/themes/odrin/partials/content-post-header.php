<?php 
$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';
?>
<div class="SinglePostHeader text-center mb-100">

<?php if ( !has_post_thumbnail() ) : ?>

	<div class="ContentTitle">
		<div class="container mt-40 mb-40">
			<div class="row">
				<div class="col-sm-12">
					<span class="single-post-meta-date"><?php echo esc_html(get_the_date(get_option('date_format')));?></span>
					<div class="SpecialHeading mt-60 mb-60">
						<h1 class="special-title<?php echo esc_attr($title_classes); ?> mb-20"><?php the_title(); ?></h1>
					</div>
					<div class="special-subtitle">
						<span class="single-post-meta-categories"><?php the_category(' / '); ?></span>
					</div>
				</div>
			</div><!-- end row -->
		</div>	<!-- end container -->
	</div> <!-- end ContentTitle -->

<?php else : ?>

	<?php
		$thumb_id = get_post_thumbnail_id($post->ID);
		$image_src = wp_get_attachment_image_src($thumb_id, 'odrin_landscape_large');
		$image_url = esc_url($image_src[0]);
	?>
	<div class="bg-image is-parallax" data-bg-image="<?php echo esc_url($image_url); ?>"></div>
	<div class="overlay-dark"></div>
	<div class="container mt-40 mb-40">
		<div class="row">
			<div class="col-sm-12 section-light">
				<span class="single-post-meta-date"><?php echo esc_html(get_the_date(get_option('date_format')));?></span>
				<div class="SpecialHeading mt-60 mb-60">
					<h1 class="special-title<?php echo esc_attr($title_classes); ?> mb-20"><?php the_title(); ?></h1>
				</div>
				<div class="special-subtitle">
					<span class="single-post-meta-categories"><?php the_category(' / '); ?></span>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

</div> <!-- end SinglePostHeader -->