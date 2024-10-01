<?php 
/**
* ----------------------------------------------------------------------------------------
*    Mailchimp Widget
* ----------------------------------------------------------------------------------------
*/
Class SSD_Widget_Mailchimp extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'description' => esc_html__('Subscription form with Mailchimp integration.', 'subsolar_widget') );
		parent::__construct( 'mailchimp_newsletter', esc_html__('[Subsolar Designs] Mailchimp Newsletter', 'subsolar_widget'), $widget_ops );
	}

	
	public function widget( $args, $instance ) {

		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);

		echo $before_widget;

		echo '<div class="MailchimpNewsletter mailchimp-widget-wrapper">';
		
		if ( $title ) { echo $before_title . $title . $after_title; }

		?>
		<div class="mailchimp-newsletter-content-wrapper">
			<?php if ( $instance['sub_text'] ) : ?>
			<div class="mailchimp-newsletter-content mb-20"><?php echo wp_kses_post($instance['sub_text']); ?></div>
			<?php endif; ?>
			<form method="post" class="is-mailchimp-shortcode-subscribe">
				<fieldset>
					<input type="email" class="is-mailchimp-email" name="email" placeholder="<?php esc_attr_e('Your e-mail address', 'subsolar_widget'); ?>" value="">
					<button class="btn btn-icon is-signup-button" type="submit"><span><?php echo wp_kses_post($instance['button_text']); ?></span></button>
				</fieldset>
			</form>
			<div class="mailchimp-shortcode-message"></div>
		</div>
		<?php
		echo '</div><!-- end mailchimp-widget-wrapper -->';

		echo $after_widget;

	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['sub_text'] = strip_tags($new_instance['sub_text']);
		$instance['button_text'] = strip_tags($new_instance['button_text']);

		return $instance;

	}

	public function form( $instance ) {

		$defaults = array(
			'title' => esc_html__('Newsletter', 'subsolar_widget'),
			'sub_text' => esc_html__("Make sure you don't miss anything!", 'subsolar_widget'),
			'button_text' => esc_html__('Subscribe', 'subsolar_widget')
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		if( function_exists( 'odrin_api_key_check' ) ) :
		?>
		<!-- API Key check -->
		<p>
			<?php odrin_api_key_check('mailchimp'); ?>
		</p>

		<?php endif; ?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'subsolar_widget') ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('button_text')); ?>"><?php esc_html_e('Button Text', 'subsolar_widget') ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('button_text')); ?>" type="text" value="<?php echo esc_attr($instance['button_text']); ?>" />
			
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('sub_text')) ?>"><?php esc_html_e('Subscription Text', 'subsolar_widget') ?></label>
			<textarea cols="45" rows="4" id="<?php echo esc_attr($this->get_field_id('sub_text')) ?>" name="<?php echo esc_attr($this->get_field_name('sub_text')) ?>" class="widefat"><?php echo esc_attr($instance['sub_text']); ?></textarea>
		</p>

	<?php
	}

}

if ( !function_exists( '_actions_ssd_register_mailchimp_widget' ) ) {
	function _actions_ssd_register_mailchimp_widget() {
		register_widget( 'SSD_Widget_Mailchimp' );
	}
}


add_action('widgets_init', '_actions_ssd_register_mailchimp_widget');
?>