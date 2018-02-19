<?php
/**
 * Add column params
 * 
 * @author Fox
 * @since 1.0.0
 */

     vc_add_param("vc_column_inner", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__('Font Color', 'wp-organic'),
        "param_name" => "font_color",
        "description" => ''
    ));
    vc_add_param("vc_column", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "animation",
        "value" => array(
            "None" => "",
            "FadeIn" => "rda_fadeIn",
            "FadeInDown" => "rda_fadeInDown",
            "FadeInUp" => "rda_fadeInUp",
            "FadeInLeft" => "rda_fadeInLeft",
            "FadeInRight" => "rda_fadeInRight",
            "BounceIn" => "rda_bounceIn",
            "BounceInDown" => "rda_bounceInDown",
            "BounceInUp" => "rda_bounceInUp",
            "BounceInLeft" => "rda_bounceInLeft",
            "BounceInRight" => "rda_bounceInRight",
            "ZoomIn" => "rda_zoomIn",
            "FlipInX" => "rda_flipInX",
            "FlipInY" => "rda_flipInY",
            "Bounce" => "rda_bounce",
            "Flash" => "rda_flash",
            "Shake" => "rda_shake",
            "Pulse" => "rda_pulse",
            "Swing" => "rda_swing",
            "RubberBand" => "rda_rubberBand",
            "Wobble" => "rda_wobble",
            "Tada" => "rda_tada"
        )
    ));
    vc_add_param("vc_column_inner", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "animation",
        "value" => array(
            "None" => "",
            "FadeIn" => "rda_fadeIn",
            "FadeInDown" => "rda_fadeInDown",
            "FadeInUp" => "rda_fadeInUp",
            "FadeInLeft" => "rda_fadeInLeft",
            "FadeInRight" => "rda_fadeInRight",
            "BounceIn" => "rda_bounceIn",
            "BounceInDown" => "rda_bounceInDown",
            "BounceInUp" => "rda_bounceInUp",
            "BounceInLeft" => "rda_bounceInLeft",
            "BounceInRight" => "rda_bounceInRight",
            "ZoomIn" => "rda_zoomIn",
            "FlipInX" => "rda_flipInX",
            "FlipInY" => "rda_flipInY",
            "Bounce" => "rda_bounce",
            "Flash" => "rda_flash",
            "Shake" => "rda_shake",
            "Pulse" => "rda_pulse",
            "Swing" => "rda_swing",
            "RubberBand" => "rda_rubberBand",
            "Wobble" => "rda_wobble",
            "Tada" => "rda_tada"
        )
    ));
    vc_add_param("vc_column", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Text Align", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "text_align",
        "value" => array(
            "None" => "align-none",
            "Left" => "left",
            "Center" => "center",
            "Right" => "right",
        )
    ));
    vc_add_param("vc_column_inner", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Text Align", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "text_align",
        "value" => array(
            "None" => "align-none",
            "Left" => "left",
            "Center" => "center",
            "Right" => "right",
        )
    ));
    vc_add_param("vc_column", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Text Align Responsive Small & Mini", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "text_align_responsive",
        "value" => array(
            "None" => "",
            "Left" => "rp-left",
            "Center" => "rp-center",
            "Right" => "rp-right",
        )
    ));
    vc_add_param("vc_column_inner", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Text Align Responsive Small & Mini", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "text_align_responsive",
        "value" => array(
            "None" => "",
            "Left" => "rp-left",
            "Center" => "rp-center",
            "Right" => "rp-right",
        )
    ));
    vc_add_param("vc_column", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("List Style", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "list_style",
        "value" => array(
            "None" => "list-none",
            "List Arrow Round" => "cms-list-arrow-round",
            "List Check Round" => "cms-list-check-round",
            "List Arrow Icon1" => "cms-list-arrow-icon1",
            "List Arrow Icon2" => "cms-list-arrow-icon2",
            "List Arrow Icon3" => "cms-list-arrow-icon3",
            "List Round Icon" => "cms-list-round-icon",
            "List Round Icon 2" => "cms-list-round-icon2",
            "List Star Icon" => "cms-list-star-icon",
            "List Number" => "cms-list-number",
        )
    ));
    vc_add_param("vc_column_inner", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("List Style", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "list_style",
        "value" => array(
            "None" => "list-none",
            "List Arrow Round" => "cms-list-arrow-round",
            "List Check Round" => "cms-list-check-round",
            "List Arrow Icon1" => "cms-list-arrow-icon1",
            "List Arrow Icon2" => "cms-list-arrow-icon2",
            "List Arrow Icon3" => "cms-list-arrow-icon3",
            "List Round Icon" => "cms-list-round-icon",
            "List Round Icon 2" => "cms-list-round-icon2",
            "List Star Icon" => "cms-list-star-icon",
            "List Number" => "cms-list-number",
        )
    ));
    vc_add_param("vc_column", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Blockquote Style", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "blockquote_style",
        "value" => array(
            "None" => "blockquote-none",
            "Style 1" => "blockquote-style1",
            "Style 2" => "blockquote-style2",
            "Style 3" => "blockquote-style3",
        )
    ));
    vc_add_param("vc_column_inner", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Blockquote Style", 'wp-organic'),
        "admin_label" => true,
        "param_name" => "blockquote_style",
        "value" => array(
            "None" => "blockquote-none",
            "Style 1" => "blockquote-style1",
            "Style 2" => "blockquote-style2",
            "Style 3" => "blockquote-style3",
        )
    ));
