<?php if (!defined('FW')) die( 'Forbidden' ); ?>

<?php 
$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

?>

<div class="spacer <?php echo esc_attr($mobile_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>"></div>