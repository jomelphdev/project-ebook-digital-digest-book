<?php
/* Template Name: Events */
get_header();
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div class="container mb-60">

			<div class="row mb-80">
				<div class="col-sm-12">
					<?php the_content(); ?>
				</div>
			</div>

		<?php 

		get_template_part( 'loop/loop', 'events' ); 

		?>
	</div> <!-- end container -->

</div>

<?php get_footer(); ?>