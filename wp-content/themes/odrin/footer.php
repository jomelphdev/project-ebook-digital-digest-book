</div><!-- end MAIN-CONTENT -->
<?php 
$has_widgets = false;

if( is_active_sidebar('footer1') || is_active_sidebar('footer2') || is_active_sidebar('footer3') || is_active_sidebar('footer4') ){
	$has_widgets = true;
}
?>
<?php if( is_active_sidebar('footer1')  || odrin_get_option('footer_text') ) : ?>
<div class="footer-offset"></div>
<footer class="footer <?php echo esc_attr(odrin_get_option('footer_text_type') == 'light' ? 'section-light' : '') ?> <?php echo esc_attr($has_widgets) ? 'has-widgets' : ''  ?>">

	<div class="overlay-color"></div>

	<?php if ( odrin_get_option('footer_pattern') ) : 
		$footer_pattern = odrin_get_option('footer_pattern');
	?>
		<div class="overlay-<?php echo esc_attr($footer_pattern); ?>"></div>
	<?php endif; ?>

	<?php if ( odrin_get_option('footer_image') ): ?>
		<?php $footer_img = odrin_get_option('footer_image'); ?>
		<div class="bg-image" data-bg-image="<?php echo esc_url($footer_img['url']); ?>"></div>
	<?php endif ?>

	<div class="container">
		<div class="row">
			<?php get_template_part('partials/content','footer-widgets'); ?>

			<div class="col-sm-12">
				<?php if ( odrin_get_option('footer_text') ) : ?>
				<div class="copyright font-subheading">
					<?php echo do_shortcode(wp_kses_post( odrin_get_option('footer_text') )); ?>
				</div>
			<?php endif; ?>
			</div><!-- end col-sm-12 -->
		</div><!-- end row -->
	</div><!-- end container -->
	

</footer>
<?php endif; ?>

<?php wp_footer() ;?>
</body>
</html>