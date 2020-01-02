<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$monica_parallax_image = $monica_row_style = $monica_section = $monica_mathheight = $monica_parallax = $el_class = $full_height = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

if ( $monica_mathheight == 'true' ) {
    $monica_mathheight = 'vmh';
}

$css_classes = array(
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$monica_class = array(
    'vc_row',
    'wpb_row', //deprecated
    'vc_row-fluid',
    $monica_row_style,
    $monica_mathheight,
);

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
    $css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
    $css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

$wrapper_attributes = array();

if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$row_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $monica_class ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="section ' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="'.esc_attr( $monica_section ).'">';
$output .= '<div class="section-content">';
$output .= '<div class="'.esc_attr( trim( $row_class ) ).'">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
if ( $monica_parallax && $monica_parallax_image ) {
    $output .= '<div class="background-image parallax"><img src="'.wp_get_attachment_url( $monica_parallax_image ).'" alt=""></div>';
}
$output .= '</div>';
$output .= $after_output;
echo $output;