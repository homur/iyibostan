<?php

/**
 * Auto create css from Meta Options.
 * 
 * @author Fox
 * @version 1.0.0
 */
class CMSSuperHeroes_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        global $smof_data, $wp_organic_base;
        $css = $this->css_render();
        if (! $smof_data['dev_mode']) {
            $css = $wp_organic_base->wp_organic_compress_css($css);
        }
        echo '<style type="text/css" data-type="cms_shortcodes-custom-css">'.$css.'</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $wp_organic_meta;

        if(!is_page()) return '';

        ob_start();

        if(isset($wp_organic_meta->_cms_header) && $wp_organic_meta->_cms_header){
            $background_header_top = !empty($wp_organic_meta->_cms_background_header_top) ? $wp_organic_meta->_cms_background_header_top : $smof_data['background_header_top']['background-color'];
            $background_header = !empty($wp_organic_meta->_cms_background_header) ? $wp_organic_meta->_cms_background_header : $smof_data['background_header']['background-color'];
            echo "#cshero-header-top.header-top2{background:".esc_attr($background_header_top).";}";
            echo "#cshero-header-inner.header-2 #cshero-header{background:".esc_attr($background_header)." !important;}";
        }

        if (!empty($wp_organic_meta->_cms_page_title_margin)) {
            echo "body #page-title {margin: ".esc_attr($wp_organic_meta->_cms_page_title_margin).";}";
        }
        if (!empty($wp_organic_meta->_cms_page_title_padding)) {
            echo "body #page-title {padding: ".esc_attr($wp_organic_meta->_cms_page_title_padding)." !important;}";
        }

        if (isset($wp_organic_meta->_cms_page_title) && ($wp_organic_meta->_cms_page_title)) {
            if (!empty($wp_organic_meta->_cms_bg_overlay)) {
                echo "#page-title:after {background: ".esc_attr($wp_organic_meta->_cms_bg_overlay)." !important;}";
            }
            if (isset($wp_organic_meta->_cms_enable_bg_overlay) && (($wp_organic_meta->_cms_enable_bg_overlay) =='')) {
                echo "#page-title:after {display:none;}";
            }
        }

        if(!empty($wp_organic_meta->_cms_footer_top_background) && !empty($wp_organic_meta->_cms_footer_top_background)){
            $background_block_footer_top_theme = 'url('. wp_get_attachment_url( $wp_organic_meta->_cms_footer_top_background).') ';
            if($wp_organic_meta->_cms_footer_top_background_image_position != ''){
                $background_block_footer_top_theme .= $wp_organic_meta->_cms_footer_top_background_image_position.'/';
            }
            if($wp_organic_meta->_cms_footer_top_background_size != ''){
                $background_block_footer_top_theme .= $wp_organic_meta->_cms_footer_top_background_size.' ';
            }
            if(esc_attr($wp_organic_meta->_cms_footer_top_background_image_repeat) != ''){
                $background_block_footer_top_theme .= $wp_organic_meta->_cms_footer_top_background_image_repeat;
            }
            echo  ".footer2 #cshero-footer-top{background:". esc_attr($background_block_footer_top_theme) ." !important;}";
        }
        if(!empty($wp_organic_meta->_cms_overlay_slider_color) && isset($wp_organic_meta->_cms_slider_custom) && (($wp_organic_meta->_cms_slider_custom) !='')) {
            echo   ".slotholder:after {background-color:". esc_attr($wp_organic_meta->_cms_overlay_slider_color)." !important; opacity:1;}";
        }
        if(!empty($wp_organic_meta->_cms_logo_height_page)) {
            echo '#cshero-header-inner #cshero-header #cshero-header-logo a img,#cshero-header-logo.header-logo3 a img{max-height:'.$wp_organic_meta->_cms_logo_height_page.';line-height:'.$wp_organic_meta->_cms_logo_height_page.';}';
            echo '#cshero-header-inner #cshero-header #cshero-header-logo a,#cshero-header-logo.header-logo3 a {height:'.$wp_organic_meta->_cms_logo_height_page.';line-height:'.$wp_organic_meta->_cms_logo_height_page.';}';
            echo '#cshero-header-inner #cshero-header #cshero-header-logo {height:'.$wp_organic_meta->_cms_logo_height_page.';line-height:'.$wp_organic_meta->_cms_logo_height_page.';}';
            echo '#cshero-header-inner #cshero-header-navigation .main-navigation .menu-main-menu > ul > li > a, #cshero-header-inner #cshero-header-navigation .main-navigation .menu-main-menu > li > a{line-height:'.$wp_organic_meta->_cms_logo_height_page.';}';
        }
        return ob_get_clean();
    }
}

new CMSSuperHeroes_DynamicCss();