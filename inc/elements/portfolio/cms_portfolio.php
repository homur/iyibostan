<?php
$portfolio_cat_options = array('All'=>'');
$portfolio_categories = get_terms('product_cat');

if(!isset($portfolio_categories->errors)){ 
    foreach($portfolio_categories as $category){
            $portfolio_cat_options[$category->name] = $category->slug;
    }
}

vc_map(array(
    "name" => 'CMS Portfolio Masonry',
    "base" => "cms_portfolio",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-organic'),
    "params" => array(
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Select category", 'wp-organic'),
            "admin_label" => true,
            "param_name" => "portfolio_masonry_category",
            "value" =>  $portfolio_cat_options,
            "group" => esc_html__("Portfolio Settings", 'wp-organic'),
        ),
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_portfolio",
            "heading" => esc_html__("Shortcode Template",'wp-organic'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'wp-organic'),
        ),

    )
));

class WPBakeryShortCode_cms_portfolio extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>