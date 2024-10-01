<?php
if( ! defined('ODRIN_WIDGET_FIELDS_DIR') ) { define('ODRIN_WIDGET_FIELDS_DIR', plugin_dir_url( __FILE__ ) ); }
/**
*  Subsolar Designs helper functions for creating native widget fields
*/

class Odrin_Widget_Fields {

	static function init(){
		if( !is_admin() ){
			return;
		}
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_enqueue_scripts') );
	}

	static function admin_enqueue_scripts($hook){
		if( 'widgets.php' != $hook ){
	        return;
		}

		wp_enqueue_media();

		wp_enqueue_script(
			'widget-selectize-js',
			ODRIN_WIDGET_FIELDS_DIR . '/assets/js/selectize.min.js',
			array( 'jquery' ),
			'1.0',
			true
			);

		wp_enqueue_script(
			'ssdwf-js',
			ODRIN_WIDGET_FIELDS_DIR . '/assets/js/scripts.js',
			array( 'jquery' ),
			'1.0',
			true
			);

		wp_enqueue_style(
			'widget-selectize-css',
			ODRIN_WIDGET_FIELDS_DIR . '/assets/css/selectize.custom.css',
			array(),
			'1.0'
			);
	}

	static function field($args = array()){

		switch ($args['type']) {
			case 'image':

				if ( $args['value'] ) {
					$image_array = wp_get_attachment_image_src($args['value']);
					$image_url = $image_array[0];
				} else {
					$image_url ='';
				}
				?>
				<label for="<?php echo esc_attr($args['name']); ?>"><?php echo esc_attr($args['label']); ?></label>
				<input name="" id="<?php echo esc_attr($args['id']); ?>" class="widefat ssd-widget-image-url-field" type="text" size="36"  value="<?php echo esc_url($image_url ); ?>" disabled/>
				<input class="button ssd-upload-image-button" type="button" value="Upload Image" data-name="<?php echo esc_attr($args['name']); ?>" />
				<a href="#" class="ssd-widget-remove-image" data-image-remove="<?php echo esc_attr($args['name']); ?>"><?php esc_html_e('Remove Image', 'odrin') ?></a>
				<input type="hidden" name="<?php echo esc_attr($args['name']); ?>" value="<?php echo esc_attr( $args['value'] ); ?>">
				<?php
				break;
			case 'select':
			?>	
				<label for="<?php echo esc_attr($args['name']); ?>"><?php echo esc_attr($args['label']); ?></label>
				<select id="<?php echo esc_attr($args['id']); ?>" class="is-ssdwf-select" name="<?php echo esc_attr($args['name']); ?>" data-name="<?php echo esc_attr($args['name']); ?>">
					<option value=""><?php esc_html_e('Select...', 'odrin') ?></option>
				<?php foreach ($args['choices'] as $key => $value) : ?>
					<option <?php echo ( $args['value'] == $key ) ? 'selected' : ''; ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_attr($value); ?></option>
				<?php endforeach; ?>
				</select>
				<?php
				break;
			case 'multi-select':
			?>	
				<label for="<?php echo esc_attr($args['name']); ?>"><?php echo esc_attr($args['label']); ?></label>

				<select id="<?php echo esc_attr($args['id']); ?>" class="is-ssdwf-multi-select" multiple name="" data-name="<?php echo esc_attr($args['name']); ?>">
					<option value=""><?php esc_html_e('Select...', 'odrin') ?></option>
					<?php
					$values_array = explode(',', $args['value']);
					?>
				<?php foreach ($args['choices'] as $key => $value) : ?>
					<option value="<?php echo esc_attr($key); ?>" <?php echo ( in_array($key, $values_array) ) ? 'selected' : ''; ?> ><?php echo esc_attr($value); ?></option>
				<?php endforeach; ?>
				</select>
				<input type="hidden" name="<?php echo esc_attr($args['name']); ?>" value="<?php echo esc_attr( $args['value'] ); ?>">
				<?php
				break;
			
			default:
				# code...
				break;
		}

	}
}

add_action( 'widgets_init', array( 'Odrin_Widget_Fields', 'init' ) );