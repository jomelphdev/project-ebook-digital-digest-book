<?php if ( !odrin_get_field('hide_title') || !class_exists('acf') ) : ?>
<div class="PageHeader container text-center">
	<div class="row">
		<div class="col-sm-12">
			<div class="SpecialHeading">
				<?php 
				$title_classes = ( odrin_get_option('special_heading_letter') ) ? ' special-heading-letter' : '';
				?>
				<h1 class="special-title<?php echo esc_attr($title_classes); ?>"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>