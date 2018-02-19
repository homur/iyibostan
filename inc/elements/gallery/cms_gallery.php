<?php
vc_map(array(
    "name" => 'CMS Gallery Masonry',
    "base" => "cms_gallery",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-organic'),
    "params" => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_gallery",
            "heading" => esc_html__("Shortcode Template",'wp-organic'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'wp-organic'),
        ),

    )
));

class WPBakeryShortCode_cms_gallery extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>