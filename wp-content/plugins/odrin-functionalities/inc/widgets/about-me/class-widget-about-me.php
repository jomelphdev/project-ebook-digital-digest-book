<?php  
/**
* ----------------------------------------------------------------------------------------
*    Widget for About Me section
* ----------------------------------------------------------------------------------------
*/
class Odrin_About_Me_Widget extends WP_Widget {
	// Widget init
	public function __construct() {
		parent::__construct(
			false,
			esc_html__('[Odrin] About Me', 'odrin'),
			array('description' => esc_html__('Display an About Me widget.', 'odrin'))
		);
	}

	// Output the widget option in the backend
	public function form($instance) {
		$defaults = array(
			'title' => esc_html__('About Me', 'odrin'),
			'image' => '',
			'information' => '',
			'button_link' => '',
		);

		$instance = wp_parse_args((array) $instance, $defaults);

		?>
		
		<!-- The Title -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'odrin') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
		</p>
		
		<!-- The About Me Image -->
		<p>
			<?php if ( class_exists('Odrin_Widget_Fields') ) {
				$args = array(
					'id' =>  $this->get_field_id('image'),
					'name' => $this->get_field_name('image'),
					'value' => $instance['image'],
					'type' => 'image',
					'label' =>  esc_html__( 'About Me Image', 'odrin' ),
				);
				Odrin_Widget_Fields::field($args);
			} ?>
		</p>

		<!-- The About Me Information -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('information')); ?>"><?php esc_html_e('About Me', 'odrin') ?></label>
			<textarea cols="45" rows="4" id="<?php echo esc_attr($this->get_field_id('information')); ?>" name="<?php echo esc_attr($this->get_field_name('information')) ?>" class="widefat"><?php echo wp_kses_post($instance['information']); ?></textarea>
		</p>

		<!-- The Button Link -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('button_link')); ?>"><?php esc_html_e('Read More Button Link', 'odrin') ?></label>
			<input type="url" id="<?php echo esc_attr($this->get_field_id('button_link')); ?>" name="<?php echo esc_attr($this->get_field_name('button_link')); ?>" class="widefat" value="<?php echo esc_attr($instance['button_link']); ?>">
		</p>

		<?php
	}

	// Process widget options for saving
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['information'] = wp_kses_post($new_instance['information']);
		$instance['button_link'] = strip_tags($new_instance['button_link']);

		return $instance;
	}

	// Displays widget on the page
	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget-title', empty($instance['title']) ? '' : $instance['title']);
		$image = $instance['image'];
		$information = $instance['information'];
		$link = apply_filters('widget-link', empty($instance['button_link']) ? '' : $instance['button_link']);

		echo $before_widget;

		echo '<div class="about-me-widget-wrapper">';

		if( $title ) {
			echo $before_title . $title . $after_title;
		}
		if ( $image ) { ?>
			<div class="about-me-widget-image">
				<?php echo wp_get_attachment_image($image, 'odrin_medium_soft'); ?>
			</div>
		<?php }
		if ( $information ) : ?>
			<div class="about-me-widget-information">
				<p><?php echo wp_kses_post($information); ?></p>
			</div>
		<?php endif;
		if ( $link ) : ?>
			<div class="about-me-widget-footer font-subheading">
				<a href="<?php echo esc_url($link) ?>" class="btn btn-small"><?php esc_html_e('Read More', 'odrin') ?></a>
			</div>
		<?php endif; 

		echo '</div><!-- end about-widget-wrapper -->';

		echo $after_widget;
	}
}


register_widget('Odrin_About_Me_Widget');


?>