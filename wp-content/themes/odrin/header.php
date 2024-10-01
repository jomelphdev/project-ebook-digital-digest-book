<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<?php wp_body_open(); ?>

	<?php 
	if ( isset($_GET['read-book']) ) {
		$post_id = $_GET['read-book'];
		$output = odrin_get_book_content($post_id);
		echo do_shortcode($output);
	}
	?>
	
	<?php 
		$menu_additional_style = '';
		if ( !has_nav_menu('main-navigation-left') ) {
			$menu_additional_style = 'single-navigation-left';
		} else if ( !has_nav_menu('main-navigation-right') ) {
			$menu_additional_style = 'single-navigation-right';
		} else {
			$menu_additional_style = 'double-navigation';
		}
	?>

	<div class="main-navigation-container is-nav-sticky is-slicknav <?php echo esc_attr(odrin_get_option('navigation_text_type') == 'light' ? 'section-light' : '') ?> <?php echo esc_attr($menu_additional_style); ?>" data-nav-color="<?php echo esc_attr(odrin_get_option('navigation_text_type') == 'light' ? 'section-light' : '') ?>">

		<?php if ( $menu_additional_style != 'double-navigation' ) : ?>
			<div class="navigation-wrapper">
				<div class="row">
					<div class="col-sm-12">
		<?php endif; ?>

		<?php
		if ( has_nav_menu('main-navigation-left') ) : ?>
		<nav id="main-navigation-menu-left" class="main-navigation-menu navigation-left">
		<?php
		wp_nav_menu( array(
			'theme_location'  => 'main-navigation-left',
			'container' => false,
			'menu_class' => 'is-slicknav-navigation-left'
			));
			?>
		</nav>
		<?php endif; ?>
		<div class="navigation-logo is-slicknav-logo">
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<?php
				$logo_image = odrin_get_option('logo_image');
				$logo_name = odrin_get_option('logo_name');
				if( !empty( $logo_image ) ) {
				?>
				<img src="<?php echo esc_url( $logo_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>">
				<?php } else if( !empty( $logo_name ) ) { ?>
				<h1><?php echo wp_kses_post( $logo_name ); ?></h1>
				<?php } else { ?>
				<h1><?php echo get_bloginfo( 'name', 'display' ); ?></h1>
				<?php } ?>
			</a>
		</div>
		<?php
		if ( has_nav_menu('main-navigation-right') ) : ?>
		<nav id="main-navigation-menu-right" class="main-navigation-menu navigation-right">
		<?php
		wp_nav_menu( array(
			'theme_location'  => 'main-navigation-right',
			'container' => false,
			'menu_class' => 'is-slicknav-navigation-right'
			));
			?>
		</nav>
		<?php endif; ?>

		<?php if ( $menu_additional_style != 'double-navigation' ) : ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>
	<div class="is-nav-offset"></div>
	<div class="MAIN-CONTENT">
	<?php
	if ( odrin_woocommerce() ) {	
		do_action('odrin_show_cart_contents_box');
	}


	// Header
	$account_login_page = true;
	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_account_page() && !is_user_logged_in() )
		$account_login_page = false;
	}
	if ( is_singular('event') ) {
		get_template_part( 'partials/content-single-event', 'header' );
	} else if ( is_page_template('template-events.php') ) {
		get_template_part( 'partials/content-events', 'header' );
	} else if ( is_page_template('template-blog.php') ) {
		get_template_part( 'partials/content-blog', 'header' );
	} else if ( is_singular('post') ) {
		get_template_part( 'partials/content-post', 'header' );
	} else if ( is_singular('page') && !is_page_template('template-contact.php') && $account_login_page ) {
		get_template_part( 'partials/content-page', 'header' );
	}