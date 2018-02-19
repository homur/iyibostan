<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * @var $background_image_fixed - Custom VC
 * @var $background_overlay_color - Custom VC
 * @var $row_overlay_color - Custom VC
 * @var $opacity_color - Custom VC
 * @var $custom_responsive - Custom VC
 * @var custom_over_follow - Custom VC
 * @var $column_same_height - Custom VC
 * @var $custom_row_image - Custom VC
 * @var $custom_row_image_right - Custom VC
 * @var $column_no_padding - Custom VC
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
    'vc_row',
    'wpb_row', //deprecated
    'vc_row-fluid',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
    $wrapper_attributes[] = 'data-vc-full-width="true"';
    $wrapper_attributes[] = 'data-vc-full-width-init="false"';
    if ( 'stretch_row_content' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
    } elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $css_classes[] = 'vc_row-no-padding';
    }
    $after_output .= '<div class="vc_row-full-width"></div>';
}

if ( ! empty( $full_height ) ) {
    $css_classes[] = ' vc_row-o-full-height';
    if ( ! empty( $content_placement ) ) {
        $css_classes[] = ' vc_row-o-content-' . $content_placement;
    }
}
// Column same height
if ( ! empty( $column_same_height ) ) {
    $css_classes[] = ' column-same-height';
}
if ( ! empty( $full_height ) ) {
    $css_classes[] = ' vc_row-o-full-height';
    if ( ! empty( $columns_placement ) ) {
        $flex_row = true;
        $css_classes[] = ' vc_row-o-columns-' . $columns_placement;
    }
}

if ( ! empty( $equal_height ) ) {
    $flex_row = true;
    $css_classes[] = ' vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
    $flex_row = true;
    $css_classes[] = ' vc_row-o-content-' . $content_placement;
}

// Custom - background fixed
if ( ! empty( $background_image_fixed ) ) {
    $css_classes[] = ' row-background-fixed';
}
// Column no padding
if ( ! empty( $column_no_padding ) ) {
    $css_classes[] = ' column-no-padding';
}
// Custom - Background overlay color
$html_bg_overlay = '';
if ( ! empty( $background_overlay_color ) ) {
    $css_classes[] = ' row-bg-overlay';
    $html_bg_overlay = '<div class="overlay-color" style="background-color: '.esc_attr($row_overlay_color).';opacity:'.esc_attr($opacity_color).';"></div>';
}
// Custom - Responsive
if ( ! empty( $custom_responsive ) ) {
    $css_classes[] = $custom_responsive;
}
// Custom - over follow
if ( ! empty( $custom_over_follow ) ) {
    $css_classes[] = $custom_over_follow;
}
// Custom - Background Image
$row_custom_bg_image = '';
if ( ! empty( $custom_row_image ) ) {
    $row_custom_image_id = preg_replace( '/[^\d]/', '', $custom_row_image );
    $row_custom_image_src = wp_get_attachment_image_src( $row_custom_image_id, 'full' );
    if ( ! empty( $row_custom_image_src[0] ) ) {
        $row_custom_image_src = $row_custom_image_src[0];
    }
    $row_custom_bg_image = '<div class="custom-row-image hidden-xs hidden-sm" style="background-image: url('.esc_url($row_custom_image_src).');"></div>';
}
// Custom - Background Image - Position right
if ( ! empty( $custom_row_image_right ) ) {
    $css_classes[] = $custom_row_image_right;
}
// use default video if user checked video, but didn't chose url
if ( ! empty( $video_bg ) && empty( $video_bg_url ) ) {
    $video_bg_url = 'https://www.youtube.com/watch?v=lMJXxhRFO1k';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

if ( $has_video_bg ) {
    $parallax = $video_bg_parallax;
    $parallax_image = $video_bg_url;
    $css_classes[] = ' vc_video-bg-container';
    wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
    wp_enqueue_script( 'vc_jquery_skrollr_js' );
    $wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
    $css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
    if ( strpos( $parallax, 'fade' ) !== false ) {
        $css_classes[] = 'js-vc_parallax-o-fade';
        $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
    } elseif ( strpos( $parallax, 'fixed' ) !== false ) {
        $css_classes[] = 'js-vc_parallax-o-fixed';
    }
}

if ( ! empty ( $parallax_image ) ) {
    if ( $has_video_bg ) {
        $parallax_image_src = $parallax_image;
    } else {
        $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
        $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
        if ( ! empty( $parallax_image_src[0] ) ) {
            $parallax_image_src = $parallax_image_src[0];
        }
    }
    $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= $html_bg_overlay;
$output .= $row_custom_bg_image;
$output .= '<div class="vc_column_wrapper clearfix">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= $after_output;
$output .= $this->endBlockComment( $this->getShortcode() );

echo ''.$output;