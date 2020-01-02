<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_Inner
 */
$monica_animate_out = $monica_animate_style = $monica_animate_time = $monica_animate_delay = $el_class = $width = $css = $offset = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

if ( $monica_animate_style == '' || $monica_animate_style == 'disable' ) {
    $monica_animate_style = 'disable-animate';
}
if ( $monica_animate_style != 'disable-animate' ) {
    $monica_animate_out = ' data-wow-duration="'.$monica_animate_time.'" data-wow-delay="'.$monica_animate_delay.'"';
}

$css_classes = array(
    $this->getExtraClass( $el_class ),
    'wpb_column',
    'vc_column_container',
    'wow',
    $width,
    $monica_animate_style,
);

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') )) {
    $css_classes[]='vc_col-has-fill';
}

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) .$monica_animate_out. '>';
$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
