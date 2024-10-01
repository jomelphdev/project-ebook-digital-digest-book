<?php 
function _action_odrin_custom_styles(){
	$color_main = odrin_get_option('color_main');
	$color_secondary = odrin_get_option('color_secondary');
	?>

	<?php
	$body_font = odrin_get_option('body_font');
	$heading_font = odrin_get_option('heading_font');
	$subheading_font = odrin_get_option('subheading_font');

	ob_start();
	?>


	/* Typography */
	body {
		<?php echo odrin_typography_css($body_font) ?>
	}

	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.fw-table .heading-row,
	.fw-package .fw-heading-row,
	.special-first-letter > p:first-of-type:first-letter,
	.special-heading-letter:first-letter,
	.woocommerce .price del, .woocommerce .price > span,
	.font-heading {
		<?php echo odrin_typography_css($heading_font) ?>;
	}

	.font-subheading,
	.element-title,
	.BoxedTitle h2,
	.special-link,
	.btn, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .btn:focus, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus, .woocommerce button.button:focus, .woocommerce input.button:focus, button[type='submit'], button[type='submit']:focus, input[type='submit'], input[type='submit']:focus,
	label {
		<?php echo odrin_typography_css($subheading_font) ?>;
	}


	/* Main Color */
	
	a, a:focus {
		color: <?php echo esc_attr($color_main); ?>;
	}

	a.link-border {
		border-bottom: 2px solid <?php echo esc_attr($color_main); ?>;
	}

	::-moz-selection {
		background: <?php echo esc_attr($color_main); ?>;
	}

	::selection {
		background: <?php echo esc_attr($color_main); ?>;
	}

	blockquote footer cite:before {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.SearchForm .search-form-wrapper .btn-search:hover {
		border-left: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.field-text:hover label, .field-textarea:hover label {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.main-navigation-menu a i[class^="icon-"] {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.main-navigation-menu a:hover {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.main-navigation-menu a:hover i {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.main-navigation-menu .current-menu-item > a {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.main-navigation-menu .current-menu-item > a i {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.slicknav_nav a i[class^="icon-"] {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.slicknav_nav a:hover {
		background: <?php echo esc_attr($color_main); ?>;
	}

	.EventsFilter .events-filter-dropdown .dropdown-menu li a:hover {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.FeaturedEvent .featured-event-meta-wrapper .featured-event-label {
		border-bottom: 2px solid <?php echo esc_attr($color_main); ?>;
	}

	.Excerpt .ExcerptContentWrapper .excerpt-date span {
		border-bottom: 3px dotted <?php echo esc_attr($color_main); ?>;
	}

	.PostNav {
		border-bottom: 1px dotted <?php echo esc_attr($color_main); ?>;
	}

	.page-links a {
		border-bottom: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.SingleEventHeader .single-event-location i {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.SingleEventMetaHeader .information-wrapper .information-item:before {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.SimplifiedPosts .simplified-post-meta .simplified-post-date span {
		border-bottom: 3px dotted <?php echo esc_attr($color_main); ?>;
	}

	.SinglePostFooter .single-post-footer-share a {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.commentslist-container .comment-reply-title small {
		border-bottom: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.fw-accordion .fw-accordion-title:before {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.fw-accordion .fw-accordion-title.ui-state-active {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.btn > i, .woocommerce #respond input#submit > i, .woocommerce a.button > i, .woocommerce button.button > i, .woocommerce input.button > i, .woocommerce #respond input#submit.alt > i, .woocommerce a.button.alt > i, .woocommerce button.button.alt > i, .woocommerce input.button.alt > i, button[type='submit'] > i, input[type='submit'] > i {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.btn:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .btn:active, .woocommerce #respond input#submit:active, .woocommerce a.button:active, .woocommerce button.button:active, .woocommerce input.button:active, .btn:active:focus, .woocommerce #respond input#submit:active:focus, .woocommerce a.button:active:focus, .woocommerce button.button:active:focus, .woocommerce input.button:active:focus, .btn-normal:hover, .btn-normal:active, .btn-normal:active:focus, button[type='submit']:hover, button[type='submit']:active, button[type='submit']:active:focus, input[type='submit']:hover, input[type='submit']:active, input[type='submit']:active:focus {
		background: <?php echo esc_attr($color_main); ?>;
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.btn.btn-color, .woocommerce #respond input.btn-color#submit, .woocommerce a.btn-color.button, .woocommerce button.btn-color.button, .woocommerce input.btn-color.button, .btn.btn-color:focus, .woocommerce #respond input.btn-color#submit:focus, .woocommerce a.btn-color.button:focus, .woocommerce button.btn-color.button:focus, .woocommerce input.btn-color.button:focus, button[type='submit'].btn.btn-color, .woocommerce button[type='submit'].btn-color.button, button[type='submit'].btn.btn-color:focus, .woocommerce button[type='submit'].btn-color.button:focus, input[type='submit'].btn.btn-color, .woocommerce #respond input[type='submit'].btn-color#submit, .woocommerce input[type='submit'].btn-color.button, input[type='submit'].btn.btn-color:focus, .woocommerce #respond input[type='submit'].btn-color#submit:focus, .woocommerce input[type='submit'].btn-color.button:focus {
		background: <?php echo esc_attr($color_main); ?>;
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.btn.btn-color:hover, .woocommerce #respond input.btn-color#submit:hover, .woocommerce a.btn-color.button:hover, .woocommerce button.btn-color.button:hover, .woocommerce input.btn-color.button:hover, .btn.btn-color:active, .woocommerce #respond input.btn-color#submit:active, .woocommerce a.btn-color.button:active, .woocommerce button.btn-color.button:active, .woocommerce input.btn-color.button:active, .btn.btn-color:active:focus, .woocommerce #respond input.btn-color#submit:active:focus, .woocommerce a.btn-color.button:active:focus, .woocommerce button.btn-color.button:active:focus, .woocommerce input.btn-color.button:active:focus, button[type='submit'].btn.btn-color:hover, .woocommerce button[type='submit'].btn-color.button:hover, button[type='submit'].btn.btn-color:active, .woocommerce button[type='submit'].btn-color.button:active, button[type='submit'].btn.btn-color:active:focus, .woocommerce button[type='submit'].btn-color.button:active:focus, input[type='submit'].btn.btn-color:hover, .woocommerce #respond input[type='submit'].btn-color#submit:hover, .woocommerce input[type='submit'].btn-color.button:hover, input[type='submit'].btn.btn-color:active, .woocommerce #respond input[type='submit'].btn-color#submit:active, .woocommerce input[type='submit'].btn-color.button:active, input[type='submit'].btn.btn-color:active:focus, .woocommerce #respond input[type='submit'].btn-color#submit:active:focus, .woocommerce input[type='submit'].btn-color.button:active:focus {
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.btn.btn-icon, .woocommerce #respond input.btn-icon#submit, .woocommerce a.btn-icon.button, .woocommerce button.btn-icon.button, .woocommerce input.btn-icon.button, .btn.btn-icon:focus, .woocommerce #respond input.btn-icon#submit:focus, .woocommerce a.btn-icon.button:focus, .woocommerce button.btn-icon.button:focus, .woocommerce input.btn-icon.button:focus {
		background: <?php echo esc_attr($color_main); ?>;
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.btn.btn-icon:hover, .woocommerce #respond input.btn-icon#submit:hover, .woocommerce a.btn-icon.button:hover, .woocommerce button.btn-icon.button:hover, .woocommerce input.btn-icon.button:hover, .btn.btn-icon:active, .woocommerce #respond input.btn-icon#submit:active, .woocommerce a.btn-icon.button:active, .woocommerce button.btn-icon.button:active, .woocommerce input.btn-icon.button:active, .btn.btn-icon:active:focus, .woocommerce #respond input.btn-icon#submit:active:focus, .woocommerce a.btn-icon.button:active:focus, .woocommerce button.btn-icon.button:active:focus, .woocommerce input.btn-icon.button:active:focus {
		background: <?php echo esc_attr($color_main); ?>;
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.btn.btn-border, .woocommerce #respond input.btn-border#submit, .woocommerce a.btn-border.button, .woocommerce button.btn-border.button, .woocommerce input.btn-border.button, .btn.btn-border:focus, .woocommerce #respond input.btn-border#submit:focus, .woocommerce a.btn-border.button:focus, .woocommerce button.btn-border.button:focus, .woocommerce input.btn-border.button:focus {
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.btn.btn-border:hover, .woocommerce #respond input.btn-border#submit:hover, .woocommerce a.btn-border.button:hover, .woocommerce button.btn-border.button:hover, .woocommerce input.btn-border.button:hover, .btn.btn-border:active, .woocommerce #respond input.btn-border#submit:active, .woocommerce a.btn-border.button:active, .woocommerce button.btn-border.button:active, .woocommerce input.btn-border.button:active, .btn.btn-border:active:focus, .woocommerce #respond input.btn-border#submit:active:focus, .woocommerce a.btn-border.button:active:focus, .woocommerce button.btn-border.button:active:focus, .woocommerce input.btn-border.button:active:focus {
		background: <?php echo esc_attr($color_main); ?>;
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.btn.btn-light:hover, .woocommerce #respond input.btn-light#submit:hover, .woocommerce a.btn-light.button:hover, .woocommerce button.btn-light.button:hover, .woocommerce input.btn-light.button:hover, .btn.btn-light:active, .woocommerce #respond input.btn-light#submit:active, .woocommerce a.btn-light.button:active, .woocommerce button.btn-light.button:active, .woocommerce input.btn-light.button:active, .btn.btn-light:active:focus, .woocommerce #respond input.btn-light#submit:active:focus, .woocommerce a.btn-light.button:active:focus, .woocommerce button.btn-light.button:active:focus, .woocommerce input.btn-light.button:active:focus {
		background: <?php echo esc_attr($color_main); ?>;
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.ShortcodeBlog .blog-show-more {
		border-bottom: 1px dotted <?php echo esc_attr($color_main); ?>;
	}

	.BoxIcon .box-icon-header-wrapper i {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.c-element-show-more {
		border-bottom: 1px dotted <?php echo esc_attr($color_main); ?>;
	}

	.fw-tabs-container .fw-tabs ul li.ui-state-active .tabs-icon {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.Testimonial .testimonial-meta a.testimonial-company {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.menu-toc li a {
		border-left: 2px solid <?php echo esc_attr($color_main); ?>;
	}

	.menu-toc li a:hover {
		border-left: 10px solid <?php echo esc_attr($color_main); ?>;
	}

	.menu-toc .menu-toc-current a {
		border-left: 10px solid <?php echo esc_attr($color_main); ?>;
	}

	.menu-panel div a {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.bb-custom-wrapper nav span,
	.menu-button,
	.bb-nav-close {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.menu-button .close-icon-color {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.menu-button .close-icon-color:before, .menu-button .close-icon-color:after {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.highlight {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.section-light .widget a {
		border-bottom: 2px dotted <?php echo esc_attr($color_main); ?>;
	}

	.overlay-color {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.close-icon-color {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.close-icon-color:before, .close-icon-color:after {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.SpecialHeading .special-heading-letter:first-letter {
		color: <?php echo esc_attr($color_main); ?>;
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.SpecialHeading .special-title-small.special-heading-letter:first-letter {
		color: <?php echo esc_attr($color_main); ?>;
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.special-subtitle {
		border-bottom: 3px dotted <?php echo esc_attr($color_main); ?>;
	}

	.special-subtitle-type-2:before {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.dash-left:before {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.BoxedTitle i {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.PageFlipBook .page-flip-book-ribbon {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.widget a {
		border-bottom: 2px dotted <?php echo esc_attr($color_main); ?>;
	}

	.widget .menu .menu-item i[class^="icon-"], .widget .menu .menu-item-has-children i[class^="icon-"] {
		color: <?php echo esc_attr($color_main); ?>;
	}

	#wp-calendar caption {
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	#wp-calendar #today {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.widget_tag_cloud .tagcloud a:hover, .widget_product_tag_cloud .tagcloud a:hover {
		background-color: <?php echo esc_attr($color_main); ?>;
		border-color: <?php echo esc_attr($color_main); ?>;
	}

	.widget.widget_odrin_about_me_widget .about-me-widget-footer a:hover {
		border: 1px solid <?php echo esc_attr($color_main); ?>;
	}

	.widget_popular_posts .popular-posts-meta-extra {
		border-bottom: 2px dotted <?php echo esc_attr($color_main); ?>;
	}

	a.tweet-time {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce.widget_product_search input[type="submit"] {
		border: 2px solid <?php echo esc_attr($color_main); ?>;
		background-color: <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce.widget_product_search input[type="submit"]:hover {
		border: 2px solid <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce.widget .star-rating span:before {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce.widget .star-rating:before {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span {
		border-bottom: 2px dotted <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus {
		border-bottom: 2px dotted <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce #reviews .star-rating {
		color: <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {
		background: <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation-link a {
		border-left: 0px solid <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation-link a:hover {
		border-left: 15px solid <?php echo esc_attr($color_main); ?>;
	}

	.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation-link.is-active a {
		border-left: 15px solid <?php echo esc_attr($color_main); ?>;
	}


	/* Secondary Color */
	
	a:hover, a:active {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	hr {
		border-color: <?php echo esc_attr($color_secondary); ?>;
	}

	del {
		-webkit-text-decoration-color: <?php echo esc_attr($color_secondary); ?>;
		-moz-text-decoration-color: <?php echo esc_attr($color_secondary); ?>;
		text-decoration-color: <?php echo esc_attr($color_secondary); ?>;
	}

	mark {
		border-bottom: 1px dashed <?php echo esc_attr($color_secondary); ?>;
	}

	.EventsFilter .events-filter-dropdown .btn-dropdown a {
		border-bottom: 3px dotted <?php echo esc_attr($color_secondary); ?>;
	}

	.FeaturedEvent .featured-event-meta-wrapper {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.Excerpt .ExcerptContentWrapper .ElementHeading .element-title:hover {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.Excerpt.sticky .ExcerptContentWrapper .excerpt-date {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.SinglePostHeader .single-post-meta-categories a:hover {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.SinglePostHeader .section-light .single-post-meta-categories a:hover {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.SingleEventHeader:before {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.SingleEventDate {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.SinglePostContent .single-post-content-inner ul:not(.shortcode-list-wrapper):not(.ui-tabs-nav) li:before {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.SinglePostFooter .single-post-footer-share {
		border-bottom: 4px dotted <?php echo esc_attr($color_secondary); ?>;
	}

	.SinglePostFooter .single-post-footer-back a:hover {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.fw-accordion .fw-accordion-content {
		border-bottom: 2px solid <?php echo esc_attr($color_secondary); ?>;
	}

	.BooksPanel .book-panel-price > span .woocommerce-Price-currencySymbol {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.ContentElement {
		box-shadow: 15px 15px 0px 0px <?php echo esc_attr($color_secondary); ?>;
	}

	.ContentElement .c-element-date-wrapper .c-element-delimeter {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.ContentElement .c-element-date-wrapper .with-delimeter:before {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.special-text-block-color .special-text-block-content {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.NumberedList .list-item-number:before {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.UnorderedList .list-item-number:before {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.fw-tabs-container .fw-tabs ul li.ui-state-active a:after {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.UpcomingBookWrapper .upcoming-book-content .special-link {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.UpcomingBookWrapper .upcoming-book-release-date .countdown-item .countdown-text {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.bb-custom-wrapper nav span:hover,
	.menu-button:hover,
	.bb-nav-close:hover {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.bb-custom-wrapper nav span:hover:after,
	.menu-button:hover:after,
	.bb-nav-close:hover:after {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.bb-custom-wrapper nav span:hover i,
	.menu-button:hover i,
	.bb-nav-close:hover i {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.menu-button:hover .close-icon-color {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.menu-button:hover .close-icon-color:before, .menu-button:hover .close-icon-color:after {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.overlay-color-2 {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.close-icon-color:hover {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.close-icon-color:hover:before, .close-icon-color:hover:after {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.special-first-letter > p:first-of-type:first-letter {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.owl-carousel .owl-dot.active span, .owl-carousel .owl-dot:hover span {
		border-bottom: 3px solid <?php echo esc_attr($color_secondary); ?>;
	}

	.PageFlipBook .page-flip-book-ribbon:after {
		border-color: <?php echo esc_attr($color_secondary); ?> transparent transparent transparent;
	}

	.blockquote-icon {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.blockquote-icon:after {
		border-color: transparent transparent <?php echo esc_attr($color_secondary); ?> transparent;
	}

	.widget a:hover {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.widget .sub-menu:before, .widget .sub-menu:after, .widget ul.children:before, .widget ul.children:after {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.widget_tag_cloud .tagcloud a, .widget_product_tag_cloud .tagcloud a {
		border: 1px solid <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce ul.product_list_widget li .woocommerce-Price-currencySymbol {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce .price > span .woocommerce-Price-currencySymbol {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce .woocommerce-product-rating .star-rating {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce span.onsale {
		background-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce span.onsale:before {
		border-top: 10px solid <?php echo esc_attr($color_secondary); ?>;
		border-left: 5px solid <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce span.onsale:after {
		border-bottom: 10px solid <?php echo esc_attr($color_secondary); ?>;
		border-left: 5px solid <?php echo esc_attr($color_secondary); ?>;
	}

	.SingleProductImage .single-product-price .woocommerce-Price-currencySymbol {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce table.cart a.remove {
		color: <?php echo esc_attr($color_secondary); ?> !important;
	}

	.woocommerce table.cart a.remove:hover {
		background-color: <?php echo esc_attr($color_secondary); ?> !important;
	}

	.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation-link.is-active a {
		color: <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce .woocommerce-notice {
		border-left: 10px solid <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce .woocommerce-message, .woocommerce .woocommerce-info {
		border-top-color: <?php echo esc_attr($color_secondary); ?>;
	}

	.woocommerce .woocommerce-message:before, .woocommerce .woocommerce-info:before {
		color: <?php echo esc_attr($color_secondary); ?>;
	}


	/* Navigation */

	.main-navigation-container, .main-navigation-menu .sub-menu, .slicknav_menu, .slicknav_nav .sub-menu {
		background-color: <?php echo esc_attr(odrin_get_option('navigation_color')); ?>;
	}

	.slicknav_nav .sub-menu {
		filter: contrast(90%);
		border: 1px solid <?php echo esc_attr(odrin_get_option('navigation_color')); ?>;
	}

	/* Footer */

	.footer .overlay-color {
		background-color: <?php echo esc_attr(odrin_get_option('footer_color')); ?>;
	}

	/* Custom CSS */

	<?php echo (odrin_get_option('custom_css'));

	$output_css = ob_get_clean();

	wp_add_inline_style( 'odrin_custom-css', $output_css );

}

add_action( 'wp_enqueue_scripts', '_action_odrin_custom_styles', 100 );
?>
