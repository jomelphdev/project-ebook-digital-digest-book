<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); } ?>

<?php 
$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

$list_type = $atts['list_type'];
$list_class = '';
if ( isset($atts['list_position']) ) {
	$list_class .= 'list-' . $atts['list_position'];
}

// WOW Animation
$wow_classes = '';
$wow_data = '';

if ( isset($atts['animation_on_scroll']) && $atts['animation_on_scroll']['animation_enable'] == 'yes') {
	$wow_classes = 'is-wow ' . $atts['animation_on_scroll']['yes']['animation_type'];

	if ( isset($atts['animation_on_scroll']['yes']['animation_delay']) ) {
		$wow_data =  'data-wow-delay="' . ($atts['animation_on_scroll']['yes']['animation_delay'] / 1000) . 's"';
	}
}
?>

 <?php if ( $list_type == 'numbered' ) : ?>
<div class="ShortcodeList NumberedList <?php echo esc_attr($list_class); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
<?php else : ?>
<div class="ShortcodeList UnorderedList <?php echo esc_attr($list_class); ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
<?php endif; ?>
	<ul class="list-unstyled shortcode-list-wrapper">
		<?php foreach ($atts['list_items'] as $key => $value) : ?>
			<li class="ListItem">
				<div class="list-item-number font-subheading"></div>
				<div class="list-item-content">
					<h5 class="list-item-title font-subheading"><?php echo wp_kses_post($value['list_title']); ?></h5>
					<?php if ( $value['list_content'] ) : ?>
					<div class="list-item-text"><?php echo do_shortcode($value['list_content']); ?></div>
					<?php endif; ?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>