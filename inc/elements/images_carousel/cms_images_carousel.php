<?php
vc_map(array(
    "name" => 'CMS Images Carousel',
    "base" => "cms_images_carousel",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-organic'),
    "params" => array(
        array(
            "type" => "attach_images",
            "heading" => esc_html__("Item Images",'wp-organic'),
            "param_name" => "image_item",

        ),
    )
));

class WPBakeryShortCode_cms_images_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>