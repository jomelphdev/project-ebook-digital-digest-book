<?php
get_header();

if ( is_active_sidebar('main-sidebar') ) {
	$excerpt_col_count = 'col-md-8 col-md-offset-0 col-sm-12 col-sm-offset-0';
	
} else {
	$excerpt_col_count = 'col-sm-10 col-sm-offset-1';
}

?>

<div class="BlogHeader PageHeader container">
	<div class="row">
		<?php if ( odrin_get_option('special_heading_letter') ) : ?>
			<div class="ContentTitle col-md-8 col-md-offset-0 col-sm-12 col-sm-offset-0">
				<div class="SpecialHeading">
					<h2 class="special-title special-heading-letter"><?php esc_html_e('Search Results for: ', 'odrin'); ?><?php the_search_query(); ?></h2>
				</div>
			</div>
			<div class="blog-header-search col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-12 col-sm-offset-0 mt-60">
				<?php get_search_form(); ?>
			</div>
		<?php else : ?>
			<div class="ContentTitle col-md-8 col-md-offset-0 col-sm-12 col-sm-offset-0">
				<div class="SpecialHeading">
					<h2 class="special-title"><?php esc_html_e('Search Results for: ', 'odrin'); ?><?php the_search_query(); ?></h2>
				</div>
			</div>
			<div class="blog-header-search col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-12 col-sm-offset-0 mt-10">
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</div> <!-- end BlogHeader -->

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<div class="container mb-60">
		<div class="row">
			<div class="<?php echo esc_attr($excerpt_col_count); ?>">
		
			<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

				<article <?php post_class(esc_attr('Excerpt mb-80')); ?> id="post-<?php the_ID(); ?>">
			
					<?php if ( has_post_thumbnail() ) : ?>
					<?php $thumb_id = get_post_thumbnail_id($post->ID); ?>
					<div class="ExcerptImage">
						<?php echo wp_get_attachment_image( $thumb_id, 'odrin_landscape_large' ); ?>
					</div>
					<?php endif; ?>
					<div class="ExcerptContentWrapper pos-r">
						<div class="excerpt-date"><span><?php echo esc_html(get_the_date(get_option('date_format'))); ?></span></div>
						<div class="excerpt-header">
							<div class="ElementHeading">
								<a href="<?php the_permalink(); ?>"><h2 class="element-title"><?php the_title(); ?></h2></a>
							</div>
						</div>
						<div class="excerpt-content">
							<?php the_excerpt(); ?>
						</div>
						<div class="read-more"><a href="<?php the_permalink(); ?>" class="special-subtitle-type-2"><?php echo esc_html__('Read More', 'odrin'); ?><i class="fas fa-long-arrow-right nav-arrow"></i></a></div>
					</div>

				</article> <!-- end article -->

			<?php endwhile; ?>

			<?php if ( get_next_posts_link('', $wp_query->get_max_num_pages) || get_previous_posts_link() ) : ?>
				<div class="PostNav mb-60">

					<div class="post-nav-next special-link"><?php next_posts_link(esc_html__( 'Next Page', 'odrin')  . ' <i class="fas fa-long-arrow-right nav-arrow"></i>', $wp_query->max_num_pages ); ?></div>

					<div class="post-nav-prev special-link"><?php previous_posts_link('<i class="fas fa-long-arrow-left nav-arrow"></i> ' . esc_html__('Previous Page', 'odrin') ); ?></div>

				</div> <!-- end PostNav -->
			<?php endif; ?>

			</div> <!-- end $excerpt_col_count -->

			<?php get_sidebar('main'); ?>

			<?php
			wp_reset_postdata();
			?>

			<?php else : ?>
			
			<div class="ErrorHeading">
				<div class="special-subtitle"><?php esc_html_e('Sorry, no posts were found!', 'odrin') ?></div>
			</div>
			<a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back To Home', 'odrin'); ?></a>

			</div> <!-- end $excerpt_col_count -->

			<?php get_sidebar('main'); ?>

			<?php endif; ?>

		</div> <!-- end row -->
	</div> <!-- end container -->
</div> <!-- end post -->

<?php get_footer(); ?>