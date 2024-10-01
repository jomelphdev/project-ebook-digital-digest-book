<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

Class Odrin_Widget_Social extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Add social links to your site.', 'odrin' ) );

		parent::__construct( false, esc_html__( '[Odrin] Social', 'odrin' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);

		echo $before_widget;

		echo '<div class="social-widget-wrapper">';

		if ( $title ) { echo $before_title . $title . $after_title; }
		?>
			<div class="SocialLinks">

				<?php 
				unset($instance['title']);

				foreach ( $instance as $key => $value ) :
					if ( !empty( $value ) && is_string( $value ) ) : ?>
					<a href="<?php echo esc_url($value); ?>" class="<?php echo esc_attr($key); ?>" target="_blank"><i class="fab fa-<?php echo esc_attr($key);?>"></i></a>
					<?php else :
					continue;
					endif; ?>
				<?php endforeach; ?>
			</div><!-- end SocialLinks -->
		<?php
		echo '</div>';

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = wp_parse_args( (array) $new_instance, $old_instance );
		return $instance;
	}

	function form( $instance ) {

		$defaults = array(
			'title' => esc_html__('Follow Us', 'odrin')
		);

		$titles = array(
			'amazon'    => esc_html__( 'Amazon URL', 'odrin' ),
			'behance'    => esc_html__( 'Behance URL', 'odrin' ),
			'dribbble'    => esc_html__( 'Dribbble URL', 'odrin' ),
			'facebook-f'    => esc_html__( 'Facebook URL', 'odrin' ),
			'flickr'    => esc_html__( 'Flickr URL', 'odrin' ),
			'goodreads-g'    => esc_html__( 'Goodreads URL', 'odrin' ),
			'google-plus'    => esc_html__( 'Google+ URL', 'odrin' ),
			'instagram'    => esc_html__( 'Instagram URL', 'odrin' ),
			'linkedin'    => esc_html__( 'LinkedIn URL', 'odrin' ),
			'medium'    => esc_html__( 'Medium URL', 'odrin' ),
			'pinterest'    => esc_html__( 'Pinterest URL', 'odrin' ),
			'twitter'    => esc_html__( 'Twitter URL', 'odrin' ),
			'tumblr'    => esc_html__( 'Tumblr URL', 'odrin' ),
			'vimeo-square'    => esc_html__( 'Vimeo URL', 'odrin' ),
			'youtube'    => esc_html__( 'Youtube URL', 'odrin' ),
			'500px'    => esc_html__( '500px URL', 'odrin' ),
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'odrin') ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			
		</p>
		<?php
		foreach ( $titles as $key => $value ) {
		?>
			<p>
			<?php $field_value = isset($instance[$key]) ? $instance[$key] : '' ; ?>
				<label for="<?php echo esc_attr($this->get_field_id($key)); ?>"><?php echo wp_kses_post($value); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id($key)); ?>" name="<?php echo esc_attr($this->get_field_name($key)); ?>" type="text" value="<?php echo esc_attr($field_value); ?>" />
				
			</p>
		<?php
		}
		
	}
}
