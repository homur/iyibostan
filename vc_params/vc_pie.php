<?php
/**
 * Add row params
 * 
 * @author Fox
 * @since 1.0.0
 */

vc_add_param("vc_pie", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __('Title Color', 'wp-organic'),
    "param_name" => "title_color",
    "description" => ''
));

vc_remove_param("vc_pie", "color");
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => __('Pie color progress', 'wp-organic'),
    'param_name' => 'color',
    'value' => '#90c43e', // $pie_colors,
    'description' => __('Select pie chart color.', 'wp-organic'),
    'admin_label' => true,
    'param_holder_class' => 'vc-colored-dropdown'
));
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => __('Pie border color', 'wp-organic'),
    'param_name' => 'pie_border_color',
    'value' => '#424242',
    'admin_label' => true,
));
vc_add_param("vc_pie", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Style", 'wp-organic'),
    "param_name" => "style",
    "value" => array(
        "Style 1" => "style1",
        "Style 2" => "style2"
    ),
    "description" => __("Select style for pie.", 'wp-organic')
));
