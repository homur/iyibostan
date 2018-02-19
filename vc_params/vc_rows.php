<?php
/**
 * Add row params
 * 
 * @author Fox
 * @since 1.0.0
 */

    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Background Image Fixed", 'wp-organic'),
        'param_name' => 'background_image_fixed',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'CMS Customs'
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Background Overlay Color", 'wp-organic'),
        'param_name' => 'background_overlay_color',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'CMS Customs'
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__('Select Color', 'wp-organic'),
        "param_name" => "row_overlay_color",
        'group' => 'CMS Customs',
        "dependency" => array(
            "element" => "background_overlay_color",
            "value" => array(
                "yes"
            )
        ),
        "description" => ''
    ));
    vc_add_param("vc_row", array(
        "type" => "textfield",
        "class" => "",
        "heading" => esc_html__('Opacity', 'wp-organic'),
        "param_name" => "opacity_color",
        'group' => 'CMS Customs',
        "dependency" => array(
            "element" => "background_overlay_color",
            "value" => array(
                "yes"
            )
        ),
        "description" => ''
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Column Same Height", 'wp-organic'),
        'param_name' => 'column_same_height',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'CMS Customs'
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Column No Padding", 'wp-organic'),
        'param_name' => 'column_no_padding',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'CMS Customs'
    ));
    vc_add_param('vc_row_inner', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Column No Padding", 'wp-organic'),
        'param_name' => 'column_no_padding',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'CMS Customs'
    ));
    vc_add_param("vc_row", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Over follow CSS", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "custom_over_follow",
        "value" => array(
            "None" => "",
            "Initial" => "over_follow_initial",
            "Initial for only Chrome" => "over_follow_initial-chrome",
        ),
        'group' => 'CMS Customs',
    ));
    vc_add_param("vc_row",array(
        'type' => 'attach_image',
        'heading' => esc_html__( 'Custom Row Background Image', 'wp-organic' ),
        'param_name' => 'custom_row_image',
        'value' => '',
        'description' => esc_html__( 'Select image from media library.', 'wp-organic' ),
        'group' => 'CMS Customs',
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Custom Row Background Image - Position Right (Default Left)", 'wp-organic'),
        'param_name' => 'custom_row_image_right',
        'value' => array(
            'Position Left' => 'custom-row-image-left',
            'Position Right' => 'custom-row-image-right',
            'Position Right Cover' => 'custom-row-image-right-cover',
            'Background Images Full Width'=>'background-images-overlay-fullwidth'
        ),
        'group' => 'CMS Customs'
    ));
    vc_remove_param( "vc_row", "equal_height" );

