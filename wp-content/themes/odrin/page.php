<?php
get_header();
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if ( !odrin_get_field('full_width', get_the_ID(), false) ) : ?>
			<div class="container mt-100 mb-100">
				<div class="row">
					<div class="col-sm-12">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			<?php the_content(); ?>
		<?php endif; ?>
			
		<?php if ( comments_open() ) : ?>
			<div class="SinglePostComments container-fluid">
				<div class="row">
					<div class="CommentsArea col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2" id="comments">
								
						<?php comments_template('', true); ?>

					</div> <!-- end CommentsArea -->
				</div>
			</div> <!-- end SinglePostComments -->
		<?php endif; ?>


	<?php endwhile; else : ?>
		
		<div class="container mt-100 mb-100">
			<div class="row">
				<div class="col-sm-12">
					<div class="ErrorHeading">
						<div class="special-subtitle mb-20"><?php esc_html_e('Sorry, no posts were found!', 'odrin') ?></div>
						<div><?php get_search_form(); ?></div>
					</div>
				</div>
			</div>
		</div>
		
	<?php endif; ?>
			
</div><!-- end post -->

<?php get_footer(); ?>