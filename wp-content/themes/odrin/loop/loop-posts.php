<?php 

if ( is_active_sidebar('main-sidebar') ) {
	$excerpt_col_count = 'col-md-8 col-md-offset-0 col-sm-12 col-sm-offset-0';
	
} else {
	$excerpt_col_count = 'col-sm-10 col-sm-offset-1';
}

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'paged' => get_query_var( 'paged' )
	);
$posts_query = new WP_Query($args);

?>

<div class="row">
	<div class="<?php echo esc_attr($excerpt_col_count); ?>">
	<?php
	if ( $posts_query->have_posts() ) : while ($posts_query->have_posts()) : $posts_query->the_post(); ?>

		<article <?php post_class(esc_attr('Excerpt mb-100')); ?> id="post-<?php the_ID(); ?>">
			
			<?php if ( has_post_thumbnail() ) : ?>
			<?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
			<div class="ExcerptImage">
				<?php echo wp_get_attachment_image( $thumb_id, 'odrin_landscape_large' ); ?>
			</div>
			<div class="ExcerptContentWrapper pos-r">
			<?php else : ?>
			<div class="ExcerptContentWrapper mt-80 pos-r">
			<?php endif; ?>
				<div class="excerpt-date"><span><?php echo esc_html(get_the_date(get_option('date_format'))); ?></span></div>
				<div class="excerpt-header">
					<div class="ElementHeading">
						<a href="<?php the_permalink(); ?>"><h2 class="element-title"><?php the_title(); ?></h2></a>
					</div>
				</div>
				<div class="excerpt-content">
					<?php the_excerpt(); ?>
				</div>
				<div class="read-more"><a href="<?php the_permalink(); ?>" class="special-subtitle-type-2"><?php echo esc_html__('Read More', 'odrin'); ?></a></div>
			</div>

		</article> <!-- end article -->

	<?php endwhile; ?>
	<?php if ( get_next_posts_link('', $posts_query->max_num_pages) || get_previous_posts_link() ) : ?>
		<div class="PostNav mb-60">

			<div class="post-nav-next special-link"><?php next_posts_link(esc_html__( 'Next Page', 'odrin')  . ' <i class="fas fa-long-arrow-right nav-arrow"></i>', $posts_query->max_num_pages ); ?></div>

			<div class="post-nav-prev special-link"><?php previous_posts_link('<i class="fas fa-long-arrow-left nav-arrow"></i> ' . esc_html__('Previous Page', 'odrin') ); ?></div>

		</div> <!-- end PostNav -->
	<?php endif; ?>
	
	</div> <!-- end $excerpt_col_count -->

	<?php get_sidebar('main'); ?>

	<?php
	wp_reset_postdata();
	?>
	<?php endif; ?>

</div> <!-- end row -->