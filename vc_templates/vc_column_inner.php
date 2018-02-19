<?php
/**
 * @var $this WPBakeryShortCode_VC_Column
 */
$output = $font_color = $el_class = $width = $offset = $font_size_col = $font_line_height = $font_weight_col = '';
extract( shortcode_atts( array(
    'font_color'=>'',
    'el_class' => '',
    'width' => '1/1',
    'css'=>'',
    'offset'=>'',
    'animation' => '',
    'list_style' => 'list-none',
    'text_align' => 'align-none',
    'text_align_responsive' => 'rp-left',
    'blockquote_style' => '',
), $atts ) );

$el_class = $this->getExtraClass( $el_class );
$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

/* Overlay */
$html_bg_overlay = '';
$class_overlay = '';
if ( ! empty( $background_overlay_color_column ) ) {
    $class_overlay = ' column-bg-overlay';
    $html_bg_overlay = '<div class="overlay-color-column" style="background-color: '.esc_attr($column_overlay_color).';"></div>';
}
/* Text Align */
$styles = array();
$class_align = '';
if (!empty($text_align)) {
    $styles[] = " text-align: ".esc_attr($text_align).";";
    $class_align = ' text-'.esc_attr($text_align);
}

$class_align_responsive = '';
if (!empty($text_align_responsive)) {
    $class_align_responsive = ' text-'.esc_attr($text_align_responsive);
}

$el_class .= ' wpb_column vc_column_container ' . $animation .' '.esc_attr($class_overlay).' '.esc_attr($list_style).' '.esc_attr($blockquote_style).' ' . esc_attr($animation) .' '.esc_attr($class_align).' '.esc_attr($class_align_responsive);
$style = $this->buildStyle( $font_color );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . ' ' . $el_class, $this->settings['base'], $atts );
$output .= "\n\t" . '<div class="' . esc_attr($css_class) . '"' . $style . '>';
$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
$output .= "\n\t" . $html_bg_overlay;
$output .= "\n\t\t" . '<div class="wpb_wrapper">';
$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
$output .= "\n\t" . '</div> ' . $this->endBlockComment( $el_class ) . "\n";
$output .= '</div>';
echo ''.$output;