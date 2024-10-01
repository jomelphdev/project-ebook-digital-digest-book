<?php if ( ! defined( 'ABSPATH' ) ) { die( ); }

/**
 * Filters and Actions
 */

add_action('widgets_init', '_action_odrin_widgets_init');

if ( ! function_exists( '_action_odrin_widgets_init' ) ) {
	function _action_odrin_widgets_init()  {
		
		$path = plugin_dir_path( __FILE__ ) . 'widgets';

		$included_widgets = array();

		$dirs = glob($path .'/*', GLOB_ONLYDIR);

		if (!$dirs) {
			return false;
		}

		foreach ($dirs as $dir) {
			$dirname = basename($dir);

			if (isset($included_widgets[$dirname])) {
				// this happens when a widget in child theme wants to overwrite the widget from parent theme
				continue;
			} else {
				$included_widgets[$dirname] = true;
			}

			require_once(plugin_dir_path( __FILE__ ) . 'widgets/' . $dirname . '/class-widget-'. $dirname .'.php');

			$class_name = explode('-', $dirname);
			$class_name = array_map('ucfirst', $class_name);
			$class_name = implode('_', $class_name);

			$widget_class = 'Odrin_Widget_' . $class_name;
			
			if ( class_exists( $widget_class ) ) {
				register_widget( $widget_class );
			}

		}
	}
}