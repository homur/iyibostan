<?php
/*
 * Contact form-7
 */
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("CMS Custom Style", 'wp-organic'),
    "param_name" => "el_class",
    "value" => array(
        'None' => 'no-overlay',
        'Background Left Bottom' => 'bg-left-bottom',
        'Background Left Top' => 'bg-left-top',
        'Background Center Bottom' => 'bg-center-bottom',
        'Background Right Top' => 'bg-right-top',
        'Background Right Bottom' => 'bg-right-bottom',
    ),
    "description" => ""
));
if (shortcode_exists('contact-form-7')) {
    vc_add_param("contact-form-7", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Contact Style", 'wp-organic'),
        "param_name" => "html_class",
        "value" => array(
            'Style Default' => 'style-default',
            'Style 1' => 'style1',
            'Style 2' => 'style2',
        ),
        "description" => ""
    ));
}

/*
 * Separator
 */
if (shortcode_exists('vc_separator')) {
    vc_add_param("vc_separator", array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("Custom Sparator Width", 'wp-organic'),
        "param_name" => "custom_sparator_width",
        "value" => "",
        "description" => "Set Width Sparator Important: px, %"
    ));
}
/*
 * vc_widget_sidebar
 */
    vc_add_param("vc_widget_sidebar", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Widget Newletter Style", 'wp-organic'),
        "param_name" => "el_class",
        "value" => array(
            'Style Default' => 'style-default',
            'Style 1' => 'style1',
            'Style 2' => 'style2',
            'Style 3' => 'style3',
            'Style 4' => 'style4',
            'Style 5' => 'style5',
        ),
        "description" => ""
    ));
    /*
 * vc_separator
 */
    vc_add_param("vc_separator", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Border solid Style", 'wp-organic'),
        "param_name" => "el_class",
        "value" => array(
            'Style Default' => 'style-default',
            'Style 1' => 'style1',
            'Style 2' => 'style2',

        ),
        "description" => ""
    ));
/**
 * acoordion
 */
    vc_add_param("vc_tta_accordion", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Style Outline ", 'wp-organic'),
        "param_name" => "el_class",
        "value" => array(
            'Style Default' => 'style-default',
            'Style 1' => 'style1',
            'Style 2' => 'style2',

        ),
        "description" => ""
    ));
/**
 * tab
*/
vc_add_param("vc_tta_tabs", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Style Tab ", 'wp-organic'),
        "param_name" => "el_class",
        "value" => array(
            'Style Default' => 'style-default',
            'Style 1' => 'style1',
            'Style 2' => 'style2',
            'Style 3' => 'style2',

        ),
        "description" => ""
    ));