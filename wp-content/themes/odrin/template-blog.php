<?php
/* Template Name: Blog */
get_header();
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<div class="container mt-40 mb-60">
		
		<?php get_template_part( 'loop/loop', 'posts' ); ?>

	</div> <!-- end container -->
</div>

<?php get_footer(); ?>