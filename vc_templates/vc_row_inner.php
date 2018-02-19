<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 * @var $custom_responsive - Custom VC
 * @var $column_no_padding - Custom VC
 */
$el_class = $equal_height = $content_placement = $css = $el_id = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );
$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
    'vc_row',
    'wpb_row', //deprecated
    'vc_inner',
    'vc_row-fluid',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
// Column no padding
if ( ! empty( $column_no_padding ) ) {
    $css_classes[] = ' column-no-padding';
}
if ( ! empty( $equal_height ) ) {
    $flex_row = true;
    $css_classes[] = ' vc_row-o-equal-height';
}
// Custom - Responsive
if ( ! empty( $custom_responsive ) ) {
    $css_classes[] = $custom_responsive;
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="vc_column_wrapper clearfix">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= $after_output;
$output .= $this->endBlockComment( $this->getShortcode() );

echo ''.$output;