<?php
/**
 * WARNING: DO NOT edit this file under any circumstances.
 *
 * Renders custom toggle control type for WP Customizer.
 *
 * @package CR_Login_Page_UI_Customizer
 * @author Aniket Ashtikar
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class CRLPUIC_Toggle_Control renders custom toggle control type.
 *
 * @since 1.0.0
 */
class CRLPUIC_Toggle_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @access public
	 * @since  1.0.0
	 * @var    string
	 */
	public $type = 'crlpuic_toggle';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function enqueue() {

		parent::enqueue();

		wp_enqueue_script( 'crlpuic-login-customizer-controls' );
		wp_enqueue_style( 'crlpuic-login-customizer-script' );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		parent::to_json();

		$this->json['link']          = $this->get_link();
		$this->json['value']         = $this->value();
		$this->json['default_value'] = $this->setting->default;
		$this->json['id']            = $this->id;
	}

	/**
	 * Displays the control content.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function render_content() {}

	/**
	 * An Underscore (JS) template for this control's content.
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see    WP_Customize_Control::print_template()
	 *
	 * @access protected
	 * @since  1.0.0
	 * @return void
	 */
	public function content_template() {

		?>
		<div class="customize-control-toggle crlpuic-toggle-wrap">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>

			<span class="toggle-checkbox-wrapper">
				<input id="crlpuic-toggle-{{ data.id }}" type="checkbox" class="crlpuic-toggle" value="{{ data.value }}" {{{ data.link }}} <# if ( data.value ) { #> checked="checked" <# } #> />
				<label for="crlpuic-toggle-{{ data.id }}" class="crlpuic-toggle-switch"></label>
			</span>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</div>
		<?php
	}
}
