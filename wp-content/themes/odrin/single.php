<?php
get_header();

if ( is_active_sidebar('main-sidebar') ) {
	$post_col_count = 'col-md-8 col-md-offset-0 col-sm-12 col-sm-offset-0';
	
} else {
	$post_col_count = 'col-sm-10 col-sm-offset-1';
}

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php odrin_count_post_views(get_the_ID()); ?>
	<article <?php post_class('SinglePost'); ?> id="post-<?php the_ID(); ?>">
		<div class="container mb-80">

			<div class="SinglePostContent row mb-40">

				<div class="<?php echo esc_attr($post_col_count); ?>">
					<?php 
					$text_classes = ( odrin_get_option('special_paragraph_letter') ) ? ' special-first-letter' : '';
					?>
					<div class="single-post-content-inner<?php echo esc_attr($text_classes); ?> mb-60">
						
						<?php 

						the_content(); 

						wp_link_pages( array(
								'before'      => '<div class="page-links text-center"><span class="page-links-title font-heading">' . esc_html__( 'Pages:', 'odrin' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>
					</div> <!-- end single-post-content-inner -->

					<div class="SinglePostFooter text-center mb-100">
						<?php do_action( '_action_odrin_after_post_content' ); ?>
						<?php if ( has_tag() ) : ?>
							<div class="single-post-footer-tags">
								<span class="single-post-footer-label"><?php esc_html_e('Tags:', 'odrin'); ?></span>
								<div class="single-post-footer-container">
									<span><?php the_tags('', ', '); ?></span>
								</div>
							</div> <!-- end footer-tags -->
						<?php endif; ?>
					</div> <!-- end SinglePostFooter -->

					<div class="SimplifiedPosts AdjacentPosts is-matchheight-group text-center pos-r mb-60">
						<?php 
						$next_post = get_adjacent_post(false, '', false);
						$prev_post = get_adjacent_post();
						if ($next_post) : ?>
						<div class="simplified-post-wrapper next-post mb-40">
							<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
								<?php if ( has_post_thumbnail($next_post) ) : ?>
									<?php $thumb_id = get_post_thumbnail_id($next_post->ID); ?>
									<div class="SimplifiedImage">
										<div class="bg-image" data-bg-image="<?php echo esc_url(wp_get_attachment_url($thumb_id)); ?>"></div>
									</div>
								<?php else : ?>
								<div class="mb-40"></div>
								<?php endif; ?>
								<div class="simplified-post-meta">
									<div class="ElementHeading">
										<h4 class="element-title"><?php echo get_the_title($next_post->ID) ?></h4>
									</div> <!-- end ElementHeading -->
									<div class="simplified-post-date"><span><?php echo esc_html(get_the_date(get_option('date_format'), $next_post->ID)); ?></span></div>
									<div class="simplified-post-text special-subtitle-type-2"><?php echo esc_html__('Next Post', 'odrin'); ?></div>
								</div>
							</a>
						</div>
						<?php endif;
						if ($prev_post) : ?>
						<div class="simplified-post-wrapper prev-post mb-40">
							<a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
								<?php if ( has_post_thumbnail($prev_post) ) : ?>
									<?php $thumb_id = get_post_thumbnail_id($prev_post->ID); ?>
									<div class="SimplifiedImage">
										<div class="bg-image" data-bg-image="<?php echo esc_url(wp_get_attachment_url($thumb_id)); ?>"></div>
									</div>
								<?php else : ?>
								<div class="mb-40"></div>
								<?php endif; ?>
								<div class="simplified-post-meta">
									<div class="ElementHeading">
										<h4 class="element-title"><?php echo get_the_title($prev_post->ID) ?></h4>
									</div> <!-- end ElementHeading -->
									<div class="simplified-post-date"><span><?php echo esc_html(get_the_date(get_option('date_format'), $prev_post->ID)); ?></span></div>
									<div class="simplified-post-text special-subtitle-type-2"><?php echo esc_html__('Previous Post', 'odrin'); ?></div>
								</div>
							</a>
						</div>
						<?php endif; ?>
					</div> <!-- end SimplifiedPosts -->

					<?php if ( comments_open() || get_comments_number() ) : ?>
						<div class="SinglePostComments mb-60">
							<div class="CommentsArea " id="comments">

								<?php comments_template('', true); ?>

							</div> <!-- end CommentsArea -->
						</div> <!-- end SinglePostComments -->
					<?php endif; ?>

				</div> <!-- end $post_col_count -->
				
				<?php get_sidebar('main'); ?>

			</div> <!-- end SinglePostContent -->
		</div> <!-- end container -->
	</article> <!-- end article -->

<?php endwhile; else : ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 mb-100 text-center">
				<div class="special-subtitle font-subheading mb-20"><?php esc_html_e('Sorry, no posts were found!', 'odrin') ?></div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<div class="search-subtitle"><?php get_search_form(); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>