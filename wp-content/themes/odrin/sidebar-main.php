<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>

	<div class="SidebarMain col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-12 col-sm-offset-0">
		<?php dynamic_sidebar('main-sidebar'); ?>
	</div>

<?php endif; ?>