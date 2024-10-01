<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php 
$mobile_classes ='';

$mobile_classes .=  $atts['hide_on_desktop'] == 'true' ? 'hidden-md hidden-lg ' : '';
$mobile_classes .=  $atts['hide_on_mobile'] == 'true' ? 'hidden-xs hidden-sm' : '';

$bg_video_data_attr    = '';
$section_extra_classes = '';
$section_container_classes = '';
$display_arrow = '';

$bg_image_url = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image_url = $atts['background_image']['data']['icon'];
}

if ( ! empty( $atts['video'] ) ) {
	$filetype           = wp_check_filetype( $atts['video'] );
	$filetypes          = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
	$filetype           = array_key_exists( (string) $filetype['ext'], $filetypes ) ? $filetypes[ $filetype['ext'] ] : 'video';
	$data_name_attr = version_compare( fw_ext('shortcodes')->manifest->get_version(), '1.3.9', '>=' ) ? 'data-background-options' : 'data-wallpaper-options';
	$bg_video_data_attr = $data_name_attr.'="' . 
	fw_htmlspecialchars(
	 json_encode( array( 
	 	'source' => array(
			$filetype => $atts['video'],
			'poster' => $bg_image_url
			),
	 	'mute' => $atts['background_video_sound'] ? false : true
		) )
	) . '"';
	$section_extra_classes .= ' background-video';
}

if ($atts['text_type'] == 'light' ) {
	$section_extra_classes .= ' section-light';
}

if ( $atts['parallax'] ) {
	$section_extra_classes .= ' is-parallax';
}

if ( $atts['match_height']) {
	$section_container_classes .= ' is-matchheight-container';
}

if ( $atts['full_height']['full_height'] == 'yes' ) {
    if ( $atts['full_height']['yes']['vertical_center'] == 'yes' ||  $atts['full_height']['yes']['display_arrow'] == 'yes' ) {
        $section_extra_classes .= ' fullscreen-wrapper';
    }

    if ( $atts['full_height']['yes']['vertical_center'] == 'yes' ) {
        $section_extra_classes .= ' is-centered-content';
    }
    if ( $atts['full_height']['yes']['display_arrow'] == 'yes' ) {
        $display_arrow = true;
    }
}

( $atts['full_width'] ) ? $container_full = '-full' : $container_full = '';


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
<?php if ( $atts['custom_id']) : ?>
	<div id="<?php echo esc_attr($atts['custom_id']); ?>"></div>
<?php endif; ?>
<section class="pos-r<?php echo esc_attr($section_extra_classes) ?> <?php echo esc_attr($mobile_classes); ?> <?php echo esc_attr($wow_classes); ?>" <?php echo wp_kses_post($bg_video_data_attr); ?> id="shortcode-<?php echo esc_attr($atts['id']); ?>" <?php echo wp_kses_post($wow_data); ?>>
	<?php if ( $atts['filter_image']['filter_image'] == 'yes' && $atts['filter_image']['yes']['filter_color'] && $atts['filter_image']['yes']['opacity'] ) : ?>
		<div class="overlay-color"></div>
	<?php endif; ?>
	<div class="fw-container<?php echo esc_attr($container_full) ?><?php echo esc_attr($section_container_classes) ?>">
		<div class="fw-row">
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
	<?php if ( $display_arrow ) : ?>
		<a href="" class="is-scroll-down scroll-arrow">
			<i class="fas fa-angle-double-down animation-updown"></i>
		</a>
	<?php endif; ?>
</section>
